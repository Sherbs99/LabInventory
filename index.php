<!DOCTYPE html>
<html>
<head>

 <!--  <meta http-equiv="refresh" content="600">refresh automatically every 10 mins -->
<link rel="icon" type="image/png" href="Swisscom_favicon.png"/>

<!-- Clear cache on load, taken from https://stackoverflow.com/questions/43516436/how-to-clear-cache-memory-on-load-of-html-page -->
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />

<style>

#bar02 {
  margin: 20px;
  width: 95%}

#MainTable {
  margin-left: 20px;
  margin-top: 10px;
  width: 95%;
}
  
#SearchTable {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 95%;
  margin: 20px;
}

#mainfilter {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 95%;
  margin: 20px;
}

#showbutton {
  margin: 20px;
}

#infotext {
  display: inline-block;
}

#numitems {
  margin-left: 20px;
  margin-right: 20px;
  display: inline-block;
}

#itemnum {
  margin-top: 7px;
  display: inline-block;
}

#welcome_message {
  margin-left: 20px;
  margin-right: 20px;
  display: inline-block;
}

#clr_usr_cookie {
  display: inline-block;
}

#id_username {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  margin: 20px;
}

#btn_username {
  margin: 20px;
  position: relative;
  float: left;

}

#txt_username{
  margin-left: 20px;
  margin-right: 20px;
}


#editMask{
  margin-left: 20px;
  margin-right: 20px;
}

h1 {
  padding-top: 10px;
  padding-left: 20px;
}

.header img {
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 12px;
  float: left;
  width: 43px; 
}

.header h1 {
  position: relative;
  margin-left: 20px;
}
 
</style>

<meta http-equiv="refresh" content="3600"> <!-- refresh automatically every hour -->
<link rel="icon" type="image/png" href="Swisscom_favicon.png"  />

<!-- Clear cache on load, taken from https://stackoverflow.com/questions/43516436/how-to-clear-cache-memory-on-load-of-html-page -->
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- SDX Web Components CSS (~30 KB gzipped, contains only SDX Web Components) -->
    <link
      integrity="sha384-VHpZEbHx4ez8tHD9wxe0Ir4KIoFK6UQ32lAVMEQGcXNLrAhsEnpsiE+N+Vwou0Q2" crossorigin="anonymous"
      rel="stylesheet"
      href="https://sdx.scsstatic.ch/v2.81.1/css/webcomponents.min.css">

    <!-- SDX CSS (~60 KB gzipped alternative which also includes "non-Web Component" SDX components) -->
    <link integrity="sha384-SJlnP/tX8N4sGTfIb/7b8sDuTnNaeaHv9rvf8vZpRpCCJQTZXNSuu2lb8ZQJyYft" crossorigin="anonymous" rel="stylesheet" href="https://sdx.scsstatic.ch/v2.81.1/css/sdx.min.css">

    <!-- SDX Web Components JS (~4 KB gzipped, lazy loads only SDX Web Components effectively used) -->
    <script
      integrity="sha384-5/Zfpsh7k37b63D314rKZ2BN1aLt40N+OXvL1wlszVg0Xmrk8DUyBBpdI4btnD6r" crossorigin="anonymous"
      type="module"
      src="https://sdx.scsstatic.ch/v2.81.1/js/webcomponents/webcomponents/webcomponents.esm.js"></script>
      
    <!-- SDX JS (~60 KB gzipped alternative which also includes "non-Web Component" SDX components) -->
    <script integrity="sha384-X9OVevFC4yzTz/SkNLX1teIDdhrTlvFNLxOK/qhHVNfhsKOGve9AYkRbx6feo5rR" crossorigin="anonymous" src="https://sdx.scsstatic.ch/v2.81.1/js/sdx.min.js"></script>  
    
<script language="JavaScript" type="text/javascript">
  //allways jump to top of page after load/reload
  // credits to https://stackoverflow.com/questions/3664381/force-page-scroll-p>
  history.scrollRestoration = "manual";
  //$(window).on('beforeunload', function() {
  //$(document).ready(function(){
    //$(window).scrollTop(0);
  //});
</script>  
    
    

</head>


<title> Lab Inventory Dev</title>

<body class="sdx" onload="UpdateActions()">

<div class="header">
  <img src="SC_Lifeform_GIF_large.gif"/> 
  <h1>Enterprise Connect & BNS Lab Inventory Ey8</h1>
</div>

<div 
  id="all_input"
  hidden
>

  <div id="user_input">
    <sdx-input 
      id="id_username" 
      label="Your Name" 
      placeholder="<Firstname> <Lastname>"
      required  
      valid="false";
      onkeyup="checkname()";
    >
    </sdx-input>  
    <div id="txt_username">
      Thanks for providing your name.
      <sdx-menu-flyout>
        <sdx-menu-flyout-toggle>
          <sdx-icon icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
          </sdx-menu-flyout-toggle>
        <sdx-menu-flyout-content style="width: 300px;">
          This name will be written in log. Helps to identify who did the changes. Stored as cookie on your browser.
        </sdx-menu-flyout-content>
      <sdx-menu-flyout>
    </div>

    <sdx-button 
        id="btn_username"
        label="Continue"
        hidden
        onclick="withusername()"
    >    
    </sdx-button>
  
  </div>  

</div>

<div id="test">
</div>

<div id="test2">
</div>

<div id="test3">
</div>

<div id="test4">
</div>

<?php
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

