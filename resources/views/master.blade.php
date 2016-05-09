<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VConnect</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- Bootstrap -->
    <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--calendar -->
    <link href="{{ URL::asset('calendar/css/responsive-calendar.css') }}" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- calendar js -->
    <script src="{{ URL::asset('calendar/js/responsive-calendar.js')}}"></script>

    	
</head>
<body style="padding-top: 50px; ">
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav" style="float:right">
             @if(Session::get('loggin_status')!=true)
	           <li><a href="{{ url('/login') }}">{{ Lang::get('dictionary.get_in') }}</a></li>
	           <li><a href="{{ url('/register') }}">{{ Lang::get('dictionary.register') }}</a></li>
             @else 
               <li><a href="{{ url('/start') }}">{{ Lang::get('dictionary.start') }}</a></li>
               <li><a href="{{ url('/youraccount') }}">{{ Lang::get('dictionary.your_account') }}</a></li> 
               <li><a href="{{ url('/doLogout') }}">{{ Lang::get('dictionary.logout') }}</a></li>
             @endif  
            <button type="button" class="btn btn-success navbar-btn"><a href="{{ url('/contract_cleaning') }}" style="color:white;">{{ Lang::get('dictionary.contract_cleaning') }}</a></button>
	        <li><a href="{{ url('/help') }}">{{ Lang::get('dictionary.help') }}</a></li>
	     	
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	@yield('content')

	
<script type="text/javascript">
    $(document).ready(function () {
        // geting events on date
        $.ajax({
            url: "../getEvents/",
            type: "get",
            dataType: 'json',
            // async:true,
            success: function(data){
                //console.log(data);
                var event_arr = {};
                data.forEach(function(event){
                    event_arr[event.date]={"url":"{{url('showAllEvents')}}"+"/"+event.date};
                });
                var today = new Date();
                today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $(".responsive-calendar").responsiveCalendar({
                    time: today,
                    events: event_arr
                });
            },
            error: function(data)
            {
                console.log("error",data);
            }
        });
    });

    /*popover starts*/
    var originalLeave = $.fn.popover.Constructor.prototype.leave;
    $.fn.popover.Constructor.prototype.leave = function(obj){
        var self = obj instanceof this.constructor ?
                obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
        var container, timeout;

        originalLeave.call(this, obj);

        if(obj.currentTarget) {
            container = $(obj.currentTarget).siblings('.popover')
            timeout = self.timeout;
            container.one('mouseenter', function(){
                //We entered the actual popover – call off the dogs
                clearTimeout(timeout);
                //Let's monitor popover content instead
                container.one('mouseleave', function(){
                    $.fn.popover.Constructor.prototype.leave.call(self, self);
                });
            })
        }
    };
    $('body').popover({ selector: '[data-popover]', trigger: 'click hover', placement: 'auto', content :'content', delay: {show: 50, hide: 400}});
    // popover ends
</script>

</body>
</html>