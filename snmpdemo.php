<?php
// Variables

//POST used for writing Log
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "Post Request Received :-); String = ";
    // echo $json_string;  
    $logstring = file_get_contents('php://input'); //read Full Body
    $operation = "writelog";
    
  } else 
  { // get values for GET request
    $targetip = $_REQUEST["ip"];
    $item = strtolower($_REQUEST["item"]);

    //Default Key, you may use any SNMP Key if known
    $key = strtolower($_REQUEST["key"]);

    //Default operation = "get"
    $operation = strtolower($_REQUEST["operation"]);
    if ($operation ==""){$operation = "get";}  
    //PDU has 3 Levels: array (1..<=4), branch (1..<=6), receptacle/socket (1..6)

    $array = strtolower($_REQUEST["array"]);
    $branch = strtolower($_REQUEST["branch"]);
    $socket = strtolower($_REQUEST["socket"]);
    $valueInput = ($_REQUEST["value"]);
    $value = strtolower($valueInput);
    $maker = strtolower($_REQUEST["maker"]);
    $lanport = strtolower($_REQUEST["lanport"]);
    $logstring = ($_REQUEST["logstring"]);     
  }




//community string
$community="VertivRackPDU";
$community_cisco="snmp_write";
$community_aruba="eclab_2021";
$community_netgear="eclab_2021";

//snmp variable types
$type_str = "s"; // string
$type_int = "i"; // Integer



//filenames
define('log_file' , 'data/log_inventory.log');

// Key definitions Vertiv for easier use
$base_key_socketlabel="SNMPv2-SMI::enterprises.476.1.42.3.8.50.20.1.10"; //Socket Label
$base_key_lock="SNMPv2-SMI::enterprises.476.1.42.3.8.50.20.1.105"; //Lock
$base_key_power="SNMPv2-SMI::enterprises.476.1.42.3.8.50.20.1.100"; //Power On/off
$base_key_realpower="SNMPv2-SMI::enterprises.476.1.42.3.8.50.20.1.65"; // Real Power consumption

$base_key_cisco_portadminstate="IF-MIB::ifAdminStatus.101"; // Interface Admin State Cisco .101<IFNo> e.g. IF-MIB::ifAdminStatus.10124
$base_key_aruba_portadminstate="IF-MIB::ifAdminStatus."; // Interface Admin State Aruba .<IFNo> e.g. IF-MIB::ifAdminStatus.24
$base_key_netgear_portadminstate="IF-MIB::ifAdminStatus."; // Interface Admin State Netgear .<IFNo> e.g. IF-MIB::ifAdminStatus.24

//check items
if ($item == "socketlabel") {
    $key = $base_key_socketlabel.".".$array.".".$branch.".".$socket;
    $type = $type_str;
    $value=$valueInput;
    }
    
if ($item == "lock") {
    $key = $base_key_lock.".".$array.".".$branch.".".$socket;
    $type = $type_int;
    }
    
if ($item == "power") {
    $key = $base_key_power.".".$array.".".$branch.".".$socket;
    $type = $type_int;
    }

if ($item == "realpower") {
    $key = $base_key_realpower.".".$array.".".$branch.".".$socket;
    $type = $type_int;
    }

//set communities
if ($maker == "cisco") {
   $community = $community_cisco;
   if ($lanport <10) {
     $lanport="0".$lanport;  //add leading 0 if required for cisco switches
   }
}

if ($maker == "aruba") {
   $community = $community_aruba;
   }   

if ($maker == "netgear") {
   $community = $community_netgear;
   }

if ($item == "lan") {
    $type = $type_int;
    if ($maker == "cisco") {
       $key = $base_key_cisco_portadminstate.$lanport;  
       //echo $key;
    }

    if ($maker == "aruba") {
       $key = $base_key_aruba_portadminstate.$lanport; //aruba separates by dot 
       //echo $key;
    }

    if ($maker == "netgear") {
       $key = $base_key_netgear_portadminstate.$lanport; //aruba separates by dot 
       //echo $key;
    }
        
}


if ($operation=="set") {
   $set_result = snmpset($targetip, $community, $key, $type, $value);
}
    
    
//get new state in any case
$get_result = snmpget($targetip, $community, $key);

// echo "maker: ".$maker."<br>";
// echo "Targetip: ".$targetip."<br>";
// echo "Community: ".$community."<br>";
// echo "Key: ".$key."<br>";

//Process Result, return as JSON string

$valpos = strpos($get_result, ":"); //Find ":" : Identifying Datatype
$value1 = substr($get_result, $valpos+2); //Value is right of ":"
$value = str_ireplace('"', "" , $value1); // Replace any " (occurs in case of string)
$type = substr($get_result, 0, $valpos); //Type is left of ":"

$ret_array = array("type" => $type, "value" => $value);
$ret_json = json_encode($ret_array);


echo $ret_json;

//Output
// echo "Operation: ".$operation."<br>"."Target: ".$targetip. "<br>"."Key: ".$key."<br>"."Result: ". $get_result;


if ($operation=="writelog") {

    //get all Data
    $currdate = date("d.m.Y H.i.s");
    //$stat_array = array("Time" => $currdate, "Logtext" => $logstring);
    $stat_array = array($currdate,$logstring);
    //$stat_data = json_encode($stat_array);
    $stat_data = $currdate.", ".$logstring;    

    //write log
    $log_filename = log_file;
    $logtext = $stat_data . PHP_EOL;
	
    //echo "LogString: ".$logtext;


    //adding log at beginning of file from https://stackoverflow.com/questions/1760525/need-to-write-at-beginning-of-file-with-php	
    //read content first or create file if necessary and close 
    $logfile = fopen($log_filename, "a+") or die("Unable to open file!"); //open in write mode, create if not existing
    $logdata = fread($logfile,1000000); //read all data, max. 1 MByte
    fclose($logfile); 
    //$logdata = file_get_contents($log_filename);
    //$logdata = "";
    if ($logdata == false) {$logdata = "";} //Empty if file not found

    $logdata_new = $logtext . $logdata; //append new data at the beginning


    // re-open and erase
    $logfile = fopen($log_filename, "w") or die("Unable to open file!"); //open in write mode
    $lodata_new = $logtext;
    fwrite($logfile, $logdata_new ); //write data to file
    fclose($logfile); //close file


}


?>
