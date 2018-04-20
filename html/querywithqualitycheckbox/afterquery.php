<?php
    header('Content-Type: text/html; charset="utf-8"');
    header('Content-Disposition: inline; filename="result.txt"');
    require_once('common.Utility.php');
    //connect db
    $__db=kwcr2_mapdb("RATING", 'user', 'user');
    if ($__db===0) {
      echo "100, \"connect db failed!\"";
      return;
    }

    $br = "<br/>";

    if($_POST["sd"] && $_POST["ed"] && $_POST["so"] && $_POST["eo"] &&  $_POST["school"] ){
      $sd = trim($_POST["sd"]);
      $ed = trim($_POST["ed"]);
      $so = trim($_POST["so"]);
      $eo = trim($_POST["eo"]);
      $school = trim($_POST["school"]);
    }
    /*if(file_exists("../txtoutput/".$school."-".$so.".txt")){
            unlink("../txtoutput/".$school."-".$so.".txt");
    }
    $myfile = fopen("../txtoutput/".$school."-".$so.".txt", "w") or die("Unable to open file!"); */
    //$random = rand();
    //$myfile = fopen("../txtoutput/".$random.".txt", "w") or die("Unable to open file!");
    $rs=read_multi_record($__db, "select R.ID, R.TID, SUBBLOBTOCHAR(R.CONTENT,null,null), R.\"DATE\", R.QUALITY, R.Difficulty, R.C_date from user.response R inner join user.professor TC on R.tid=TC.id AND TC.quality >= '$so' AND TC.quality <= '$eo' AND TC.school like '$school' where R.C_DATE >= '$sd' AND R.C_DATE <= '$ed' ",array(),array());
    if ($rs === false){
      echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
      echo $rs;

    }else {

      foreach ($rs as $r){
        if(isset($_POST['cb1']) && (1.0<= $r[4] && $r[4]<= 1.9)){
          $show = $r[0].":".$r[1].":".$r[4].":".$r[2];
          echo $show."<br>" ;
          //fwrite($myfile, $show."\r\n");
        }else if(isset($_POST['cb2']) && (2.0<= $r[4] && $r[4]<= 2.9)){
          $show = $r[0].":".$r[1].":".$r[4].":".$r[2];
          echo $show."<br>" ;
          //fwrite($myfile, $show."\r\n");
        }else if(isset($_POST['cb3']) && (3.0<= $r[4] && $r[4]<= 3.9)){
          $show = $r[0].":".$r[1].":".$r[4].":".$r[2];
          echo $show."<br>" ;
          //fwrite($myfile, $show."\r\n");
        }else if(isset($_POST['cb4']) && (4.0<= $r[4] && $r[4]<= 4.9)){
          $show = $r[0].":".$r[1].":".$r[4].":".$r[2];
          echo $show."<br>" ;
          //fwrite($myfile, $show."\r\n");
        }else if(isset($_POST['cb5']) && (5.0<= $r[4] &&  $r[4]<= 5.9)){
          $show = $r[0].":".$r[1].":".$r[4].":".$r[2];
          echo $show."<br>" ;
          //fwrite($myfile, $show."\r\n");
        }

      }

    }
    //fclose($myfile);
    //echo "Query Result:".$br;
    //echo "<html><a href=\"";
    //echo "http://tcu.cyberhood.net/UT_ENG_Front/html/txtoutput/".$random.".txt";
    //echo "\">Download Here</a></html>";
    kwcr2_unmapdb($__db);
?>
