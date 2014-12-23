<?php
require("libs/OpenLDBWS.php");

if (!isset($_GET['action'])) die;

function json_from_array($array) {
  $strout='{';
  $count=0;
  if (count($array)>0) {
    foreach($array as $key=>$val) {
      if ($count>0)
        $strout.=',';
      $strout.='"'.$key.'":"'.$val.'"';
      $count++;
    }
  }
  $strout.='}';
  return $strout;
}


function set_light() {
  $url='http://192.168.1.52:8080/json.htm?type=command&param=switchlight&idx='.$_GET['idx'].'&switchcmd='.$_GET['state'];
  $out=file_get_contents($url);
  return $out;
}

function get_tfl_status() {
  return file_get_contents('http://cloud.tfl.gov.uk/TrackerNet/LineStatus');
}

function get_train_departures() {
  $openldbws = new OpenLDBWS('4b58bab8-22d9-4a31-937a-9a6649e0134f');
  $json = $openldbws->GetDepartureBoard(10,"MAI");
  return json_encode($json);
}

function get_train_service_detail($id) {
  $openldbws = new OpenLDBWS('4b58bab8-22d9-4a31-937a-9a6649e0134f');
  $json = $openldbws->GetServiceDetails($id);
  return json_encode($json);
}

$action=$_GET['action'];

switch ($action) {
  case "time":
    $time=array();
    $time['time']=date('G:i');
    $time['shortdate']=date('j/n/y');
    $time['timestamp']=date('U');
    $result=json_from_array($time);
    break;
  case "getLights":
    if (isset($_GET['idx']))
      $result=file_get_contents('http://192.168.1.52:8080/json.htm?type=devices&rid='.$_GET['idx']);
    break;
  case 'setLight':
    $result=set_light();
    break;
  case 'getTFLStatus':
    $result=get_tfl_status();
    break;
  case 'getTrainDepartures':
    $result=get_train_departures();
    break;
  case 'getTrainServiceDetail':
    $in=$_GET['id'];
    $result=get_train_service_detail($in);
   break;
}

echo $result;
?>
