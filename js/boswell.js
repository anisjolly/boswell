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

function getTubeStatus() {
  $.ajax({url:'json.php?action=getTFLStatus',success:function(xml){
    var json=$.xml2json(xml);
    for (i=0;i<json.LineStatus.length;i++) {
      span='#tfl_tube_status_'+json.LineStatus[i].Line['Name'].toLowerCase().replace(/ /g,'');
      $(span).text(json.LineStatus[i].Status['Description']);
    }
  }});
}

function getTrainStatus() {
//  $.getJSON('json.php?action=getTrainDepartures',function(json){
//    $('#train_content').hide();;
//    //$('#train_content').empty();
//    var count=0;
//    var rows='';
//    $.each(json[0].Items,function(i, service){
//      if (count<6) {
//        rows+='<div class="row"><div class="col-md-2">'+service.STD+'</div><div class="col-md-7">'+service.Destinations[0].Location+'</div><div class="col-md-3">'+service.ETD+'</div></div>';
//        count++;
//      }
//    });
//    if (count==6) rows+='<p class="more-ellipsis"><i class="fa fa-plus-circle"></i></p>'; 
//
//    $('#train_content').append(rows);
// //   $('#train_content_more').hide();;
// //   $('#train_wait').slideUp(150,function() {
// //     $('#train_content').slideDown(300,function() {
// //     });
// //   });
//  });
}

function getTrainServiceDetail(panel) {
  var id=$(panel).data('id');
  var url='json.php?action=getTrainServiceDetail&id='+encodeURIComponent(id);
  $.getJSON(url,function(json){
    var text='<p>Platform: ';
    if (json.GetServiceDetailsResult.platform!='')
      text+=json.GetServiceDetailsResult.platform;
    else
      text+='TBC';
    text+='<span class="pull-right">'+json.GetServiceDetailsResult.operator+'</span></p>';
    text+='<p>Calling at:</p>';
    text+='<table class="table table-condensed ">';

    $.each(json.GetServiceDetailsResult.subsequentCallingPoints.callingPointList.callingPoint,function(i, callingPoint){
      text+='<tr><td>'+callingPoint.locationName+'</td><td>'+callingPoint.st+'</td><td';
      if (callingPoint.et!='On time') text+=' class="text-danger"';
      text+='>'+callingPoint.et+'</td></tr>';
    }); 

    text+='</table>';

    $(panel).find('.service-detail').html(text);
  });
}

function getTime() {
  $.getJSON("json.php?action=time",function(result){
    page_updateTime(result.time); 
  });
}

function showContent() {
  $('#page_content > .row').children().hide({complete:function() {
    $('#page_content').fadeIn(100);
    $('#page_content > .row').children().each(function(index){
      $(this).delay(50*index).fadeIn(300);
    });
  }});
}

function loadPage(page) {
  page=page+'.php';

  $('#page_content').hide('slide',{direction:'left'},400,function(){

    $.ajax({url:page}).done(function(result){
      $('#page_content').html(result);
      showContent();
    });

  });

}

function refreshLights() {
  $('.boswell-light i').each(function(i, light){
    $.getJSON("json.php?action=getLights&idx="+$(light).data('idx'),function(json){
      if (json.result[0].Status!='Off')
        $(light).attr('class','on');
      else
        $(light).attr('class','off');
    });
  });
}
function toggleLight(light) {
  var state='On';
  if ($(light).attr('class')=='on') 
    state='Off';

  var url='json.php?action=setLight&state='+state+'&idx='+$(light).data('idx');

  $.getJSON(url,function(json){
    if (json.status=="OK") {
      if ($(light).attr('class')=='on') 
        $(light).attr('class','off');
      else
        $(light).attr('class','on');
    }
    //leave it half a second, then check in case that light has any slaves...
    setTimeout(function(){refreshLights();},1000);
  });
}
