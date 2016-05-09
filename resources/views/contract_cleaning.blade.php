@extends('master')

@section('content')

    <link href="{{ URL::asset('calendar/css/responsive-calendar.css') }}" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <!-- calendar -->
        <!-- Include Bootstrap Datepicker -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

 <style type="text/css">
	/**
	 * Override feedback icon position
	 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
	 */
	 .table-condensed {
	 	width:408px;
	 }
	 .calendar_panel{
	    border: 1px solid;
	    border-color: lightgray;
	 }
	 .submit_btn{
		width:100%;
		height:70px;
		font-size: x-large;
	}

 </style>

 
<!-- <div class="container">
	<div class="row">
		<div class="col-md-3">
			<form>
				<fieldset>
					<div class="form-group">
						<label class="control-label">Before:</label>
						<input class="form-control" type="number" value="1" min="1" max="10" />
					</div>
					<div class="form-group">
						<label class="control-label">After:</label>
						<input id="after2" class="form-control" type="number" value="1" min="1" max="10" />
					</div>
					<div class="form-group">
						<label class="control-label">Colorful:</label>
						<input id="colorful" class="form-control" type="number" value="1" min="1" max="10" />
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div> -->


<div class="container">
  <div class="row">
  
    <div class="row col-md-9" style="margin: 1%;">
    	<form class="form" role="form" method="post" action="{{ url('/toCheckout') }}">
		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group">
				   		 <label for="email">{{Lang::get('dictionary.email')}}</label>	
				   		  @if(Session::get('loggin_status')==true)
				   		 	<input type="email" class="form-control" name="email" placeholder="{{Lang::get('dictionary.sample_email')}}"  value="{{Session::get('user_email')}}">
				   		  @else	
				   		  	<input type="email" class="form-control" name="email" placeholder="{{Lang::get('dictionary.sample_email')}}">
				   		  @endif
				   </div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group">
				   	     <label for="zip">{{Lang::get('dictionary.zip')}}</label>
				   		  @if(Session::get('loggin_status')==true)
				   		 	<input type="text" class="form-control" name="zip" placeholder="{{Lang::get('dictionary.type_your_CEP')}}"  value="{{Session::get('user_zip')}}">
				   		  @else	
				   		 	<input type="text" class="form-control" name="zip" placeholder="{{Lang::get('dictionary.type_your_CEP')}}">
				   		  @endif
				   </div>
			  </div> 
		  </div> 
		    <div class="row col-md-12">
			  <label for="yourhome_1">{{Lang::get('dictionary.your_home')}}</label>
			</div>
		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group">
						  <input id="after1" name="bedrooms" class="form-control" type="number" value="1" min="1" max="20" />
				   </div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group">
				   		 <input id="after2" name="bathrooms" class="form-control" type="number" value="1" min="1" max="20" />
				   </div>
			  </div> 
		  </div> 

		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group">
				   	    <label >{{Lang::get('dictionary.recommend_4_hours')}}</label>
				   		 <input id="after3" name="total_hours" class="form-control" type="number" value="1" min="1" max="30" />
				   </div>
			  </div> 
			  <div class="col-md-6"> 
			  </div> 
		  </div> 

         <div class="row">
		    <div class="col-md-6">
		       <div class="form-group">
		             <label for="email">{{Lang::get('dictionary.date')}}</label> 
		             <div id="embeddingDatePicker" class="calendar_panel"></div>
		             <input type="hidden" id="selectedDate" name="selectedDate" />  
		       </div>
		    </div>
		    <div class="col-md-6">
		       <div class="form-group">	
			    	<label for="start_times">{{Lang::get('dictionary.start_time')}}</label> 
			    	<input type="hidden" id="selectedPeriod" name="selectedPeriod" />
			    	<div id="start_times" >
			    		
			    	</div>
		       </div>	 
		    </div>
		 </div>   
		  <!-- <br> -->
		  <button type="submit" class="btn btn-danger submit_btn"> {{Lang::get('dictionary.create_an_account')}}</button>
	</form>
    </div>
    <div class="row col-md-3 " style="padding: 1%;">
    	<div class="sidebar-nav-fixed affix" style="width: inherit;">
                <div class="well">
                    <ul class="nav" style="text-align: center;">
                    	<!-- glyphicon glyphicon-bed
                    	<span class="" aria-hidden="true"></span> -->
                       <p><i class="glyphicon glyphicon glyphicon-bed"></i></p>
                       <li class="nav-header" style="font-size: large; font-weight: 500;">{{Lang::get('dictionary.cleaning_schedule')}}</li>
                        <br>
                        <p>{{Lang::get('dictionary.cleaning_shedule_message')}}</p>

                       <div style="text-align:left; padding: 5%;"> 
                        <p><i class="fa fa-check" style="color:red;"></i> {{Lang::get('dictionary.accredited_professionals')}}</p>
                        <p><i class="fa fa-check" style="color:red;"></i> {{Lang::get('dictionary.satisfaction_guarantee')}}</p>
                        <p><i class="fa fa-check" style="color:red;"></i> {{Lang::get('dictionary.immediate_care')}}</p>
                       </div> 	
                    </ul>
                    
                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
    </div>
  </div>	



