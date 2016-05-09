<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Crypt;
use Validator;

class UserController extends Controller
{
	//add a user database
    public function addUser()
    {   
    	$view = View::make('register');
    	$rules = array(
    		'name'    => 'required',
    		'zip'    => 'required',
    		'number'    => 'required',
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:6', // password can only be alphanumeric and has to be greater than 3 characters
        	'confirm_password' => 'required|min:6|same:password'
        );
    	$validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            $view->message = "validation_failed";
            return $view->withErrors($validator);
        }
        else {
            //essential
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Crypt::encrypt(Input::get('password')); //encrypt the password
           	$user->zip = Input::get('zip');
            $user->number = Input::get('number');
           	//dd( $user->password);
           	//$user->dec_pw = Crypt::decrypt($user->password);
           	
            //can be empty
           	$user->phone_no = Input::get('phone_no');
            $user->address = Input::get('address');
            $user->complement = Input::get('complement');
            $user->neighborhood = Input::get('neighborhood');
            $user->city = Input::get('city');
            $user->state = Input::get('state');
            try {
                $user->save();
                $view->message = "success";
                return $view;
            } catch (\Exception $e) {

                $view->errorInfo = $e->errorInfo;
                $view->message = "failed";
                return $view;
            }
        }
    }

    //authenticates a user 
    public function doLogin()
    {
    	$view_login = View::make('login');
    	$view_home = View::make('home');

    	$view_login->usernotfound=false;
    	$view_login->password_doesnt_match=false;

    	$rules = array(
    		'password'    => 'required|min:6',
        );
    	$validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form

        if ($validator->fails()) {
            $view_login->message = "validation_failed";
            return $view_login->withErrors($validator);
        }
        else {
        	$password = Input::get('password');
			$email = Input::get('email');
			$user = User::where('email',$email)->first();
            if($user!=null){
            	if(Crypt::decrypt($user->password) == $password){
                    
                    Session::put('loggin_status', true);
                    Session::put('user_name', $user->name);
                    Session::put('user_email', $user->email);
                    Session::put('user_zip', $user->zip);
                    Session::put('user_number', $user->number);
                    Session::put('user_phone_no', $user->phone_no);
                    Session::put('user_address', $user->address);
                    Session::put('user_complement', $user->complement);
                    Session::put('user_neighborhood', $user->neighborhood);
                    Session::put('user_city', $user->city);
                    Session::put('user_state', $user->state);

            		return Redirect::to('/home');
            	}	
            	else{
            		$view_login->password_doesnt_match=true;
            		return $view_login;
            	}
            				
            }
            else{
            	$view_login->usernotfound=true;
            	return $view_login;
            }
        }
        
    }

    //logging out a user
    //authenticates a user 
    public function doLogout()
    {
        Session::flush();
        //dd(Session::all());
        return Redirect::to('/login');
    }

    
}