?>

<div 
  id="editMask"
  hidden
>
 
  <div id="mask_text">
  </div> 
  <div id="tbl_cols"> 
    <?php 
      // generate Input Mask with all DB Fields
      $table_struct=(getColumnNames("pdu_plugs")); 
      
      $numElements = count($table_struct);
      
      for ($element = 0; $element < $numElements; $element++){
          echo "<sdx-input ";
          echo "id=\"structid_".$table_struct[$element]['Name']."\"";
          echo "label = \"".$table_struct[$element]['Name']."\""; 
          echo "placeholder=\"".$table_struct[$element]['Default']."\"";
            //check for larger text fields
            if ( $table_struct[$element]['StrLength']>= 50) {
              echo "type= \"textarea\"";
            }           
            //check for non-changable fields, disable & hide            
            if ( $table_struct[$element]['Extra'] != '') {
              echo "disabled";
              echo " ";
              echo "hidden";
            }
        echo "> ";
        echo "</sdx-input> ";        
      }

      
    ?>
    
  </div>  
  <br>
  <div id="btn_grp_maskedit">

      <sdx-button
        id="btn_save"
        label="Save"
        onclick="edit_save()"
      ></sdx-button>
      <sdx-button 
        id="btn_cancel"
        theme="cancel" 
        label="Cancel"
        onclick="edit_cancel()"
      ></sdx-button>
 
  </div>
</div>

<div 
  id="allcontent" 
  hidden
>


<div id="bar02" class="loader-bar" >
  <div class="detail">
    <div class="name">Loading current power state & controls...</div>
    <div class="detail-right">
      <div class="progress">0%</div>
      <div class="file-size"></div>
      </div>
  </div>
  <div class="loader-bar--progress">
    <div class="indicator" style="width: 0%;"></div>
  </div>
</div>   

<div id="myInput2" >
 
</div>



<div id = "usermgmt">
  <div id="welcome_message"> </div>

  <div id="clr_usr_cookie">
    <sdx-button theme="transparent" icon-name="" icon-size="1" label="Clear user cookie" onclick="delcookie()"></sdx-button>
      <sdx-menu-flyout>
        <sdx-menu-flyout-toggle>
          <sdx-icon icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
        </sdx-menu-flyout-toggle>
        <sdx-menu-flyout-content style="width: 300px;">
          Deletes username stored as cookie. You will need to provide your name again next time you start using this page
        </sdx-menu-flyout-content>
      <sdx-menu-flyout>
  </div>
</div>

<div id="itemnum">
  <div id="numitems">
    <?php
      $filter = strtolower($_REQUEST["filter"]);
      $filter = ($_REQUEST["filter"]);
      $filtertext = "Showing items with " . "<span style=\"color: #086adb\">*". $filter . "*</span>" . " only. <a href=\"index.php\">Show all</a>";
    ?>
  </div>
  <div id="infotext" <?php if ($filter==null) {echo "hidden";}?>> <?php echo $filtertext; ?> </div>
</div>



  <sdx-input <?php if ($filter!=null) {echo "hidden";}?> label="Filter in Label" type="text" id="SearchTable" onkeyup="tableFilter()" placeholder="Set filter..." 
    <?php 
      if ($filter != ""){
        echo "value=\"".$filter."\"";
      }  
    ?>
  ></sdx-input>



<div 
  id="switch-table" 
  class="table table--responsive"
>
  <div class="table__wrapper">
    <table id="MainTable">
      <tbody>
        <thead>
          <tr>
          <th hidden> Row_JSON</th>
	  <th hidden> Lab ID </th>
	  <th hidden> instance_name</th>
	  <th> Lab</th>
          <th data-type="text"> Label</th>
          <th hidden> Bar Connection</th>
          <th hidden> Bar Description</th>
          <th hidden> hiddenRefresh</th>
          <div> 
            <th 
            width="1%"> Power Lock
            <sdx-menu-flyout>
              <sdx-menu-flyout-toggle>
                <sdx-icon 
                  icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
                </sdx-menu-flyout-toggle>
                <sdx-menu-flyout-content style="width: 300px;">
                  Enable/Disable Power Lock. Power can only be switched when power lock is disabled. Unlocked plugs are turned off automatically every Friday 21:00 in order to save power
                </sdx-menu-flyout-content>
              <sdx-menu-flyout>
            </th>
          </div>  
          <div> 
            <th 
            width="1%"> Power
           <sdx-menu-flyout>
            <sdx-menu-flyout-toggle>
              <sdx-icon 
                icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
              </sdx-menu-flyout-toggle>
              <sdx-menu-flyout-content style="width: 300px;">
                Power On/Off for connected device. Only available when power lock is disabled
              </sdx-menu-flyout-content>
            </th>
          </div>  
          <div> 
            <th 
            width="1%"> WAN
           <sdx-menu-flyout>
            <sdx-menu-flyout-toggle>
              <sdx-icon 
                icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
              </sdx-menu-flyout-toggle>
              <sdx-menu-flyout-content style="width: 300px;">
                Enable/Disable WAN connection. Permits to simulate WAN interruption of connected device
              </sdx-menu-flyout-content>
            </th>
          </div>  
          <div> 
            <th
            width="1%"> LAN
           <sdx-menu-flyout>
            <sdx-menu-flyout-toggle>
              <sdx-icon 
                icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
              </sdx-menu-flyout-toggle>
              <sdx-menu-flyout-content style="width: 300px;">
                Enable/Disable LAN port on switch connected to device under test. Permits to simulate disconnected LAN port. Activation may take up to 60s on Cisco switches
              </sdx-menu-flyout-content>
            </th>
          </div>  
          <th>
            Reservation
          </th>
          <th hidden> wancutter Port</th>
          <th hidden data-type="text">Monitoring</th>
          <th></th>
          <th>edit</th>
          <th hidden>row-json</th>
        </tr>
      </thead>
    <tbody>      

