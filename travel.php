<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Tube Status</h4>
        <!--<table class="table table-condensed tfl_tube_status">-->
        <table class="tfl_tube_status"> 
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

  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Departures from Maidenhead</h4>

        <div class="container-fluid div-table">
          <div class="row header">
            <div class="col-md-2">Time</div>
            <div class="col-md-7">Destination</div>
            <div class="col-md-3">Status</div>
          </div>
          <div id="train_content">

          </div>
        </div>

        <button type="button" id="train_show_more" class="btn btn-primary btn-block" data-position="up"><i class="fa fa-chevron-circle-down"></i></button>
        <p id="train_wait" class="text-center"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</p>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#train_show_more').hide();
  getTubeStatus();
  getTrainStatus();

  $('#train_show_more').click(function(){
    if ($('#train_show_more').data('position')=='up') {
      $('#train_content_more').slideDown(300);
      $('#train_show_more i').removeClass('fa-chevron-circle-down');
      $('#train_show_more i').addClass('fa-chevron-circle-up');
      $('#train_show_more').data('position','down');
    } else {
      $('#train_content_more').slideUp(300);
      $('#train_show_more i').removeClass('fa-chevron-circle-up');
      $('#train_show_more i').addClass('fa-chevron-circle-down');
      $('#train_show_more').data('position','up');
    }
    $('#train_show_more').blur();
  });
});

</script>
