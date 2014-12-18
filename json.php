<?php

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

$action=$_GET['action'];

switch ($action) {
  case "time":
    $time=array();
    $time['time']=date('G:i');
    $time['shortdate']=date('j/n/y');
    $time['timestamp']=date('U');
    $result=json_from_array($time);
    break;
  case "lightstatus":
    if (isset($_GET['idx']))
      $result=file_get_contents('http://192.168.1.52:8080/json.htm?type=devices&rid='.$_GET['idx']);
    break;
}

echo $result;
?>