<?php



$sql_base = "SELECT * FROM pdu_plugs"." ";
$sql_filter = "WHERE instance_name LIKE '%".$filter."%'";
//$sql_filter = "";
$sql_order = "ORDER BY lab, instance_name";

// $sql = "SELECT * FROM pdu_plugs ORDER BY instance_name";
$sql = $sql_base.$sql_filter.$sql_order;
$result = $conn->query($sql);


if ($result->num_rows > 0) {   // output data of each row
  while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td hidden><div id="<?php echo "tbl_json".$row["id"]; ?>"> 
        <?php 
          $jsonobj = array(id=>$row["id"],name=>$row["instance_name"], bar_ip=>$row["bar_ip"], bar_branch=>$row["bar_branch"], bar_array=>$row["bar_array"], bar_socket=>$row["bar_socket"]);
          echo json_encode($jsonobj); 
        ?>
      </div></td>
      <td hidden id=<?php echo "tbl_labid".$row["id"]; ?>>
        <?php echo $row["lab_ID"]; ?>
      </td>
      <td hidden id=<?php echo "tbl_inst_name".$row["id"]; ?>>
        <?php echo $row["lab"]."-".$row["instance_name"]; ?>
      </td>
      <td><div
            id="<?php echo "tbl_lab".$row["id"]; ?>"
          >  
        <?php echo $row["lab"]; ?>
      </td>  
      <td><div 
            id="<?php echo "tbl_name".$row["id"]; ?>"
            title="
              <?php 
                //echo $row["comment"]; 
                if ($row["vm"] == 1) {
                  echo "Proxmox Lab Account required for opening management";
                }
              ?>"
          > 
          <?php echo $row["instance_name"]; ?>      
          <?php

            if ($row["Monitoring"] == 1 || $row["ded_monitoring_link"] != null) {
              echo "&emsp;"; // 4 spaces
              echo "<a href=";
              if ($row["ded_monitoring_link"] == null) {
                echo "https://monitoring.eclab.ch/zabbix/zabbix.php?action=host.view&filter_name=".$row["lab_ID"]."&filter_set=1";
              } 
              else {
                echo $row["ded_monitoring_link"];
              }  
              echo " target=\"_blank\">".Monitor."</a>";
            }
            else {
              //echo $row["instance_name"];
            }

            //add VM Link if defined, Default is VM ID from proxmox
            if ($row["vm"] == 1 || $row["mgmt_link"] != null) {
              echo "<a href=";
              if ($row["mgmt_link"] == null) {
                echo "https://lab.eclab.ch:8006/#v1:0:=qemu%2F";
                echo $row["lab_ID"];
                echo "01:4:::::8::";
              }
              else {
                echo $row["mgmt_link"];
              }
              echo " target=\"_blank\">Manage</a>";
             }
             
         ?>
                  
          <sdx-menu-flyout>
            <sdx-menu-flyout-toggle>
              <sdx-icon 
                <?php 
                  //hide icon when there is no comment
                  if ($row["comment"] == null) {
                    echo "hidden";
                  } 
                ?> icon-name="icon-information-circle" sr-hint="Read more"><sdx-icon><             
            </sdx-menu-flyout-toggle>
            
            <sdx-menu-flyout-content style="width: 300px;">
              <?php echo $row["comment"]; ?>
            </sdx-menu-flyout-content>
          </sdx-menu-flyout>
        </div> 
      </td>
        
      <td hidden> <?php echo $row["bar_ip"].":".$row["bar_array"]."/".$row["bar_branch"]."/".$row["bar_socket"]; ?> </td>
      <td hidden> <?php // echo get_bar_description($row["bar_ip"],$row["bar_array"],$row["bar_branch"],$row["bar_socket"]); ?> </td>

      <td hidden > 
        <div class="toolbar toolbar--vertical" id="<?php echo "refresh_".$row["id"]; ?>"> 
        <button class="toolbar__item item--show" aria-label="Share" onclick=snmp_getstate_all("<?php echo $row["id"]; ?>","<?php echo $row["bar_ip"]; ?>","<?php echo $row["bar_array"]; ?>","<?php echo $row["bar_branch"]; ?>","<?php echo $row["bar_socket"]; ?>")  >
          <i class="icon icon-synchronise" aria-hidden="true"></i>
          <span class="toolbar_label">Get Actions</span>
        </button>
        </div>
      </td>
      
      <td>
        <div 
          title="<?php echo "Powerbar: ".$row["bar_ip"].", Port: ".$row["bar_array"]."/".$row["bar_branch"]."/".$row["bar_socket"];?>" 
          hidden class="switch" 
          id="<?php echo "cl_lock-".$row["id"]; ?>"
        >
          <input 
          	type="checkbox" 
          	name=<?php echo "sw_lock".$row["id"]; ?> 
          	id=<?php echo "sw_lock-".$row["id"]; ?> 
          	<?php // echo check_status($row["bar_ip"], $row["bar_array"], $row["bar_branch"], $row["bar_socket"],"lock");?> 
          	onclick=snmp_oper("<?php echo $row["id"]; ?>","<?php echo $row["bar_ip"]; ?>","<?php echo $row["bar_array"]; ?>","<?php echo $row["bar_branch"]; ?>","<?php echo $row["bar_socket"]; ?>","set","lock","<?php echo rawurlencode($row["instance_name"]); ?>")
          >
          <label for="<?php echo "sw_lock-".$row["id"]; ?>"></label>
        </div>
      </td>
      <td>      
        <div 
          class="switch" 
          hidden 
          id="<?php echo "cl_pwr-".$row["id"]; ?>"
          title="<?php // echo "Switch Powerbar: ".$row["bar_ip"].", Port: ".$row["bar_array"]."/".$row["bar_branch"]."/".$row["bar_socket"];?>" 
          
        >
          <input 
            type="checkbox" 
            name="<?php echo "sw_pwr".$row["id"]; ?>" 
            id="<?php echo "sw_pwr-".$row["id"]; ?>"
            <?php // echo check_status($row["bar_ip"], $row["bar_array"], $row["bar_branch"], $row["bar_socket"],"power");?>
            <?php // echo check_status($row["bar_ip"], $row["bar_array"], $row["bar_branch"], $row["bar_socket"],"powerlock");?>
            onclick=snmp_oper("<?php echo $row["id"]; ?>","<?php echo $row["bar_ip"]; ?>","<?php echo $row["bar_array"]; ?>","<?php echo $row["bar_branch"]; ?>","<?php echo $row["bar_socket"]; ?>","set","power","<?php echo rawurlencode($row["instance_name"]); ?>")  
          >
          <label for="<?php echo "sw_pwr-".$row["id"]; ?>"></label>
        </div>
      </td>
      <td>
        <div class="switch"
          <?php 
             if (($row["cut_ip"] == "") || ($row["cut_port"]==0)) {echo "hidden";} //hide if no switch defined
            ?>
            title="Wancutter: <?php echo $row["cut_ip"].", Line ".$row["cut_port"]; ?>"
        >
          <input 
            type="checkbox" 
            disabled
            name="<?php echo "sw_wan".$row["id"]; ?>" 
            id="<?php echo "sw_wan-".$row["id"]; ?>"
            <?php echo get_wancutter_status($row["cut_ip"],$row["cut_port"]) ?>
            onclick=set_wancutter("<?php echo $row["id"];?>","<?php echo $row["cut_ip"];?>","<?php echo $row["cut_port"]; ?>")
          >
          <label for="<?php echo "sw_wan-".$row["id"]; ?>"></label>
        </div>
      </td>
      <td>

        <div class="switch"
            title="<?php echo "Switch IP: ".$row["lan_ip"]."; Port: ".$row["lan_port"] ?>"
            id="<?php echo "cl_snmp_lan-".$row["id"]; ?>"            
            <?php
              if($row["lan_ip"] == null) {
                echo "hidden";
              }
            ?>
          >
          <input 
            type="checkbox"            
            name="<?php echo "sw_lan".$row["id"]; ?>" 
            id="<?php echo "sw_lan-".$row["id"]; ?>"
            <?php 
              // check whether port is active or not
              if ($row["lan_ip"] != null) {
                $portstate = get_lanport_status($row["lan_ip"],$row["lan_port"],$row["lan_maker"] );
                if ($portstate == "port_on") { 
                  echo "checked";
                }
                elseif ($portstate == "port_error") {
                  echo "disabled";
                }
              }
            ?>

            <?php 
              if($row["lan_ip"]!=null) {
                echo "onclick=snmp_lan(";
                echo "\"".$row["id"]."\"".",";
                echo "\"".$row["lan_ip"]."\"".",";
                echo "\"".$row["lan_port"]."\"".",";
                echo "\"".$row["lan_maker"]."\"".",";
                echo "\""."get"."\"".",";                
                echo "\""."lan"."\"".",";                
                echo "\""."1"."\"".")";
                
              }
            ?>
          >
          <label for="<?php echo "sw_lan-".$row["id"]; ?>"></label>
                    
          <sdx-menu-flyout>
            <sdx-menu-flyout-toggle
                 <?php 
                   //$portstate = get_lanport_status($row["lan_ip"],$row["lan_port"],$row["lan_maker"]); 
                   if ($portstate != "port_error") {
                     echo "hidden"; //everything ok, no message neeeded
                   }   
                ?>
              >
              <sdx-icon                  
                icon-name="icon-exclamation-mark-circle" 
                sr-hint="Read more"
                style="color: #dd1122;"
              >
              <sdx-icon>
            <             
            </sdx-menu-flyout-toggle>
            
            <sdx-menu-flyout-content style="width: 300px;">
              LAN Port not reachable, check whether switch is powered on and port properly configured
            </sdx-menu-flyout-content>
          </sdx-menu-flyout>        
        

        </div>
      </td>   
      <td>
        <?php 
          $reservation = $row["reservation"];
          if ($reservation != "") {
            //echo $reservation; 
          echo "reserved";
            }        
        ?>
          <sdx-menu-flyout>
            <sdx-menu-flyout-toggle
                 <?php 
                   //$portstate = get_lanport_status($row["lan_ip"],$row["lan_port"],$row["lan_maker"]); 
                   if ($reservation == "") {
                     echo "hidden"; //no info to be displayed
                   }   
                ?>
              >
              <sdx-icon                  
                icon-name="icon-exclamation-mark-circle" 
                sr-hint="Read more"
                style="color: #dd1122;"
              >
              <sdx-icon>
            <             
            </sdx-menu-flyout-toggle>
            
            <sdx-menu-flyout-content style="width: 300px;">
              <?php 
                if ($reservation != "") {
                  echo $reservation; 
                }
              // echo "LAN Port not reachable, check whether switch is powered on and port properly configured"
              ?>
            </sdx-menu-flyout-content>
          </sdx-menu-flyout>        

      </td>
      <td hidden>
          <?php 
            //add a monitoring link if defined
            if ($row["ded_monitoring_link"] != null){
              echo "<a href=";
              echo $row["ded_monitoring_link"];
              echo " target=\"_blank\">Link</a>";
            } 
            else {
              if ($row["Monitoring"] == 1) {
                echo "<a href=";
                echo "https://monitoring.eclab.ch/zabbix/zabbix.php?action=host.view&filter_name=veclab0".$row["lab_ID"]."&filter_set=1";
                echo " target=\"_blank\">Link</a>";
              }
            }
          ?>
          <?php //echo "Link";?>
        </td>
        <td><div hidden id="<?php echo "sw_label".$row["id"]; ?>"> 
          <?php 
             if (($row["cut_ip"] == "") || ($row["cut_port"]==0)) {
             // do nothing
             } else {
               echo $row["cut_ip"]; 
               echo $row["cut_ip"]." Line: ".$row["cut_port"]; 
             }
          ?>
        </td>
        <td> 
          <?php $row_json = htmlspecialchars(json_encode($row));?>
          <sdx-button 
            theme="transparent" 
            icon-name="icon-edit" 
            icon-size="2"
            onclick="editRecord(<?php echo $row["id"];?>)"
          >
          
          </sdx-button>
        </td>
        <td
          id=<?php echo "tbl_rowjson".$row["id"];?>
          hidden
        >
          <?php echo $row_json?>
        </td>  
    </tr>  
  <?php }
} else {
  // echo "0 results";
}




