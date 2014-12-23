<?php
$str=file_get_contents('http://cloud.tfl.gov.uk/TrackerNet/LineStatus');
$xml=simplexml_load_string($str);
$count=0;
$notgood=0;

foreach ($xml->LineStatus as $key=>$line) {
  $sn=str_replace(' ','',strtolower($line->Line['Name']));
  if ($line['StatusDetails']!='') {
    if ($notgood==0)
      echo '<div class="row"><h2>Disruptions</h2></div>'.chr(10);
     
    if ($count==0) echo '<div class="row">'.chr(10); 

    echo '    <div class="col-md-4">'.chr(10);
    echo '      <div class="panel panel-default tfltube">'.chr(10);
    echo '        <div class="panel-heading tfltube '.$sn.'">'.chr(10);
    echo '          '.$line->Line['Name'].chr(10);
    echo '        </div>'.chr(10);
    echo '        <div class="panel-body">'.chr(10);
    echo '          '.$line['StatusDetails'].chr(10);
    echo '        </div>'.chr(10).'      </div>'.chr(10).'    </div>'.chr(10);

    if ($count==2) {
      $count=0;
      echo '  </div>'.chr(10);
    } else $count++;

    $notgood++;
  }
}
if ($count>0) echo '</div>'.chr(10);

if ($count<count($xml->LineStatus))
  echo '<div class="row"><h2>Good Service</h2></div>'.chr(10);

$count=0;
foreach ($xml->LineStatus as $key=>$line) {
  $sn=str_replace(' ','',strtolower($line->Line['Name']));

  if ($line['StatusDetails']=='') {
    if ($count==0) echo '<div class="row">'.chr(10);
      
    echo '    <div class="col-md-3">'.chr(10);
    echo '      <div class="panel panel-default tfltube">'.chr(10);
    echo '        <div class="panel-heading tfltube '.$sn.'">'.chr(10);
    echo '          '.$line->Line['Name'].chr(10);
    echo '        </div>'.chr(10);
    echo '        <div class="panel-body">'.chr(10);
    echo '         '.$line->Status['Description'].chr(10);
    echo '        </div>'.chr(10).'      </div>'.chr(10).'    </div>'.chr(10);
    if ($count==3) {
      $count=0;
      echo '</div>'.chr(10);
    } else {
      $count++;
    }
  }
}
if ($count>0) echo '</div>'.chr(10);
?>

<script>
</script>
