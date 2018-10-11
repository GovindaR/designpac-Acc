<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;
use Exception;



class HomzController extends Controller
{
  
    public function index()
    {        
        return view('layouts.apps');
    }
    public function orderPost(Request $request)
    {
            $user = User::find(1);
            $input = $request->all();
            $token = $input['stripeToken'];
            
            try {
                $user->subscription($input['plane'])->create($token,[
                        'email' => $user->email
                    ]);
                return back()->with('success','Subscription is completed.');
            } catch (Exception $e) {
                return back()->with('success',$e->getMessage());
            }
            
    }
}