$conn->close();

?>


       </tbody>
    </table>
  </div>
</div>


  <div class="toolbar" id="toolbar01">
    <button class="toolbar__item item--show" aria-label="Log" onClick="javascript:window.open('data/log_inventory.log', '_blank');">
      <i class="icon icon-document" aria-hidden="true"></i>
      <span class="toolbar__label">Log</span>
    </button>
  </div>

</div>

<?php
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
  }
  
// get Power Bar Description
  function get_bar_description($bar_ip, $bar_array, $bar_branch, $bar_socket) {
    $resp_json = file_get_contents("http://localhost/snmpdemo.php?operation=get&ip=".$bar_ip."&array=".$bar_array."&branch=".$bar_branch."&socket=".$bar_socket."&item="."socketlabel");
    $resp_arr = json_decode($resp_json);
    $ret_val = ($resp_arr)->value;
    
    return $ret_val;
  
  }
    
 
// get check status
  function check_status_debug($bar_ip, $bar_array, $bar_branch, $bar_socket, $item) {
    $item_check = $item; 
    $resp_json = file_get_contents("http://localhost/snmpdemo.php?operation=get&ip=".$bar_ip."&array=".$bar_array."&branch=".$bar_branch."&socket=".$bar_socket."&item=".$item_check);
    $resp_arr = json_decode($resp_json);   
    $ret_val = ($resp_arr)->value;
    if ($item == "lock") {
      if ($ret_val == 2) {
        $ret_txt = "checked";           
      }
      else {$ret_txt = "unchecked";}
     
    }
    //return "Return: " .$ret_txt;
  }

