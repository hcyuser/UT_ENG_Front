<?php
$host = "104.199.250.176";
$user = "hcyidvtw";
$password = "hcyidvtw";
$database = "rating";
$mysqli = new mysqli($host, $user, $password, $database);

$br = "<br/>";

/* check connection */
if ($mysqli->connect_errno) {
    echo "Error: Unable to connecct to MySQL.<br/>";
    echo "Debugging errno: " . $mysqli->connect_errno() . $br;
    echo "Debugging error: " . $mysqli->connect_error() . $br;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The $database database is great." . $br;
//echo "Host information: " . $mysqli->host_info . $br;
?>


<?php
  if($_POST["sd] && $_POST["ed"] && $_POST["so"] && $_POST["eo"]){
    echo $_POST["sd];
    echo $_POST["ed"];
    echo $_POST["so"];
    echo $_POST["eo"];

  }
$sql = "SELECT * FROM professor WHERE id = 1234";
echo "\$mysqli -> query(\"$sql\")" . $br;
echo "Query Result: ".$br;
if ($result = $mysqli->query($sql)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
    $result->free();
}
?>


<?php
mysqli_close($link);
?>