<?php

//iterates through DB and turn off power on all plugs that are not locked.

//DB Access Parameters
$servername = "localhost";
$username = "webuser";
$password = "DB_Web_Access&55";
$dbname = "DemoLabInventory";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$filter="109-InOneKMUOffice";
$filter="";
$sql_base = "SELECT * FROM pdu_plugs"." ";
$sql_filter = "WHERE instance_name LIKE '%".$filter."%'";
//$sql_filter = "";
$sql_order = "ORDER BY lab, instance_name";

// $sql = "SELECT * FROM pdu_plugs ORDER BY instance_name";
$sql = $sql_base.$sql_filter.$sql_order;
$result = $conn->query($sql);

if ($result->num_rows > 0) {   // output data of each row
  while($row = $result->fetch_assoc()) { 
    if ($row["bar_ip"] != "") {
      $lock = check_status($row["bar_ip"], $row["bar_array"], $row["bar_branch"], $row["bar_socket"],"lock");
      if ($lock != "checked") {
        $params="http://localhost/snmpdemo.php?operation=set&ip=".$row["bar_ip"]."&array=".$row["bar_array"]."&branch=".$row["bar_branch"]."&socket=".$row["bar_socket"]."&item=power&value=0";
        $resp_json = file_get_contents($params);
        echo "Params: ".$params."; <br>";
        //echo $row["bar_ip"]."/".$row["bar_array"]."/".$row["bar_branch"]."/".$row["bar_socket"];
        //echo "Turned off... ";    
      }  
    }
    //echo "ID: ".$row["id"]."Lock = ".$lock."<br>";
  }
}
$conn->close();



// get check status
  function check_status($bar_ip, $bar_array, $bar_branch, $bar_socket, $item) {
    if ($item == "powerlock") {$item_check = "lock";} else {$item_check = $item;} //   Check whether power is to be locked

    $resp_json = file_get_contents("http://localhost/snmpdemo.php?operation=get&ip=".$bar_ip."&array=".$bar_array."&branch=".$bar_branch."&socket=".$bar_socket."&item=".$item_check);
    $resp_arr = json_decode($resp_json);
    $ret_val = ($resp_arr)->value;
    
    if ($item == "lock") {
      if ($ret_val == 2) {$ret_txt = "checked";} // 1 = unlocked; 2 = locked
      else {$ret_txt = "";}
    }
    
    if ($item == "powerlock") {
      if ($ret_val == 2) {$ret_txt = "disabled";} // 1 = unlocked --> enabled; 2 = locked --> disabled
      else {$ret_txt = "";}
    }
    
    if ($item == "power") {
      if ($ret_val == 1) {$ret_txt = "checked";} //1 = ON, 0 = OFF
      else {$ret_txt = "";}
    }
    

    return $ret_txt;
  } //check_status

echo "unlocked Power Off Complete<br>";
?>
