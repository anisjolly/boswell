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
            <li>
              <a href="#"><i class="fa fa-cogs"></i> Settings</a>
            </li>
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

      <div class="row">
		<div class="col-md-6">
		  <a href="#">
			<div class="panel panel-default panel-home">
				<div class="panel-body">
					<h1><i class="fa fa-lightbulb-o"></i> Lighting</h1>
				</div>
			</div>
		  </a>
		</div>
        <div class="col-md-6">
		  <a href="#">
			<div class="panel panel-default panel-home">
				<div class="panel-body">
					<h1><i class="fa fa-music"></i> Sound</h1>
				</div>
			</div>
		  </a>
		</div>
	  </div>

      <div class="row">
		<div class="col-md-6">
		  <a href="#">
			<div class="panel panel-default panel-home">
				<div class="panel-body">
					<h1><i class="fa fa-road"></i> Travel</h1>
				</div>
			</div>
		  </a>
		</div>
        <div class="col-md-6">
		  <a href="#">
			<div class="panel panel-default panel-home">
				<div class="panel-body">
					<h1><i class="fa fa-lightbulb-o"></i> Lighting</h1>
				</div>
			</div>
		  </a>
		</div>
	  </div>
	  
<!--
      <div class="row">
        <div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
				<p><strong>title</strong></p>
				</p>.col-md-4</p>
				</div>
			</div>
		</div>
        <div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
				<p><strong>title</strong></p>
				</p>.col-md-4</p>
				</div>
			</div>
		</div>
        <div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
				<p><strong>title</strong></p>
				</p>.col-md-4</p>
				</div>
			</div>
		</div>
      </div>

      <h3>Three unequal columns</h3>
      <p>Get three columns <strong>starting at desktops and scaling to large desktops</strong> of various widths. Remember, grid columns should add up to twelve for a single horizontal block. More than that, and columns start stacking no matter the viewport.</p>
      <div class="row">
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
				</div>
			</div>		
		</div>
        <div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
				</div>
			</div>		
		</div>
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
				</div>
			</div>		
		</div>
      </div>

      <h3>Two columns</h3>
      <p>Get two columns <strong>starting at desktops and scaling to large desktops</strong>.</p>
      <div class="row">
        <div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
				</div>
			</div>		
		</div>
        <div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
				</div>
			</div>		
		</div>
      </div>

      <h3>Sunrise/Sunset</h3>
      <p class="text-warning">http://www.earthtools.org/sun/51.5217/0.7177/9/12/0/1</p>
	  <p>http://www.earthtools.org/sun/&lt;latitude&gt;/&lt;longitude&gt;/&lt;day&gt;/&lt;month&gt;/&lt;timezone&gt;/&lt;dst&gt;<p>
	  <p>where:</ul>
	  <dl>
	  <dt>latitude</dt><dd>decimal latitude of the point to query (from -90 to 90).</dd>
	  <dt>longitude</dt><dd>decimal longitude of the point to query (from -180 to 180).</dd>
	  <dt>day</dt><dd>day to query (from 1 through 31).</dd>
	  <dt>month</dt><dd>month to query (from 1 through 12).</dd>
	  <dt>timezone</dt><dd>hours offset from UTC (from -12 to 14). Alternatively, use '99' as the timezone in order to automatically work out the timezone based on the given latitude/longitude.</dd>
	  <dt>dst</dt><dd>whether daylight saving time should be taken into account (either 0 for no or 1 for yes).</dd>
	  </dl>
-->

<!--
	  
      <h3>Two columns with two nested columns</h3>
      <p>Per the documentation, nesting is easy—just put a row of columns within an existing column. This gives you two columns <strong>starting at desktops and scaling to large desktops</strong>, with another two (equal widths) within the larger column.</p>
      <p>At mobile device sizes, tablets and down, these columns and their nested columns will stack.</p>
      <div class="row">
        <div class="col-md-8">
          .col-md-8
          <div class="row">
            <div class="col-md-6">.col-md-6</div>
            <div class="col-md-6">.col-md-6</div>
          </div>
        </div>
        <div class="col-md-4">.col-md-4</div>
      </div>


      <hr>

      <h3>Mixed: mobile and desktop</h3>
      <p>The Bootstrap 3 grid system has four tiers of classes: xs (phones), sm (tablets), md (desktops), and lg (larger desktops). You can use nearly any combination of these classes to create more dynamic and flexible layouts.</p>
      <p>Each tier of classes scales up, meaning if you plan on setting the same widths for xs and sm, you only need to specify xs.</p>
      <div class="row">
        <div class="co-xs-12 col-md-8">.col-xs-12 .col-md-8</div>
        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
      </div>
      <div class="row">
        <div class="col-xs-6">.col-xs-6</div>
        <div class="col-xs-6">.col-xs-6</div>
      </div>

      <hr>

      <h3>Mixed: mobile, tablet, and desktop</h3>
      <p></p>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">.col-xs-12 .col-sm-6 .col-lg-8</div>
        <div class="col-xs-6 col-lg-4">.col-xs-6 .col-lg-4</div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
      </div>

     <hr>

      <h3>Column clearing</h3>
      <p><a href="http://getbootstrap.com/css/#grid-responsive-resets">Clear floats</a> at specific breakpoints to prevent awkward wrapping with uneven content.</p>
      <div class="row">
        <div class="col-xs-6 col-sm-3">
          .col-xs-6 .col-sm-3
          <br>
          Resize your viewport or check it out on your phone for an example.
        </div>
        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>

-->

        <!-- Add the extra clearfix for only the required viewport -->

<!--
        <div class="clearfix visible-xs"></div>

        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
      </div>

      <hr
      <h3>Offset, push, and pull resets</h3>
      <p>Reset offsets, pushes, and pulls at specific breakpoints.</p>
      <div class="row">
        <div class="col-sm-5 col-md-6">.col-sm-5 .col-md-6</div>
        <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">.col-sm-5 .col-sm-offset-2 .col-md-6 .col-md-offset-0</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-6">.col-sm-6 .col-md-5 .col-lg-6</div>
        <div class="col-sm-6 col-md-5 col-md-offset-2 col-lg-6 col-lg-offset-0">.col-sm-6 .col-md-5 .col-md-offset-2 .col-lg-6 .col-lg-offset-0</div>
      </div>
-->
	  </div> <!-- /container -->

	  <script src="js/jquery-1.10.2.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
          <script src="js/boswell.js"></script>
	  
<script>
$(document).ready(function(){
  getWeather();
  getTime();
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
