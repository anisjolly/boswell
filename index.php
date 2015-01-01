<?php
$_page='main';
if (isset($_GET['page'])) {
  $_page=$_GET['page'];
}
?>

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
    <!--<link href="css/jquery-ui.min.css" rel="stylesheet">-->


  </head>

  <body>
  
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <span class="navbar-back"><i class="fa fa-arrow-left"></i></span>
          <span class="navbar-brand" onclick="loadPage('main')"><img src="images/icon_small.png"> Boswell</span>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav navbar-right">
            <li><a><i class="fa fa-clock-o"></i> <span id="time"></span></a></li>
            <li><a><i id="weather_icon"></i><i class="wi wi-thermometer"></i> <span id="weather_temperature">13</span>&deg;C</a></li>
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
    <script src="js/jquery.history.js"></script>
    <script src="js/velocity.min.js"></script>
	  
<script>
$(document).ready(function(){
  $('.navbar-right').hide();
  getWeather();
  getTime();
  $('.navbar-right').fadeIn();

  loadContent('<?php echo $_page; ?>');

  setInterval(function(){getWeather()},1800000);
  setInterval(function(){getTime()},60000);

});

</script>
</body>
</html>
