<div class="row"> 
  <div class="col-md-4">
    <div class="panel panel-default" onclick="loadPage('tfl_tube')">
      <div class="panel-body">
        <h4>Tube Status</h4>
        <table class="tfl_tube_status"> 
<?php
$str=file_get_contents('http://cloud.tfl.gov.uk/TrackerNet/LineStatus');
$xml=simplexml_load_string($str);
foreach ($xml->LineStatus as $line) {
  $sn=str_replace(' ','',strtolower($line->Line['Name']));
  echo '          <tr>'.chr(10);
  echo '            <td class="tfl_tube '.$sn.'">'.$line->Line['Name'].'</td>'.chr(10);
  echo '            <td id="tfl_tube_status_'.$sn.'">'.$line->Status['Description'].'</td>'.chr(10);
  echo '          </tr>'.chr(10);
}
?>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="panel panel-default" id="train-panel" onclick="loadPage('trains')">
      <div class="panel-body">
        <h4>Departures from Maidenhead</h4>

        <div class="container-fluid div-table">
          <div class="row header">
            <div class="col-md-2">Time</div>
            <div class="col-md-7">Destination</div>
            <div class="col-md-3">Due</div>
          </div>
          <div id="service-content">
<?php
require("libs/OpenLDBWS.php");
$openldbws = new OpenLDBWS('4b58bab8-22d9-4a31-937a-9a6649e0134f');
$text = $openldbws->GetDepartureBoard(10,"MAI");
$count=0;
foreach ($text->GetStationBoardResult->trainServices->service as $service) {
  $count++; if ($count>6) break;
  echo '            <div class="row">'.chr(10);
  echo '              <div class="col-md-2">'.$service->std.'</div>'.chr(10);
  echo '              <div class="col-md-7">'.$service->destination->location->locationName.'</div>'.chr(10);
  echo '              <div class="col-md-3">'.$service->etd.'</div>'.chr(10);
  echo '            </div>'.chr(10);
}
?>
          </div>
        </div> <!-- container-fluid / div-table -->
      </div> <!-- panel-body -->
    </div> <!-- panel -->
  </div> <!-- column -->
</div> <!-- row -->

<script>
$(document).ready(function(){
  setInterval(function(){
    getTubeStatus();
  }, 60000);
  //getTrainStatus();

//  $('#train-panel').click(function() {
//    loadPage('train_departures');
//  });
});

</script>