</div>	


<style>
#search {
    width:90%;
}

.searchicon {
    color:#32b68c;
}

.items-collection{
    margin:20px 0 0 0;
}
.items-collection label.btn-default.active{
    background-color:#32b68c;
    color:#FFF;
}
.items-collection label.btn-default{
    width:90%;
    border:1px solid #32b68c;
    margin:5px; 
    border-radius: 48px;
    color: #32b68c;
}
.items-collection label .itemcontent{
    width:100%;
}
.items-collection .btn-group{
    width:90%
}
.radio_btn{
	margin: 10px;
	width: 100%
}

.btn-default.active, .btn-default:active, .open>.dropdown-toggle.btn-default {
    background-image: none;
    background-color: #32b68c;
    border-color: #32b68c; !important
}
.btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    color: #333;
    background-color: #32b68c; !important
    border-color: #32b68c;  !important
}
.btn-default:hover{
	color: #333;
    background-color: #32b68c; !important
    border-color: #32b68c;  !important
}
.btn-default:focus{
	color: #333;
    background-color: #fff;
    border-color: #fff;
}
.panel-success>.panel-heading {
    color: #fff;
    background-color:  #32b68c;
    border-color:  #32b68c;
}
.submit_btn{
	width:100%;
	height:70px;
	font-size: x-large;
}
</style>


<!-- number increment -->
<script src="{{ URL::asset('spinner/bootstrap-number-input.js') }}"></script>
<script>
// Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
$("[name='checkbox2']").change(function() {
	if(!confirm('Do you wanna cancel me!')) {
		this.checked = true;
	}
});

$('#after1').bootstrapNumber('spinner1');
$('#after2').bootstrapNumber('spinner2');
$('#after3').bootstrapNumber('spinner3');

$('#colorful').bootstrapNumber({
	upClass: 'success',
	downClass: 'danger'
});
</script>

<script>

    $(document).ready(function() {

    	var totalHoursTaken = 3;
    	//setting default value to #of hours
    	$('#after3').val(totalHoursTaken);
    	setPeriods();

        $('#embeddingDatePicker')
            .datepicker({
                format: 'mm/dd/yyyy'
            })
            .on('changeDate', function(e) {
                $("#selectedDate").val($("#embeddingDatePicker").datepicker('getFormattedDate'));
            });   

        //setting onclicks for + - buttons
        $("[id^=spinner]").click(function() {
        	var id = $(this).attr('id');
		     if((id=='spinner1_up' && $('#after1').val()<=20) || (id=='spinner1_down' && $('#after3').val()>3) || (id=='spinner2_up' && $('#after2').val()<=20) || (id=='spinner2_down' && $('#after3').val()>3)){
		     	setTotalHours();
		     	setPeriods();
		     }
		 }); 

        //set selector button listener
        /* $('#selector button').click(function() {
	    	console.log('radio buottn clicked');
			
		});*/
    });

	function setTotalHours() {
        totalHoursTaken=3+parseInt($('#after1').val())-1+Math.floor((parseInt($('#after2').val())-1)/2);
 		$('#after3').val(totalHoursTaken);
 		
    }
    // show available time periods
    function setPeriods() {
    	var HTMLcontent = '<div class="row"><span class="btn-group" data-toggle="buttons-radio" id="selector" name="selector" style="width:100%">';
        if($('#after3').val()<=9){
        	for(i=8;i<=(18-parseInt($('#after3').val()));i++)
        	{
        		console.log(i+"-"+(i+parseInt($('#after3').val())));
        		HTMLcontent+='<div class="col-md-6"><button data-bind="checked: priority2" name="choose_frequency" type="button" class="btn btn-default radio_btn" value="'+i+":00 to "+(i+parseInt($('#after3').val()))+':00" onclick="setSelectedPeriod(this.getAttribute(\'value\'))">'+i+":00 to "+(i+parseInt($('#after3').val()))+':00</button></div>';
        	}	
        	HTMLcontent+='</span></div>';
        	$("#start_times").html(HTMLcontent);
        	//console.log(HTMLcontent); 
        }
        else{

        }

    }

    function setSelectedPeriod(value){
    	console.log(value);
    	$(".radio_btn.active").removeClass("active");
    	$('#selectedPeriod').val(value);
    }



</script>




@endsection
