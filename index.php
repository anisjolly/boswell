<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Boswell</title>

    <link href="css/boswell.css" rel="stylesheet">
    <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="weather-icons-1.3/css/weather-icons.min.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">


  </head>

  <body>
  
      <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="/" class="navbar-brand"><i class="fa fa-male"></i> Boswell</a>

          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
<!--
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Show Me <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="../default/">Default</a></li>
                <li class="divider"></li>
                <li><a href="../cerulean/">Cerulean</a></li>
                <li><a href="../cosmo/">Cosmo</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Link</a>
            </li>
-->
<!--
            <li>
              <a href="#"><i class="fa fa-cogs"></i> Settings</a>
            </li>
-->
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-clock-o"></i> <span id="time"></span></a></li>
            <li><a href="#"><i id="weather_icon"></i><i class="wi wi-thermometer"></i> <span id="weather_temperature">13</span>&deg;C</a></li>
          </ul>


        </div>
      </div>
    </div>


    <div class="container-fluid">
      <div class="page-header page-notitle"></div>
      <div id="page_content">

      </div> <!-- /page_content -->
    </div> <!-- /container -->

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/boswell.js"></script>
    <script src="js/jquery.xml2json.js"></script>
	  
<script>
$(document).ready(function(){
  
  $('.navbar-right').hide();
  getWeather();
  getTime();
  $('.navbar-right').fadeIn();

  loadPage('main');

  setInterval(function(){
    getWeather();
  },1800000);
  setInterval(function(){
    getTime();
  },60000);

});

function page_updateWeather(_wiclass,_temperature) {
  $("#weather_icon").removeClass();
  $("#weather_icon").addClass(_wiclass);
  $("#weather_temperature").html(_temperature);
}
function page_updateTime(inTime) {
  $('#time').html(inTime);
}

</script>
</body>
</html>