//get WANCutter Status
  function get_wancutter_status($cut_ip, $cut_port) {
    $retval = "Returned Value";
    $get_resp = file_get_contents("http://".$cut_ip."/linestate.php?operation=get&id=".$cut_port);
    if ($get_resp == 1) {
      $resp="checked";} 
    else {
      $resp="";
    }
    return $resp;
   
  }


function get_lanport_status ($switch_ip, $switch_port, $switch_maker) {
  $url_string = "http://localhost/snmpdemo.php?maker=".$switch_maker."&item=lan&ip=".$switch_ip."&lanport=".$switch_port."&operation=get";
  $resp_json = file_get_contents($url_string);
  //echo $resp_json;
  $resp_arr = json_decode($resp_json);
  if (($resp_arr)->value == "up(1)") {
    return "port_on"; // Port ON
  }
  if (($resp_arr)->value =="down(2)") {
    return "port_off"; //Port OFF
  }
 else {
   return "port_error"; // Port not reachable
 } 
}

function getColumnNames($table) {
  
  //DB Access Parameters
  $servername = "localhost";
  $username = "webuser";
  $password = "DB_Web_Access&55";
  $dbname = "DemoLabInventory";

  // Create connection
  $conn2 = new mysqli($servername, $username, $password, $dbname);

  if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
  }  
  else {

  }

  $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$table."'";
  $result = $conn2->query($sql);
  
  $i = 0; 
  while ($row = $result->fetch_assoc()) {

    $output[$i]['Name'] = $row['COLUMN_NAME'];
    $output[$i]['Default'] = $row['COLUMN_DEFAULT'];
    $output[$i]['Comment'] = $row['COLUMN_COMMENT'];
    $output[$i]['ColType'] = $row['COLUMN_TYPE'];
    $output[$i]['Type'] = $row['DATA_TYPE'];
    $output[$i]['StrLength'] = $row['CHARACTER_MAXIMUM_LENGTH'];
    $output[$i]['Extra'] = $row['EXTRA'];
    
    
    $i++;
  }
  $output_json = json_encode($output);
  
  $conn2->close();
  
  return $output;
}


