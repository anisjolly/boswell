<?php
$contents=file_get_contents('http://192.168.1.52:8080/json.htm?type=command&param=getlightswitches');
$lights=json_decode($contents,true);

$room='';
$count=0;
foreach ($lights['result'] as $val) {
  $count++;
  if ($room!=substr($val['Name'],0,strpos($val['Name'],' '))) {
    $room=substr($val['Name'],0,strpos($val['Name'],' '));
    echo '<h2>'.$room.'</h2>'.chr(10);
  }
  $name=substr($val['Name'],strpos($val['Name'],' ')+1);

  if ($count==0)
    echo '<div class="row">'.chr(10);

  echo '  <div class="col-md-4">'.chr(10);
  echo '    <div class="panel panel-default boswell-light">'.chr(10);
  echo '      <div class="panel-body">'.chr(10);
  echo '        <h4>'.$name.'</h4>';
  echo '        <i class="off" data-idx="'.$val['idx'].'"></i>'.chr(10);
  echo '      </div>'.chr(10);
  echo '    </div>'.chr(10);
  echo '  </div>'.chr(10);

  if ($count==0)
    echo '</div>'.chr(10);

  if ($count==3)
    $count=0;
} 
if ($count>0)
  echo '</div>'.chr(10);
?>

<script>
$('document').ready(function() {
  refreshLights();
});

$('.boswell-light').click(function() {
  var light=$(this).find('i');
  if ($(light).attr('class')=='on') {
    $(light).attr('class','off');
  } else {
    $(light).attr('class','on');
  }
});
</script>
