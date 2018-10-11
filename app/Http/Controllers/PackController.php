<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PackController extends Controller
{
     public function create(Request $request){

     	\Stripe\Stripe::setApiKey(config('services.stripe.secret'));

                   $plansall =  \Stripe\Plan::all(array("limit" => 17));;

                   $plansall = substr($plansall,23);

                   $productall =  \Stripe\Product::all(array("limit" => 25));;

                   $productall = substr($productall,23);

        $pack=$request->all();
        $pack['id']=;
        $pack['packge']="pack.json";
        $pack['hourly']="hour.json";
         //$pack = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);

           //  // Auth::user()->newSubscribtion('Flat Monthly' , 'Monthly')->create($token);
           //  $user->stripe_id = $customer['id'];
           //  $user->card_brand = $brand;
           //  $user->card_last_four = $last4;
           //  //$user->trail_ends_at = ;
        $pack->save();
      //  $pack=PackModel::create($pack);
}