?>

<script>

var COOKIE_NAME_USERNAME = "labinv_username";

function tableFilter() {
  // Credits to https://www.w3schools.com/howto/howto_js_filter_table.asp
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("SearchTable");
  filterval = input.value;
  if (filterval != null) {  //only run when filter is applied

    filter = filterval.toUpperCase();
    table = document.getElementById("switch-table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }   
  }
}
function snmp_getstate_all(id, bar_ip, bar_array, bar_branch, bar_socket, Element, numElements) {
  //document.getElementById("myInput2").innerHTML = "snmp_getstate_all" + id + "-" + bar_ip + ":" + bar_array + "/" + bar_branch + "/" + bar_socket;
  snmp_getstate(id, bar_ip, bar_array, bar_branch, bar_socket, "get", "lock", Element, numElements);
  snmp_getstate(id, bar_ip, bar_array, bar_branch, bar_socket, "get", "power", Element, numElements);
  
}

function snmp_getstate(id, bar_ip, bar_array, bar_branch, bar_socket, operation, item, Element, numElements) {
  //gets state of item and sets switch accordingly

  var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            resp_json = this.responseText;
            //document.getElementById("myInput2").innerHTML = resp_json;

	    resp_vals = JSON.parse(resp_json);
	    resp_value = resp_vals.value;
            //document.getElementById("myInput2").innerHTML = resp_value + "Json: " + resp_json + "item: " + item; 
          
          
            if (operation == "get") {

              document.getElementById("refresh_" + id).hidden = true; //hide refresh button

              if(bar_branch != null) {  //unhide only if present at all
                document.getElementById("cl_lock-" + id).hidden = false;
                document.getElementById("cl_pwr-" + id).hidden = false;
              }
              document.getElementById("sw_wan-" + id).disabled = false;
              if (item == "lock") {
                incrementProgess02(1/(numElements-1));  //show progress
                if (Element >= (numElements-1)){
                  document.getElementById("bar02").hidden = true; // hide if fully loaded
                }
                if (resp_value == 2) {
                  document.getElementById("sw_lock-" + id).checked = true;
                  document.getElementById("sw_pwr-" + id).disabled = true; //disable power button when locked
                  document.getElementById("cl_pwr-" + id).title = "Unset lock for enabling power switch"; //disable power button when locked
                } // locked = 2
                if (resp_value == 1) {
                  document.getElementById("sw_lock-" + id).checked = false;
                  document.getElementById("sw_pwr-" + id).disabled = false; //enable power button when unlocked
                  document.getElementById("sw_pwr-" + id).hidden = true; //enable power button when unlocked
                  document.getElementById("cl_pwr-" + id).title = "Switch power"; //disable power button when locked
                } // unlocked = 1
              } 
              //document.getElementById("sw_pwr-" + id).checked = false;                
              if (item == "power") {

                if (resp_value == 1) {
                  document.getElementById("sw_pwr-" + id).checked = true;                
                } 
                else {
                  document.getElementById("sw_pwr-" + id).checked = false;                
                }                
              }        
            }            
          }
        }  
       
        get_string = "snmpdemo.php?ip=" + bar_ip + "&array=" + bar_array + "&branch=" + bar_branch + "&socket=" + bar_socket + "&operation=" + operation + "&item=" + item;

        //document.getElementById("myInput2").innerHTML = get_string;
        xmlhttp.open("GET", get_string, true);
        xmlhttp.send();
}



function snmp_oper(id, bar_ip, bar_array, bar_branch, bar_socket, operation, item, value, progress) {
  //make snmp query to power bar using (basic...) api on snmptest.php
  decoded_value = decodeURIComponent(value);

  // set / unset Lock & Power
  var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            resp_json = this.responseText;
            //document.getElementById("myInput2").innerHTML = resp_json;

            // always check lock
            if (document.getElementById("sw_lock-" + id).checked == true) {
              value = 2; //2 = locked
              document.getElementById("sw_pwr-" + id).disabled = true; //disable power button when locked
              document.getElementById("cl_pwr-" + id).title = "Unset lock for enabling power switch"; //disable power button when locked
            } else {
              document.getElementById("sw_pwr-" + id).disabled = false; //enable power button when locked
              document.getElementById("cl_pwr-" + id).title = "Switch power"; //disable power button when locked
            }  

	    resp_vals = JSON.parse(resp_json);
	    resp_value = resp_vals.value;
            //document.getElementById("myInput2").innerHTML = resp_value + "Json: " + resp_json; 
          
            if (operation == "get") {
              if (item == "lock") {
                if (resp_value == 2) {return "checked";} // locked = 2
                if (resp_value == 1) {return "";} // unlocked = 1
              }         
            }            
          }
        };        
        if (item == "lock") {       
          value = 1; // 1 = unlocked, default
            if (document.getElementById("sw_lock-" + id).checked == true) {
              value = 2; //2 = locked
            }
        }
        
        if (item == "power") {       
          value = 0; // 0 = power off, default
          if (document.getElementById("sw_pwr-" + id).checked == true) {
            value = 1;} //1 = power on
        }
 
         xmlhttp.open("GET", "snmpdemo.php?ip=" + bar_ip + "&array=" + bar_array + "&branch=" + bar_branch + "&socket=" + bar_socket + "&operation=" + operation + "&item=" + item + "&value=" + value, true);
        xmlhttp.send();
               

               
        //update Power Bar Description
        urlstring = "snmpdemo.php?ip=" + bar_ip + "&array=" + bar_array + "&branch=" + bar_branch + "&socket=" + bar_socket + "&operation=" + operation + "&item=" + "socketlabel" + "&value=" + decoded_value.substring(0,47)+"."; //Bar accepts max. 48 charachters; sometimes replaing last char by 0, therefore adding "."...
        //document.getElementById("numitems").innerHTML = urlstring;   

        writebar(urlstring);
        
    
 
       
  //write log        
  var newstate = "";
  if (item == "power") {
    action = "Power;";
    if (value == 1) {newstate = "ON; ";}
    else {newstate = "OFF;";}
  }
  
  if (item == "lock") {
    action = "Lock; ";
    if (value == 1) {newstate = "OFF;";}
    else {newstate = "ON; ";}

  }
  
  var lab_name = document.getElementById("tbl_lab" + id).innerHTML.trim();
  var lab_id = document.getElementById("tbl_inst_name" + id).innerHTML.trim();
 
  writelog("Element: " + action+ " New State = " + newstate + " Label: " + lab_name + ": " + lab_id);	
  
}

