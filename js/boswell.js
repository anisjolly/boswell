/* PAGE STUFF */
$(document).ready(function(){
  History.Adapter.bind(window,'statechange',function(){
    var State = History.getState();
    loadContent(State.data.page);
  });

});


function loadPage(page) {
  History.pushState({page:page}, 'Boswell', '?page='+page); 
}


function loadContent(page) {
  page=page+'.php';

  $('#page_content').hide('slide',{direction:'left'},400,function(){
    $.ajax({url:page}).done(function(result){
      $('#page_content').html(result);
      showContent();
    });
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


/* TUBE STUFF */
function getTubeStatus() {
  $.ajax({url:'json.php?action=getTFLStatus',success:function(xml){
    var json=$.xml2json(xml);
    for (i=0;i<json.LineStatus.length;i++) {
      span='#tfl_tube_status_'+json.LineStatus[i].Line['Name'].toLowerCase().replace(/ /g,'');
      $(span).text(json.LineStatus[i].Status['Description']);
    }
  }});
}


/* TRAIN STUFF */

/* might need to change the order of the below perhaps, or run through the results again, adding any that are
not currently listed */
function getTrainDepartures() {
  $.getJSON('json.php?action=getTrainDepartures',function(json){
    $('.service-container').each(function(){
      var exists=false;
      var container=this;
      $.each(json.GetStationBoardResult.trainServices.service,function(i, service){
        if ($(container).data('id')==service.serviceID) exists=true;
      });
      if (exists==false)
        $(container).remove();
    });
  });
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


/* LIGHTS STUFF */

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

function getTime(){$.getJSON("json.php?action=time",function(e){$("#time").html(e.time)})}


/* WEATHER STUFF */

function getWeather(){$.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Maidenhead,GB",function(e){id=e.weather[0].id;sunrise=e.sys.sunrise;sunset=e.sys.sunset;temperature=e.main.temp-273.15;temperature=Math.round(temperature*10)/10;$("#weather_icon").removeClass();$("#weather_icon").addClass(wiclass(id,sunrise,sunset));$("#weather_temperature").html(temperature)})}

function wiclass(e,t,n){var r=new Date;var i=Math.round((new Date).getTime()/1e3);var s="night";if(i>t&&i<n)s="day";var o="wi wi-"+s+"-";switch(e){case 200:case 230:case 231:case 232:o+="storm-showers";break;case 201:case 202:case 210:case 211:case 212:case 221:case 901:case 960:case 961:o+="thunderstorm";break;case 300:case 301:case 302:case 310:case 311:case 312:case 313:case 314:case 321:o+="showers";break;case 500:case 501:case 502:case 503:case 504:case 511:case 520:case 521:case 522:case 531:case 611:case 612:case 615:case 616:o+="rain";break;case 600:case 601:case 602:case 620:case 621:case 622:o+="snow";break;case 701:case 721:case 731:case 741:case 751:case 762:case 771:case 711:case 761:o+="fog";break;case 781:case 900:o="wi-tornado";break;case 800:case 951:if(s=="day")o+="sunny";else o+="clear";break;case 801:case 802:case 803:case 804:o+="cloudy";break;case 902:case 962:o="wi-hurricane";break;case 903:o="wi-snowflake-cold";break;case 904:o="wi-hot";break;case 905:case 952:case 953:case 954:case 955:o="wi-windy";break;case 906:o="wi-hail";break;case 956:case 957:case 958:case 959:o="wi-strong-wind";break;default:o="wi-refresh";break}return o}
