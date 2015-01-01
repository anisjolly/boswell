<div class="row">
  <div class="col-md-6">
    <div class="panel panel-home" data-link="lights">
      <div class="panel-body">
        <h1><i class="fa fa-lightbulb-o"></i></h1>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-home" data-link="weather">
      <div class="panel-body">
        <h1><i class="wi wi-day-cloudy"></i></h1>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="panel panel-home" data-link="music">
      <div class="panel-body">
        <h1><i class="fa fa-music"></i></h1>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-home" data-link="travel">
      <div class="panel-body">
        <h1><i class="fa fa-road"></i></h1>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('.panel-home').click(function(){
    //hide the elements that aren't the clicked one...
    $('.panel-home').not(this).velocity('fadeOut',{duration:300});

    //now hide the clicked element
    $(this).velocity('fadeOut',{duration:600,complete:function() {
      //once it's hidden, push the new state
      var page=$(this).data('link');
      History.pushState({page:page}, 'Boswell', '?page='+page); 
    }});
  });
});
</script>