function snmp_lan (id, switch_ip, switch_port, switch_maker, operation, item, value) {
  var url_string, set_value;
  //set & unsets Ports on LAN Switches using snmp
  
  var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              resp_json = this.responseText;
  	      resp_vals = JSON.parse(resp_json);
  	      resp_value = resp_vals.value;
  	    }
  	  } 
  id_string = "sw_lan-" + id;	  
  //id_string = "sw_lan-233";	  
  if (document.getElementById(id_string).checked == true) {
    set_value = 1; // 1 = port up
  }
  else {
    set_value = 2; // 2 = port down
  }
  //url_string="snmpdemo.php?ip=" + "10.1.1.21" + "&lanport=" + "36" + "&item=" + "lan" + "&maker=" + "cisco" + "&operation=" + "set" + "&value="+set_value;
  url_string="snmpdemo.php?ip=" + switch_ip + "&lanport=" + switch_port + "&item=" + item + "&maker=" + switch_maker + "&operation=" + "set" + "&value="+set_value;
  //document.getElementById("cl_snmp_lan-" + id).title = url_string;
  xmlhttp.open("GET", url_string, true);
  xmlhttp.send();  	   
  
  if (set_value == 1) {newstate = "ON; ";}
  else {newstate = "OFF;";}
  
  var lab_name = document.getElementById("tbl_lab" + id).innerHTML.trim();
  var lab_id = document.getElementById("tbl_inst_name" + id).innerHTML.trim();
 
  writelog("Element: LAN;   New State = " + newstate + " Label: " + lab_name + ": " + lab_id);	
}


function UpdateActions() {

  //check cookie 1st
  username_stored = getCookie(COOKIE_NAME_USERNAME);
  if (username_stored != "") {
    document.getElementById("all_input").hidden = true;
    document.getElementById("allcontent").hidden = false;
    document.getElementById("welcome_message").innerHTML = "Welcome back, "+ username_stored + "!";
    document.getElementById("id_username").value = username_stored;
  }
  else {
    document.getElementById("all_input").hidden = false;
    document.getElementById("allcontent").hidden = true;    
  }
  
  //loop through table and update all values

  //get values from json stored string in column 0
  
  var table, tr, td, i, txtValue, txt_arr, id, bar_ip, bar_array, bar_branch, bar_socket;
  
  table = document.getElementById("MainTable");
  tr = table.getElementsByTagName("tr");
  
  numElements = tr.length;
  if (numElements == 2) { // Header + 1 Line --> 1 Item only
    itemtext = "Item";
  }
  else {
    itemtext = "Items";
  }
  document.getElementById("numitems").innerHTML = (numElements-1) + " " + itemtext; // hide if no elements at all
  
  if (numElements <= 1) { //Title Row only - Hide progress bar if no data available
     document.getElementById("bar02").hidden = true; // hide if no elements at all
  }
  
  //apply Filter if any
  tableFilter();
  
  for (i = 0; i < numElements; i++){
    //iterate through rows
    //rows would be accessed using the "row" variable assigend in the for loop
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtJSON = td.textContent || td.innerText;
      txt_arr = JSON.parse(txtJSON);
      snmp_getstate_all(txt_arr.id,txt_arr.bar_ip,txt_arr.bar_array, txt_arr.bar_branch, txt_arr.bar_socket, i, numElements);
    }
  }  
}

function incrementProgess02(val) {
  if (!window.progress02) {
    window.progress02 = 0;
  } 
  //CDN
  var bar = new sdx.LoaderBar(document.querySelector("#bar02"));
  
  window.progress02 += val;  
  bar.progress = window.progress02
}


