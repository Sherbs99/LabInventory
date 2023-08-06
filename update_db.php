<?php

  $json_string = file_get_contents('php://input'); //read Full Body

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "Post Request Received :-); String = ";
    // echo $json_string;  
  }
  
  //echo "JSON String = " . $json_string;  

  $obj = json_decode($json_string);

  //strip structure & content 
  $tbl_struct = $obj->tbl_defs;
  $tbl_content = $obj->content;
  $tbl_action = $obj->action;
  $tbl_row = $obj->row;
  
  $sql_data = "";
  
  if ($tbl_action == "delete") {
    $sql = "DELETE FROM pdu_plugs WHERE `pdu_plugs`.id = ".$tbl_row;
    
  }
  else //new & Update)
    { 
    for ($i = 0; $i < count($tbl_struct); $i++) {

      // Generate Key / Value Pairs
      //skip "id"
      
      $col_name = "`".$tbl_struct[$i]->{'Name'}."`"; // allways add ` around column
      
      if ($col_name  != "`id`") {
        $data = $tbl_content->{$tbl_struct[$i]->{'Name'}};
        // Deal with empty fields
        if ($data == null) {     
          $data = "NULL";
          $element_data = $col_name  . " = ".$data;
          $insert_data = $data;
        } else {
          if ($tbl_struct[$i]->{'Type'} == "varchar") {
            // add ' around data for strings
            $element_data = $col_name . " = '".$data."'";
            $insert_data = "'".$data."'";
          } else {
            $element_data = $col_name . " = ".$data;
            $insert_data = $data;
          }
        }
        if ($i < count($tbl_struct) -1) {
          //add comma between data but not for last element
          $sql_data =  $sql_data . $element_data.", ";  
          $sql_data_insert_cols = $sql_data_insert_cols.$col_name. ", ";
          $sql_data_insert_data = $sql_data_insert_data.$insert_data.", ";
        } else {
          $sql_data =  $sql_data . $element_data;        
          $sql_data_insert_cols = $sql_data_insert_cols.$col_name;
          $sql_data_insert_data = $sql_data_insert_data.$insert_data;
          
        }      
      } 
    }
  
    //add leading & trailing SQL Info 
   
    $rec_id = $tbl_content->{'id'};
    // echo "ID = ".$rec_id;
  
    if ($rec_id != "New") {
      $leading = "UPDATE pdu_plugs SET ";
      $tailing = " WHERE id = ".$rec_id;
      $sql = $leading.$sql_data.$tailing;
    } 
    else {
      
      $lead = "INSERT INTO `pdu_plugs` (`id`, ";
      $mid = ") VALUES (NULL, ";
      $end = ");";
    
      $sql = $lead.$sql_data_insert_cols.$mid.$sql_data_insert_data.$end;
    }
  }
  //$sql = $leading.$sql_data.$trailing;
  
  // echo "SQL Data: ".$sql;
  
  //echo var_dump($obj);
  

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
  
  //update Record
  $result = $conn->query($sql);
  
  echo $result; //Return SQL result; 1 = success (true), empty = no Success (false)
  
  $conn->close;

?>
