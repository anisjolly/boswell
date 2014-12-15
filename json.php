<?php

if (!isset($_GET['action'])) die;

$action=$_GET['action'];

$out=array();
switch ($action) {
  case "time":
    $out['time']=date('G:i');
    $out['shortdate']=date('j/n/y');
    $out['timestamp']=date('U');
  break;

}

$strout='{';
$count=0;
if (count($out)>0) {
  foreach($out as $key=>$val) {
    if ($count>0)
      $strout.=',';
    $strout.='"'.$key.'":"'.$val.'"';
    $count++;
  }
}
$strout.='}';


echo $strout;
?>