function set_wancutter(id, cut_ip, cut_port) {

  // set / unset Lock
  
  var xmlhttp = new XMLHttpRequest(), state, command;
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      resp_json = this.responseText;
    }       
  }
 
  if (document.getElementById("sw_wan-" + id).checked == true) {
    state = true;
  } else {
    state = false;
  }
  
  command = "setwancutter.php?ip=" + cut_ip + "&line=" + cut_port + "&state=" + state;

  //document.getElementById("sw_label" + id).innerHTML = "sw_wan-" + id + " - Check: " + document.getElementById("sw_wan-" + id).checked;
  //document.getElementById("sw_label" + id).innerHTML = command;
  //document.getElementById("sw_label" + id).innerHTML = state;
  xmlhttp.open("GET", command, true);
  xmlhttp.send();
  
  if (state == true) {newstate = "ON; ";}
  else {newstate = "OFF;";}
  
  var lab_name = document.getElementById("tbl_lab" + id).innerHTML.trim();
  var lab_id = document.getElementById("tbl_inst_name" + id).innerHTML.trim();
 
  writelog("Element: WAN;   New State = " + newstate + " Label: " + lab_name + ": " + lab_id);
 
}

function writelog (logstring) {
  //writes string to log
  var username_loc = document.getElementById("id_username").value.trim();
  var logstring_full = "";
  var userstring =  "User: " + username_loc+ "; ";
  
  logstring_full = userstring + logstring;
  
  // logstring_full = logstring + username_loc;
  // logstring_full = username_loc + logstring;
  var xmlhttp = new XMLHttpRequest(), state, command;
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      resp_json = this.responseText;
    }       
  }
  command = "snmpdemo.php?operation=writelog&logstring=" + logstring_full;
  xmlhttp.open("GET", command, true);
  xmlhttp.send();
}

function writebar(urlstring) {

  //writes string to bar
  var xmlhttp = new XMLHttpRequest(), state, command;
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      resp_json = this.responseText;
    }       
  }
  //Debug only document.getElementById("numitems").innerHTML=urlstring;
  xmlhttp.open("GET", urlstring, true); //max. 48 characters, otherwise Power Bar does not accept name...
  xmlhttp.send();

}

function withusername() {
  
  document.getElementById("allcontent").hidden = false;
  document.getElementById("btn_username").hidden = true;
  document.getElementById("user_input").hidden = true;
  var username = document.getElementById("id_username").value.trim()
  setCookie(COOKIE_NAME_USERNAME, username, 365); // lifetime 365 days
}


function checkname() {

  document.getElementById("id_username").valid = "true";
  document.getElementById("btn_username").hidden = false;
  document.getElementById("welcome_message").innerHTML="Welcome, " + document.getElementById("id_username").value.trim() + "!";
 
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
  
function delcookie() {
  setCookie(COOKIE_NAME_USERNAME, "",0);
  document.getElementById("usermgmt").hidden = true;
}

function editRecord(row_json) {
  
  document.getElementById("editMask").hidden = false;
  document.getElementById("allcontent").hidden = true;

  var json_string = document.getElementById("tbl_rowjson"+row_json).innerHTML.trim();
  //document.getElementById("mask_text").innerHTML = "Json: " + json_string;
  const row_obj = JSON.parse(json_string);
  const keys = Object.keys(row_obj);
 
  for (let i = 0; i < keys.length; i++) {
    //console.log ("Key: " + keys[i] + " Value: " + row_obj[keys[i]]);
    //get values and decode any specially coded strings
    document.getElementById("structid_"+keys[i]).value = htmlspecialchars_decode(row_obj[keys[i]]);   
  }
}

function edit_save() {
  document.getElementById("editMask").hidden = true;
  document.getElementById("allcontent").hidden = false;
}

function edit_cancel() {
  document.getElementById("editMask").hidden = true;
  document.getElementById("allcontent").hidden = false;

}

// Credits to https://charles-stover.medium.com/phps-htmlspecialchars-implemented-in-javascript-3da9ac36d481
// Create the function.
var htmlspecialchars = function(string) {
  
  // Our finalized string will start out as a copy of the initial string.
  var escapedString = string;

  // For each of the special characters,
  var len = htmlspecialchars.specialchars.length;
  for (var x = 0; x < len; x++) {

    // Replace all instances of the special character with its entity.
    escapedString = escapedString.replace(
      new RegExp(htmlspecialchars.specialchars[x][0], 'g'),
      htmlspecialchars.specialchars[x][1]
    );
  }

  // Return the escaped string.
  return escapedString;
};

// A collection of special characters and their entities.
htmlspecialchars.specialchars = [
  [ '&', '&amp;' ],
  [ '<', '&lt;' ],
  [ '>', '&gt;' ],
  [ '"', '&quot;' ]
];

// Create the function.
var htmlspecialchars_decode = function(string) {
  
  // Our finalized string will start out as a copy of the initial string.
  var unescapedString = string;
  
  //replace only if string is not empty
  if (unescapedString != null) {
    // For each of the special characters,
    var len = htmlspecialchars_decode.specialchars.length;
    for (var x = 0; x < len; x++) {

      // Replace all instances of the entity with the special character.
      unescapedString = unescapedString.replace(
        new RegExp(htmlspecialchars_decode.specialchars[x][1], 'g'),
        htmlspecialchars_decode.specialchars[x][0]
      );
    }
  }

  // Return the unescaped string.
  return unescapedString;
};

htmlspecialchars_decode.specialchars = [
  [ '"', '&quot;' ],
  [ '>', '&gt;' ],
  [ '<', '&lt;' ],
  [ '&', '&amp;' ]
];

</script>

</body>
</html>
