@extends('master')

@section('content')

<style type="text/css">
   .socialbtn {
    text-align: center;
    width: 100%;
}
</style>


 <div class="row">
 		<div class="col-md-4">
 		</div>
		<div class="col-md-4" style="margin: 2%;">
			 <form class="form" role="form" method="post" action="{{ url('/doLogin')}}" accept-charset="UTF-8" id="login-nav">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
					<div class="form-group input-group">
						 <span class="input-group input-group-addon"><i class="fa fa-user"></i></span>
						 <input type="email" class="form-control" name="email" placeholder="{{ Lang::get('dictionary.email') }}" required>
					</div>
					  <div class="form-group  input-group">
						  @if($errors->first('email') || $usernotfound)
						  	 @if($errors->first('email'))
					             <label style="color: red;">{{$errors->first('email')}}</label>
					         @endif
					         @if($usernotfound)
					         		 <label style="color: red;">{{ Lang::get('dictionary.user_doesnt_exist') }}</label>
					         @endif
					      @endif
				  	  </div>
					<div class="form-group input-group">
						 <span class="input-group input-group-addon"><i class="fa fa-lock"></i></span>
						 <input type="password" class="form-control" name="password" placeholder="{{ Lang::get('dictionary.password') }}" required>
					</div>
					  <div class="form-group  input-group">
					 	  @if($errors->first('password') || $password_doesnt_match)
					 	  	@if($errors->first('password'))
					             <label style="color: red;">{{$errors->first('password')}}</label>
					        @endif
					        @if($password_doesnt_match)
			         		 	<label style="color: red;">{{ Lang::get('dictionary.password_doesnot_match') }}</label>
			         	    @endif
					      @endif
				  	  </div>
		               
					 <div class="help-block text-right"><a href="">{{ Lang::get('dictionary.i_forgot_my_password') }} </a></div>

					<div class="form-group">
						 <button type="submit" class="btn btn-primary btn-block">{{ Lang::get('dictionary.sign_in') }}</button>
					</div>
					<div class="checkbox">
						 <label>
						 <input type="checkbox">{{ Lang::get('dictionary.keep_logged_in') }}
						 </label>
					</div>
			 </form>
			 <p style="text-align: center;">{{ Lang::get('dictionary.or') }}</p>
				<div class="social-buttons form-group">
					<a href="#" class="btn btn-primary socialbtn">{{ Lang::get('dictionary.login_with') }}  <i class="fa fa-facebook"></i> Facebook</a>
				</div>
				<div class="social-buttons form-group">
					<a href="{{url('\register')}}" class="btn btn-success socialbtn">{{ Lang::get('dictionary.doesnt_have_an_account') }} {{ Lang::get('dictionary.create_account') }}</a>
				</div>
				

		</div>
		<div class="col-md-4">
 		</div>
		<!-- <div class="bottom text-center">
			New here ? <a href="#"><b>Join Us</b></a>
		</div> -->
 </div>
	
@endsection