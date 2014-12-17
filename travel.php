<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Tube Status</h4>
        <table class="status"> 
          <tr>
            <td class="tfl_tube bakerloo">Bakerloo</td>
            <td id="tfl_tube_status_bakerloo"></td>
          </tr>
          <tr>
            <td class="tfl_tube central">Central</td>
            <td id="tfl_tube_status_central"></td>
          </tr>
          <tr>
            <td class="tfl_tube circle">Circle</td>
            <td id="tfl_tube_status_circle"></td>
          </tr>
          <tr>
            <td class="tfl_tube district">District</td>
            <td id="tfl_tube_status_district"></td>
          </tr>
          <tr>
            <td class="tfl_tube hammersmithandcity">Hammersmith and City</td>
            <td id="tfl_tube_status_hammersmithandcity"></td>
          </tr>
          <tr>
            <td class="tfl_tube jubilee">Jubilee</td>
            <td id="tfl_tube_status_jubilee"></td>
          </tr>
          <tr>
            <td class="tfl_tube metropolitan">Metropolitan</td>
            <td id="tfl_tube_status_metropolitan"></td>
          </tr>
          <tr>
            <td class="tfl_tube northern">Northern</td>
            <td id="tfl_tube_status_northern"></td>
          </tr>
          <tr>
            <td class="tfl_tube piccadilly">Piccadilly</td>
            <td id="tfl_tube_status_piccadilly"></td>
          </tr>
          <tr>
            <td class="tfl_tube victoria">Victoria</td>
            <td id="tfl_tube_status_victoria"></td>
          </tr>
          <tr>
            <td class="tfl_tube waterlooandcity">Waterloo and City</td>
            <td id="tfl_tube_status_waterlooandcity"></td>
          </tr>
          <tr>
            <td class="tfl_tube overground">Overground</td>
            <td id="tfl_tube_status_overground"></td>
          </tr>
          <tr>
            <td class="tfl_tube dlr">DLR</td>
            <td id="tfl_tube_status_dlr"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Departures From Maidenhead</h4>
          <table class="table train_status">
          <tr>
            <th>Time</th>
            <th>Destination</th>
            <th>Status</th>
          </tr>
<?php
$contents=file_get_contents('https://www.firstgreatwestern.co.uk/Services/LDB.aspx?method=departures&crs=MAI');
$trains=json_decode($contents,true);
foreach ($trains[0]['Items'] as $service) {
  echo '<tr>';
  echo '<td>'.$service['STD'].'</td>';
  echo '<td>'.$service['Destinations'][0]['Location'].'</td>';
  echo '<td>'.$service['ETD'].'</td>';
  echo '</tr>';
}
?>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  getTubeStatus();
});
</script>

