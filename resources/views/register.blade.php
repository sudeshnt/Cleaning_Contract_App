@extends('master')

@section('content')

<style type="text/css">
   .input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
     background-color: #fff; 
    border: 1px solid #ccc;
     border-radius: 0px; 
}

.error_label {
    display: inline-block;
    max-width: 100%;
    font-weight: 0;  !important
    height: 1px;
}


</style>

<div class="container">
  <div class="row">

  	<div class="row col-md-2"> 
    </div>  
    <div class="row col-md-8" style="margin: 1%;"> 
      <p style="text-align: center;">{{ Lang::get('dictionary.register_your_account_parafuzo') }}</p>
        <div class=" social-buttons form-group">
			<a href="#" class="btn btn-primary socialbtn" style="display: block;">{{ Lang::get('dictionary.login_with') }}  <i class="fa fa-facebook"></i> Facebook</a>
    	</div>
      <p style="text-align: center;">{{ Lang::get('dictionary.or_sign_up_with_your_data') }}</p>	
	  <form role="form" method="post" action="{{ url('/addUser') }}">
	  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <div class="form-group input-group">
		  	<span class="input-group input-group-addon"><i class="fa fa-user"></i></span>
		    <input type="text" class="form-control" name="name" placeholder="{{Lang::get('dictionary.name')}}">
		  </div>
		  <div class="form-group  input-group">
			  @if($errors->first('name'))
		             <label class="error_label" style="color: red;">{{$errors->first('name')}}</label>
		      @endif
	  	  </div>
		  <div class="form-group input-group">
		  	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		    <input type="email" class="form-control" name="email"  placeholder="{{Lang::get('dictionary.email')}}">
		  </div>
		  <div class="form-group  input-group">
			  @if($errors->first('email'))
		             <label style="color: red;">{{$errors->first('email')}}</label>
		      @endif
	  	  </div>
		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
				   		 <input type="password" class="form-control" name="password" placeholder="{{Lang::get('dictionary.create_password')}}">
				   </div>
				   <div class="form-group  input-group">
					  @if($errors->first('password'))
				             <label style="color: red;">{{$errors->first('password')}}</label>
				      @endif
	  	  		</div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
				   		 <input type="password" class="form-control" name="confirm_password" placeholder="{{Lang::get('dictionary.confirm_password')}}">
				   </div>
				   <div class="form-group  input-group">
					  @if($errors->first('confirm_password'))
				             <label style="color: red;">{{$errors->first('confirm_password')}}</label>
				      @endif
			  	  </div>
			  </div> 
		  </div> 

		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
				   		 <input type="tel" class="form-control" name="phone_no" placeholder="{{Lang::get('dictionary.telephone')}}">
				   </div>
			  </div> 
			  <div class="col-md-6"> 
			  </div> 
		  </div> 

		  <hr style="margin-top: 0px;">

		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				   		 <input type="text" class="form-control" name="zip" placeholder="{{Lang::get('dictionary.zip')}}">
				   </div>
				   <div class="form-group  input-group">
					  @if($errors->first('zip'))
				             <label style="color: red;">{{$errors->first('zip')}}</label>
				      @endif
			  	  </div>
			  </div> 
			  <div class="col-md-6"> 
				  
			  </div> 
		  </div> 
		  
		  <div class="form-group input-group">
		  	<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
		    <input type="text" class="form-control" name="address" placeholder="{{Lang::get('dictionary.address')}}">
		  </div>

		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				   		 <input type="text" class="form-control" name="number" placeholder="{{Lang::get('dictionary.number')}}">
				   </div>
				   <div class="form-group  input-group">
					  @if($errors->first('number'))
				             <label class="error_label" style="color: red;">{{$errors->first('number')}}</label>
				      @endif
			  	  </div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				   		 <input type="text" class="form-control" name="complement" placeholder="{{Lang::get('dictionary.complement')}}">
				   </div>
			  </div> 
		  </div> 

		  <div class="form-group input-group">
		  	<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
		    <input type="text" class="form-control" name="neighborhood" placeholder="{{Lang::get('dictionary.neighborhood')}}">
		  </div>
		  
		  <div class="row">
		  	 <div class="col-md-6">
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				   		 <input type="text" class="form-control" name="city" placeholder="{{Lang::get('dictionary.city')}}">
				   </div>
			  </div> 
			  <div class="col-md-6"> 
				   <div class="form-group input-group">
				   		 <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				   		 <input type="text" class="form-control" name="state" placeholder="{{Lang::get('dictionary.state')}}">
				   </div>
			  </div> 
		  </div> 
		  <!-- <br> -->
		  <button type="submit" class="btn btn-success" style="float:right;"> {{Lang::get('dictionary.create_an_account')}}</button>
	</form>
   </div>

  <div class="row col-md-2"> 
  </div>  

</div>
</div>
@endsection