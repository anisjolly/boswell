<?php

require("libs/OpenLDBWS.php");
$openldbws = new OpenLDBWS('4b58bab8-22d9-4a31-937a-9a6649e0134f');
$text = $openldbws->GetDepartureBoard(10,"MAI");

echo '<div class="row"><h2>Services from '.$text->GetStationBoardResult->locationName.'</h2></div>'.chr(10);

echo '<div class="row">'.chr(10);
echo '  <div class="col-md-8">'.chr(10);
$count=0;
foreach ($text->GetStationBoardResult->trainServices->service as $service) {

  echo '    <div class="panel panel-default service-container" data-id="'.$service->serviceID.'">'.chr(10);
  echo '      <div class="panel-body">'.chr(10);
  echo '        <h4>'.$service->std.' - '.$service->destination->location->locationName.'<span class="pull-right'.($service->etd=='On time'? '">' : ' text-danger"><i class="fa fa-exclamation-circle"></i> ').$service->etd.'</span></h4>'.chr(10);
  echo '        <div class="service-detail" data-shown="false"></div>'.chr(10);
  echo '      </div>'.chr(10);
  echo '    </div>'.chr(10);

}

?>
</div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Service Messages</h4>
        <p><?php

$service_msg=$text->GetStationBoardResult->nrccMessages->message->_;
if ($service_msg=='')
  echo "No current service messages";
else
  echo $service_msg;
?></p>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('.service-container').each(function(){
    getTrainServiceDetail(this);
  });

  //now, we need a way to update the departure board (remove dead entries and add new ones *without* refreshing the page). Then, we need to call getTrainServiceDetail as above *once* we've checked they're all valid. We can use the data-id attribute to check whether the service is valid and remove the ones that aren't. Then, just some code to add the new services in using the same format. Easy peasy.

  $('.service-container').click(function(){
    var box=$(this).find('.service-detail');
    if ($(box).data('shown')==false) {
      $(box).slideDown(200);
      $(box).data('shown',true);
    } else {
      $(box).slideUp(200);
      $(box).data('shown',false);
    }
  });

  setInterval(function() { getTrainDepartures(); }, 60000);
})
</script>
