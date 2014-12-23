<?php
$contents=file_get_contents('http://192.168.1.52:8080/json.htm?type=command&param=getlightswitches');
$lights=json_decode($contents,true);

$room='';
$count=0;
foreach ($lights['result'] as $val) {
  if ($room!=substr($val['Name'],0,strpos($val['Name'],' '))) {
    if ($count>0) {
      $count=0;
      echo '</div>'.chr(10);
    }
    $room=substr($val['Name'],0,strpos($val['Name'],' '));
    echo '<div class="row">'.chr(10);
    echo '  <h2>'.$room.'</h2>'.chr(10);
    echo '</div>'.chr(10);
  }
  $name=substr($val['Name'],strpos($val['Name'],' ')+1);

  if ($count==0)
    echo '<div class="row">'.chr(10);

  echo '  <div class="col-md-3">'.chr(10);
  echo '    <div class="panel panel-default boswell-light">'.chr(10);
  echo '      <div class="panel-body">'.chr(10);
  echo '        <h4>'.$name.'</h4>'.chr(10);
  echo '        <i class="off" data-idx="'.$val['idx'].'"></i>'.chr(10);
  echo '      </div>'.chr(10);
  echo '    </div>'.chr(10);
  echo '  </div>'.chr(10);

  if ($count==3) {
    echo '</div>'.chr(10);
    $count=0;
  } else
    $count++;
} 
if ($count>0)
  echo '</div>'.chr(10);
?>

<script>
$('document').ready(function() {
  refreshLights();
  setInterval(function(){refreshLights();},10000);
});

$('.boswell-light').click(function() {
  toggleLight($(this).find('i'));
});
</script>
