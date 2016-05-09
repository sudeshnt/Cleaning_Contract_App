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


class ContractController extends Controller
{
    ////add contract
    public function toCheckout()
    { 
        $view = View::make('checkout');
        $view->email = Input::get('email');
        $view->zip = Input::get('zip');
        $view->bedrooms = Input::get('bedrooms');
        $view->bathrooms = Input::get('bathrooms');
        $view->total_hours = Input::get('total_hours');
        $view->selectedDate = Input::get('selectedDate');
        $view->selectedPeriod = Input::get('selectedPeriod');
        return $view;
    }

    public function addContract()
    {
    	dd(Input::all());
    }
    
    //open contract cleaning view
    public function openContractCleaningView()
    {
        $view = View::make('contract_cleaning');
        /*if(Session::get('loggin_status')=='true')
        {
            $view->businesses = $businesses;
            $view->errorInfo = null;
            $view->edit_errorInfo = null;
            $view->message = null;
            
        }*/
        return $view;
    }
}
