function getWeather() {
  $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Maidenhead,GB",function(result){
    id=result.weather[0].id;
    sunrise=result.sys.sunrise;
    sunset=result.sys.sunset;
    temperature=(result.main.temp-273.15);
    temperature=Math.round(temperature*10)/10;
    page_updateWeather(wiclass(id,sunrise,sunset),temperature);
  });
}

function wiclass(id, sunrise, sunset) {
  var _date = new Date();
  var _time = Math.round(new Date().getTime() / 1000) 
  var _day = "night";

  if (_time > sunrise && _time < sunset)
    _day="day";

  var condition="wi wi-"+_day+"-";

  switch (id) {
    case 200:  
    case 230:
    case 231:
    case 232:
      condition+="storm-showers";
      break;

    case 201:
    case 202:
    case 210:
    case 211:
    case 212:
    case 221:
    case 901:
    case 960:
    case 961:
      condition+="thunderstorm";
      break;

    case 300:
    case 301:
    case 302:
    case 310:
    case 311:
    case 312:
    case 313:
    case 314:
    case 321:
      condition+="showers";
      break;
 
    case 500:
    case 501:
    case 502:
    case 503:
    case 504:
    case 511:
    case 520:
    case 521:
    case 522:
    case 531:
    case 611:
    case 612:
    case 615:
    case 616:
      condition+="rain";
      break;

    case 600:
    case 601:
    case 602:
    case 620:
    case 621:
    case 622:
      condition+="snow"; 
      break;

    case 701:
    case 721:
    case 731:
    case 741:
    case 751:
    case 762:
    case 771:
    case 711:
    case 761:
      condition+="fog";
      break;

    case 781: 
    case 900:
      condition="wi-tornado";
      break;

    case 800:
    case 951:
      if (_day=="day")
        condition+="sunny";
      else
        condition+="clear";
      break;

    case 801:
    case 802:
    case 803:
    case 804:
      condition+="cloudy";
      break; 

    case 902:
    case 962:
      condition="wi-hurricane";
      break;

    case 903:
      condition="wi-snowflake-cold";
      break;

    case 904:
      condition="wi-hot";
      break;

    case 905:
    case 952:
    case 953:
    case 954:
    case 955:
      condition="wi-windy";
      break;

    case 906:
      condition="wi-hail";
      break;

    case 956:
    case 957:
    case 958:
    case 959:
      condition="wi-strong-wind";
      break;
    default:
      condition="wi-refresh";
      break;
  } 

   return condition;
}

function getLights() {
  var content='';
  $.getJSON("json.htm?type=command&param=getlightswitches",function(result){
    $.each(result.result, function () {
       content+="<p>"+$(this).Name+"</p>";  
    });
  $('#page_content').append(content);
  });
}

function getTubeStatus() {
  $.ajax({url:'get_tflTube.php',success:function(xml){
    var json=$.xml2json(xml);
    for (i=0;i<json.LineStatus.length;i++) {
      span='#tfl_tube_status_'+json.LineStatus[i].Line['Name'].toLowerCase().replace(/ /g,'');
      $(span).text(json.LineStatus[i].Status['Description']);
    }
  },error:function(){
    alert('error fetching TFL data');
  }});
}

function getTime() {
  $.getJSON("json.php?action=time",function(result){
    page_updateTime(result.time); 
  });
}

function showContent() {
  $('#page_content').find('.panel').hide();
  $('#page_content').fadeIn(100);
  $('#page_content .panel').each(function(index){
    $(this).delay(50*index).fadeIn(300);
  });
}

function loadPage(page) {
  page=page+'.php';
  $('#page_content').effect('slide',{direction:'left',mode:'hide'},500,function(){
    $.ajax({url:page}).done(function(result){
      $('#page_content').html(result);
      showContent();
    });
  });
}
