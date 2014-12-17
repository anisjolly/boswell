<?php
$contents=file_get_contents('http://192.168.1.52:8080/json.htm?type=command&param=getlightswitches');
$lights=json_decode($contents,true);

$room='';
foreach ($lights['result'] as $val) {
  if ($room!=substr($val['Name'],0,strpos($val['Name'],' '))) {
    $room=substr($val['Name'],0,strpos($val['Name'],' '));
    echo '<h2>'.$room.'</h2>'.chr(10);
  }
  $name=substr($val['Name'],strpos($val['Name'],' ')+1);
  echo '<div class="row">'.chr(10);
  echo '  <div class="col-md-2">'.chr(10);
  echo '    <div class="panel panel-default">'.chr(10);
  echo '    <i class="fa fa-lightbulb-o"></i>'.chr(10);
  echo '    </div>'.chr(10);
  echo '  </div>'.chr(10);
  echo '  <div class="col-md-8">'.chr(10);
  echo '    <div class="panel panel-default">'.chr(10);
  echo '      '.$name.chr(10);
  echo '    </div>'.chr(10);
  echo '  </div>'.chr(10);
  echo '  <div class="col-md-2">'.chr(10);
  echo '    <div class="panel panel-default">'.chr(10);
  echo '    </div>'.chr(10);
  echo '  </div>'.chr(10);
  echo '</div>'.chr(10);
} 
//echo $lights['result'][0]['Name'];
//var_dump($lights);
?>
