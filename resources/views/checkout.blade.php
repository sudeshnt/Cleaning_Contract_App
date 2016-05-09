@extends('master')

@section('content')

<form role="form" method="post" action="{{ url('/addContract') }}">	
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row" style="margin-left: 5%; margin-right: 5%;">   
     	 <div class="form-group col-md-9">
     	 	<input type="hidden" id="selectedOptionals" name="selectedOptionals" /> 
            <div class="items-collection">
            	 <div>
				   		 <label for="mul_buttons">{{Lang::get('dictionary.optional')}}</label>
				 </div> 		 
	             <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3" name="mul_buttons">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group bizmoduleselect">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off" value="{{Lang::get('dictionary.windows')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-car fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.windows')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group itemcontent">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off" value="{{Lang::get('dictionary.refrigerator')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-truck fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.refrigerator')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group itemcontent">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off"  value="{{Lang::get('dictionary.interior_cabinet')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-laptop fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.interior_cabinet')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group itemcontent">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off"  value="{{Lang::get('dictionary.carpets_and_upholstery')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-cube fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.carpets_and_upholstery')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group itemcontent">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off" value="{{Lang::get('dictionary.external_area')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-lock fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.external_area')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>                
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group itemcontent">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off" value="{{Lang::get('dictionary.heavy_housecleaning')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-barcode fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.heavy_housecleaning')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>                
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="info-block block-info clearfix">
                        <div data-toggle="buttons" class="btn-group itemcontent">
                            <label class="btn btn-default">
                                <div class="itemcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off" value="{{Lang::get('dictionary.ironing')}}" onchange="setOptionals(this,this.getAttribute('value'))">
                                    <span class="fa fa-key fa-2x"></span>
                                    <h5>{{Lang::get('dictionary.ironing')}}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>                
                                

            </div>
        </div>
        <div class="row col-md-3 " style="padding: 1%;">
	    	<div class="sidebar-nav-fixed affix" style="width: inherit;">
	                <div class="well">
	                    <ul class="nav" style="text-align: center;">
	                       <div style="text-align:left; padding: 5%;"> 
	                        <p><i class="fa fa-sidebar fa-home fa-3x" aria-hidden="true"></i><strong> {{$bedrooms}}</strong> {{Lang::get('dictionary.bedrooms')}} <strong>{{$bathrooms}}</strong> {{Lang::get('dictionary.bathrooms')}}</p>
	                        <div style="width: 70%; margin-left: auto; margin-right: auto; margin-top: -15px; margin-bottom: 23px;" id="optional_div">
	                        	
	                        </div>
	                        <p><i class="fa fa-sidebar fa-clock-o fa-3x" aria-hidden="true"></i> <strong> {{$total_hours}}</strong> hours</p>
	                        <p><i class="fa fa-sidebar fa-calendar fa-3x" aria-hidden="true"></i> <strong> {{$selectedDate}} , {{$selectedPeriod}}</strong></p>
	                        <p><i class="fa fa-sidebar fa-circle-o-notch  fa-3x" aria-hidden="true"></i><span id="frequency">{{Lang::get('dictionary.every_week')}}</span></p>
	                       </div> 	
	                    </ul>
	                    <div style="height:75px; background-color:#32b68c; margin:-3%; color:white;"></div>
	                </div>
	                <!--/.well -->
	            </div>
	            <!--/sidebar-nav-fixed -->
	    </div>
</div>
<div class="row" style="margin-left: 5%; margin-right: 5%;">
    <div class="col-md-9">
		 <div>
		   		 <label for="selector">{{Lang::get('dictionary.frequency')}}</label>
		 </div> 	
		 <div class="form-group">
	 	  <input type="hidden" id="selectedFrequency" name="selectedFrequency" /> 
		  <span class="btn-group" data-toggle="buttons-radio" id="selector" name="selector" style="width:100%">	
			 <div class="col-md-4">
				<button data-bind="checked: priority2" name="choose_frequency" type="button" class="btn btn-default radio_btn active" value="{{Lang::get('dictionary.every_week')}}" onclick="setFrequency(this.getAttribute('value'))">{{Lang::get('dictionary.every_week')}}</button>
			 </div>
			 <div class="col-md-4">
				<button data-bind="checked: priority2" name="choose_frequency" type="button" class="btn btn-default radio_btn" value="{{Lang::get('dictionary.every_two_weeks')}}" onclick="setFrequency(this.getAttribute('value'))">{{Lang::get('dictionary.every_two_weeks')}}</button>
			 </div>
			 <div class="col-md-4"> 
				<button data-bind="checked: priority2" name="choose_frequency" type="button" class="btn btn-default radio_btn" value="{{Lang::get('dictionary.only_once')}}" onclick="setFrequency(this.getAttribute('value'))">{{Lang::get('dictionary.only_once')}}</button>
			 </div>
		 </span>
		</div> 	
	 

	 <div class="row">
	   @if(Session::get('loggin_status')!=true)
	 	 <hr style="margin-top: 0px;">
		  	 <div class="col-md-6">
				   <div class="form-group">
				   		 <label for="name">{{Lang::get('dictionary.name')}}</label>	
				   		 <input type="text" class="form-control" name="email" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.name')}}">
				   </div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group">
				   	     <label for="email">{{Lang::get('dictionary.email')}}</label>
				   		 <input type="email" class="form-control" name="email" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.email')}}">
				   </div>
			  </div> 
		 </div>

		 <div class="row">
			  	 <div class="col-md-6">
					   <div class="form-group">
					   		 <label for="password">{{Lang::get('dictionary.password')}}</label>	
					   		 <input type="email" class="form-control" name="password" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.password')}}">
					   </div>
				  </div> 
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="telephone">{{Lang::get('dictionary.telephone')}}</label>
					   		 <input type="text" class="form-control" name="telephone" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.telephone')}}">
					   </div>
				  </div> 
		 </div>

		 <div class="row">
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="zip">{{Lang::get('dictionary.zip')}}</label>
					   		 <input type="text" class="form-control" name="zip" placeholder="{{Lang::get('dictionary.type_your_CEP')}} {{Lang::get('dictionary.zip')}}">
					   </div>
				  </div> 
		 </div>

		 <div class="row">
			  	 <div class="col-md-6">
					   <div class="form-group">
					   		 <label for="address">{{Lang::get('dictionary.address')}}</label>	
					   		 <input type="text" class="form-control" name="address" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.address')}}">
					   </div>
				  </div> 
				  <div class="col-md-2"> 
					   <div class="form-group">
					   	     <label for="number">{{Lang::get('dictionary.number')}}</label>
					   		 <input type="text" class="form-control" name="number" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.number')}}">
					   </div>
				  </div> 
				  <div class="col-md-4"> 
					   <div class="form-group">
					   	     <label for="complement">{{Lang::get('dictionary.complement')}}</label>
					   		 <input type="text" class="form-control" name="complement" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.complement')}}">
					   </div>
				  </div> 
		 </div>

		 <div class="row">
			  	 <div class="col-md-6">
					   <div class="form-group">
					   		 <label for="neighborhood">{{Lang::get('dictionary.neighborhood')}}</label>	
					   		 <input type="text" class="form-control" name="neighborhood" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.neighborhood')}}">
					   </div>
				  </div> 
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="city">{{Lang::get('dictionary.city')}}</label>
					   		 <input type="text" class="form-control" name="city" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.city')}}">
					   </div>
				  </div> 
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="state">{{Lang::get('dictionary.state')}}</label>
					   		 <input type="text" class="form-control" name="state" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.state')}}">
					   </div>
				  </div> 
		 </div>
     @else	
     <div id="hiddenAddressForm" style="display:none;">

     		<div class="row">
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="zip">{{Lang::get('dictionary.zip')}}</label>
					   		 <input type="text" class="form-control" name="zip" placeholder="{{Lang::get('dictionary.type_your_CEP')}} {{Lang::get('dictionary.zip')}}">
					   </div>
				  </div> 
		 </div>

		 <div class="row">
			  	 <div class="col-md-6">
					   <div class="form-group">
					   		 <label for="address">{{Lang::get('dictionary.address')}}</label>	
					   		 <input type="text" class="form-control" name="address" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.address')}}">
					   </div>
				  </div> 
				  <div class="col-md-2"> 
					   <div class="form-group">
					   	     <label for="number">{{Lang::get('dictionary.number')}}</label>
					   		 <input type="text" class="form-control" name="number" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.number')}}">
					   </div>
				  </div> 
				  <div class="col-md-4"> 
					   <div class="form-group">
					   	     <label for="complement">{{Lang::get('dictionary.complement')}}</label>
					   		 <input type="text" class="form-control" name="complement" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.complement')}}">
					   </div>
				  </div> 
		 </div>

		 <div class="row">
			  	 <div class="col-md-6">
					   <div class="form-group">
					   		 <label for="neighborhood">{{Lang::get('dictionary.neighborhood')}}</label>	
					   		 <input type="text" class="form-control" name="neighborhood" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.neighborhood')}}">
					   </div>
				  </div> 
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="city">{{Lang::get('dictionary.city')}}</label>
					   		 <input type="text" class="form-control" name="city" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.city')}}">
					   </div>
				  </div> 
				  <div class="col-md-3"> 
					   <div class="form-group">
					   	     <label for="state">{{Lang::get('dictionary.state')}}</label>
					   		 <input type="text" class="form-control" name="state" placeholder="{{Lang::get('dictionary.type_your')}} {{Lang::get('dictionary.state')}}">
					   </div>
				  </div> 
		 </div>

     </div>	 
	 @endif
	 <hr style="margin-top: 0px;">
	 <!-- card payment -->
	 <div class="row">
		  	  <div class="col-md-6">
				   <div class="panel panel-success">
<!-- 
				   		<div class="form-group input-group">
					  	<span class="input-group input-group-addon"><i class="fa fa-user"></i></span>
					    <input type="text" class="form-control" name="name" placeholder="{{Lang::get('dictionary.name')}}">
					  </div> -->

					  <div class="panel-heading">
					    <h3 class="panel-title">{{Lang::get('dictionary.payment')}}<i class="fa fa-cc-visa" style="float:right;"></i> <i class="fa fa-cc-mastercard" style="float:right;"></i></h3>

					  </div>

					  <div class="panel-body">
					  	<label for="card_number">{{Lang::get('dictionary.card_number')}}</label> 
					     <div class="form-group input-group">
				   		   <input type="text" class="form-control" name="card_number" placeholder="{{Lang::get('dictionary.default_card_number')}}">
				  		 	<span class="input-group input-group-addon"><i class="fa fa-lock"></i></span>
				  		 </div>	
				  		 <!-- <div class="row col-md-12">
						  <label for="yourhome_1">{{Lang::get('dictionary.your_home')}}</label>
						</div> -->
				  		 <div class="row">
				  		 	<div class="row">
				  		 		<div class="col-md-6">
				  		 			 <label for="neighborhood" style="margin-left: 15px;">{{Lang::get('dictionary.expiration_date')}}</label>	
				  		 		</div>
				  		 		<div class="col-md-6">
				  		 			 <label for="neighborhood">{{Lang::get('dictionary.code')}}</label>
				  		 		</div>
							 
							</div>
				  		 	<div class="col-md-6">
				  		 		<div class="col-md-6">

								   <div class="form-group">
								   		 <input type="text" class="form-control" name="month" placeholder="{{Lang::get('dictionary.month')}}">
								   </div>
								</div> 
							    <div class="col-md-6"> 
									   <div class="form-group">
									   		 <input type="text" class="form-control" name="year" placeholder="{{Lang::get('dictionary.year')}}">
									   </div>
								</div> 
				  		 	</div>
							<div class="col-md-4"> 
								   <div class="form-group input-group">
								   		 <input type="text" class="form-control" name="code" placeholder="***">
								   		 <span class="input-group input-group-addon"><i class="fa fa-lock"></i></span>
								   </div>
						    </div> 
					    </div>
					  </div>
					</div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group">
				   		 <input type="text" class="form-control" name="discount_coupon" placeholder="{{Lang::get('dictionary.discount_coupon')}}">
				   </div>
			  </div> 
			
	 </div>
	 @if(Session::get('loggin_status')==true)
		 <div class="row">
		 	<div class="col-md-6">
					   <div class="panel panel-success">
						  <div class="panel-heading">
						    <h3 class="panel-title">{{Lang::get('dictionary.address')}}</h3>

						  </div>

						  <div class="panel-body">
						  		{{Session::get('user_address')}}
						  		<br>
						  		{{Session::get('user_zip')}}
						  </div>
						</div>
						
						<a href="javascript:ShowContent('hiddenAddressForm')">{{Lang::get('dictionary.change_address')}}</a>
				  </div> 
		 </div>
	 @endif
	 	 <button type="submit" class="btn btn-danger submit_btn"> {{Lang::get('dictionary.finish_scheduling')}}</button> 
	 	 <br><br><br> 
	</div>
	
</div>


</form>

	 

    
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
	width: 100%;
	height: 60px;
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
.items-collection .btn-group {
    width: 100%;
}
.fa-sidebar{
	padding: 10px;
}
.well{
	border: 0px;
	padding: 10px;
}
.row {
    margin-right: auto;
    
}
ul ul, ol ul {
    list-style-type: none;
    padding: 0px;
}
</style>

<script>

// initializing array of optional cleaning items
var selected_optionals = [];


$(document).ready(function() {

	$(function () {
    $('#search').on('keyup', function () {
        var pattern = $(this).val();
        $('.items-collection .items').hide();
        $('.items-collection .items').filter(function () {
            return $(this).text().match(new RegExp(pattern, 'i'));
	        }).show();
	    });
	});


	$('#selector button').click(function() {
		$(".radio_btn.active").removeClass("active");
	});

});

//set Frequency of Cleaning
	function setFrequency(value){
		$('#frequency').html(value);
		$('#selectedFrequency').val(value);
	}

	//adding optional cleaning 
	function setOptionals(checkbox,value){
		if (checkbox.checked)
	    {
	        selected_optionals.push(value);
	        populateSidebarDiv();
	    }
	    else
		{
			selected_optionals.pop(value);
			populateSidebarDiv();
		}
	}

	//populate sidebar with optional items
	function populateSidebarDiv(){
		/*<i class="fa fa-square" aria-hidden="true"></i>*/
		var HTMLcontent = '<ul>';
        selected_optionals.forEach(function (option){
        	HTMLcontent+='<li><i class="fa fa-square" aria-hidden="true" style="color:grey; padding:4%;"> </i>'+option+'</li>'
        });       
        HTMLcontent+='</ul>';
        $("#optional_div").html(HTMLcontent);
	}


	//Show Hide Address Form
	
	function ShowContent(d) {
		if(document.getElementById(d).style.display=="none")
		{
			console.log('asdadadsa');
			document.getElementById(d).style.display = "block";
		}
		else if(document.getElementById(d).style.display=="block")
		{
			console.log('aaaaaaaaaaaa');
			document.getElementById(d).style.display = "none";
		}
		
	}
	





</script> 
@endsection