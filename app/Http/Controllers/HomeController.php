<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityNotificationModel;
use App\AssignModel;
use App\ClientModel;
use App\CommentModel;
use App\Http\Requests;
use App\Notification;
use App\TaskModel;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Exception;
use Laravel\Cashier\Cashier;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->designers = TaskModel::getDesigner();
        $this->clients =ClientModel::getClient();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('client')){
            $acts=TaskModel::where('created_by',Auth::user()->id)->get();
            $data_urs=TaskModel::where('created_by',Auth::user()->id)->where('status',"ur")->orderBy('created_at', 'DESC')->get();
            $data_das=TaskModel::where('created_by',Auth::user()->id)->where('status',"da")->orderBy('created_at', 'DESC')->get();
            $data_rs=TaskModel::where('created_by',Auth::user()->id)->where('status',"r")->orderBy('created_at', 'DESC')->get();
            $data_hs=TaskModel::where('created_by',Auth::user()->id)->where('status',"h")->orderBy('created_at', 'DESC')->get();
            return view('client.index',compact('data_urs','data_das','data_rs','data_hs','acts'));
        };
        if(Auth::user()->hasRole('passiveclient')){
            //return view('client.passive');
            return view('pack.index');
        };

    
//        if(Auth::user()->hasRole('designer')){
//            $data_urs=DB::table('tasks')
//                ->join('assign', 'assign.client_id', '=', 'tasks.created_by')
//                ->join('users', 'assign.assign_to', '=', 'users.id')
//                ->where('users.id', '=',Auth::user()->id )
//                ->select('tasks.id as task_id','tasks.status as status','tasks.title as title','tasks.description as description','tasks.created_by as created_by','users.name as user_name')
//                ->get();
//
//            return view('designer.index',compact('data_urs','data_das','data_rs','data_hs'));
//        };
        if(Auth::user()->hasRole('designer')){
            $data_urs=DB::table('tasks')
                ->join('assign', 'assign.client_id', '=', 'tasks.created_by')
                ->join('users', 'assign.assign_to', '=', 'users.id')
                ->where('users.id', '=',Auth::user()->id )
                ->select('tasks.id as task_id','tasks.status as status','tasks.title as title','tasks.description as description','tasks.created_by as created_by','users.name as user_name')
                ->get();
            $clients=DB::table('assign')->join('users', 'assign.assign_to', '=', 'users.id')->where('users.id', '=',Auth::user()->id )->get();

            return view('designer.client',compact('clients','data_urs'));
        };
        if(Auth::user()->hasRole('administrator')){
            $tasks=TaskModel::all()->count();
            $clients =count($this->clients);
            $designers = count($this->designers);
           // dd("admin");
            return view("welcome" , compact('clients','designers','tasks'));
        };

    }
    public function design(){
        if(Auth::user()->hasRole('passiveclient')){
           
            return view('pack.design');
            };
    }
    public function developer(){
        if(Auth::user()->hasRole('passiveclient')){
           
            return view('pack.developer');
            };
    }
    public function marketing(){
        if(Auth::user()->hasRole('passiveclient')){
           
            return view('pack.marketing');
            };
    }
    public function devdesire(){
        if(Auth::user()->hasRole('passiveclient')){
           
            return view('pack.devdesire');
            };
    }
    public function payment(){
        if(Auth::user()->hasRole('passiveclient')){
           
            return view('pack.payment');
            };
    }
    public function checkout(){
        if(Auth::user()->hasRole('passiveclient')){
           
            return view('pack.payhour');
            };
    }
    public function payorder(){
        {
           
            return view('pack.payhour');
            };
    }
    
   

    public function store(Request $request){

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
             // add this to add a card.
         
            $plan = $_POST['plan'];
            
            $customer = \Stripe\customer::create(array(
                "email" => \Illuminate\Support\Facades\Auth::user()->email,
                "source"=> $request->stripeToken,

                 ));        

           //dd ($customer);
        
            $token = $request->stripeToken;
            $subscription = \Stripe\Subscription::create([
                // "source"=> $token,
                'customer' => $customer->id,
                'items' => [
                    [
                        'plan' => $plan,
                    ],
                    

                ],
            ]);
             //echo "Done";
             // dd ($subscription);  

            // $uid = \Illuminate\Support\Facades\Auth::user()->id ;
            // $txnid= $orders->charge;
            // $amt= $orders->amount;
            // $dtl=$orders->items[0]->description;

            

            // DB::table('transaction')->insert(
            //     ['user_id' => $uid, 'txn_id' => $txnid, 'detail' => $dtl, 'amount' => $amt]
            //     );
           $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);
           $brand = $customer->sources->data[0]->brand;
           $last4 =  $customer->sources->data[0]->last4;
           $user->stripe_id = $customer['id'];
           $user->card_brand = $brand;
           $user->card_last_four = $last4;
           //$user->trail_ends_at = ;
           $user->save();

          

      
           //  

           //  // Auth::user()->newSubscribtion('Flat Monthly' , 'Monthly')->create($token);
           //  $user->stripe_id = $customer['id'];
           //  $user->card_brand = $brand;
           //  $user->card_last_four = $last4;
           //  //$user->trail_ends_at = ;
           //  $user->save();

                  



            // $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);
            // $user->stripe_id = $charge->id;
            // $user->save();
           

           
            $roles[0] = "2";            
            $user->roles()->sync($roles);
            
           return redirect('./')->with("new");

           

    }
    public function storehr(Request $request){

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
             // add this to add a card.
         
            $sku = $_POST['sku'];
            $quantity = $_POST['quantity'];
            $line1 = $_POST['line1'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $postal_code = $_POST['postal_code'];
            $country = $_POST['country'];
            $name = \Illuminate\Support\Facades\Auth::user()->name ;
            $email = \Illuminate\Support\Facades\Auth::user()->email ;
                                 
            
            $order = \Stripe\Order::create([
                'currency' => 'usd',
                'email' => $email,
                'items' => [
                    [
                        'type' => 'sku',
                        'parent' => $sku,
                        'quantity' => $quantity,
                    ],
                ],
                'shipping' =>  [
                    'name' => $name,
                    'address' => [
                        'line1' => $line1,
                        'city' => $city,
                        'state' => $state,
                        'postal_code' => $postal_code,
                        'country' => $country,
                    ],
                ],
            ]);

            $oID= $order['id'];
            $request->session()->put('oID', $oID);

         
            return view('pack.payhour');
           
             //$order = substr($order,23);
            //dd ($order);        
            // echo "Done";

           // $brand = $subscription->source->brand;
           // $last4 =  $subscription->source->last4;          

      
           //  $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);

           //  // Auth::user()->newSubscribtion('Flat Monthly' , 'Monthly')->create($token);
           //  $user->stripe_id = $customer['id'];
           //  $user->card_brand = $brand;
           //  $user->card_last_four = $last4;
           //  //$user->trail_ends_at = ;
           //  $user->save();              



            // $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);
            // $user->stripe_id = $charge->id;
            // $user->save();
           
        
    
    }
    public function payhr(Request $request){

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
             // add this to add a card.
         
            $name = \Illuminate\Support\Facades\Auth::user()->name ;
            $email = \Illuminate\Support\Facades\Auth::user()->email ;
                                 
            
            
            $oiD = $_POST['oID'];
           // $hour = $_POST['hour'];
            
            
            // $customer = \Stripe\customer::create(array(
            //     "email" => \Illuminate\Support\Facades\Auth::user()->email,
            //     "source"=> $request->stripeToken,
            //      ));
            
            
            // $token = $request->stripeToken;
            $orders = \Stripe\Order::retrieve($oiD);
            $orders->pay(['source' => $request->stripeToken]);
            //$orders = substr($orders,23);
            //dd ($orders);
            $uid = \Illuminate\Support\Facades\Auth::user()->id ;
            $txnid= $orders->charge;
            $amt= $orders->amount;
            $dtl=$orders->items[0]->description;

            

            DB::table('transaction')->insert(
                ['user_id' => $uid, 'txn_id' => $txnid, 'detail' => $dtl, 'amount' => $amt]
                );
            //echo $uid.$txnid.$amt.$dtl;
            //dd ($orders);
             //echo "Done";

           // $brand = $orders->source->brand;
           // $last4 =  $orders->source->last4;

          

      
           //  $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);

           //  // Auth::user()->newSubscribtion('Flat Monthly' , 'Monthly')->create($token);
           //  $user->stripe_id = $customer['id'];
           //  $user->card_brand = $brand;
           //  $user->card_last_four = $last4;
           //  //$user->trail_ends_at = ;
           //  $user->save();

                  



            // $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);
            // $user->stripe_id = $charge->id;
            // $user->save();
           

           
            //$roles[0] = "2";            
            //$user->roles()->sync($roles);         
    
    }
    
    public function clientNotification(){
        $acts=Notification::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('client.notification',compact('acts'));

    }
    public function designerNotification(){
        $acts=Notification::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('designer.notification',compact('acts'));

    }
    public function designerOtherNotification(){
        $acts=Notification::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('designer.otherNotification',compact('acts'));

    }
    public function clientOtherNotification(){
        $acts=Notification::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('client.otherNotification',compact('acts'));

    }

    public function clientActivity(){
        $acts=Activity::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('client.activity',compact('acts'));

    }
    public function designerActivity(){
        $acts=Activity::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('designer.activity',compact('acts'));

    }
    public function testNotification(){
        $data=0;
        $test=Notification::where('user_id',Auth::user()->id)->where('seen',0)->get();
        if(count($test)!=0){
            $data=1;
        }
        return response($data);

    }
    public function updateDescription(Request $request,$id){
            $task=TaskModel::findorfail($id);
            $task->update($request->all());
        if(Auth::user()->hasRole('client')){
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $noti['user_id']=$assign_to;
            $noti['task_id']=$task->id;
            $noti['created_by']=Auth::user()->id;
            $noti['action']="updated description";
            $noti['seen']=0;
            Notification::create($noti);
            $act['user_id']=Auth::user()->id;
            $act['task_id']=$task->id;
            $act['action']="updated description";
            Activity::create($act);
        }
        if(Auth::user()->hasRole('designer')){
            $noti['user_id']=TaskModel::where('id',$id)->value('created_by');
            $noti['task_id']=$id;
            $noti['created_by']=Auth::user()->id;
            $noti['action']="updated description";
            $noti['seen']=0;
            Notification::create($noti);
            $act['user_id']=Auth::user()->id;
            $act['task_id']=$id;
            $act['action']="updated description";
            Activity::create($act);
        }

    }
    public function updateTitle(Request $request,$id){
        $task=TaskModel::findorfail($id);
        if(Auth::user()->hasRole('client')){
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $noti['user_id']=$assign_to;
            $noti['task_id']=$task->id;
            $noti['created_by']=Auth::user()->id;
            $noti['action']="updated title";
            $noti['seen']=0;
           // Notification::create($noti);
            $act['user_id']=Auth::user()->id;
            $act['task_id']=$task->id;
            $act['action']="updated title";
           // Activity::create($act);
            $task->update($request->all());
        }

    }
    public function fileUploaded($id){
        $task_id=$id;
        return view('client.file',compact('task_id'));

    }
    public function commentsUploaded($id){
        $task_id=$id;
        return view('client.comment',compact('task_id'));

    }
    public function commentsSave(Request $request){
        $comment=CommentModel::create($request->all());
        if(Auth::user()->hasRole('client')){
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $noti['user_id']=$assign_to;
            $noti['task_id']=$request->input('task_id');
            $noti['created_by']=Auth::user()->id;
            $noti['action']="commented on";
            $noti['seen']=0;
            $noti['comment']=$comment->id;
             Notification::create($noti);
            $act['user_id']=Auth::user()->id;
            $act['task_id']=$request->input('task_id');;
            $act['action']="commented on";
             Activity::create($act);
            //email
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $email['changed_by']=Auth::user()->name;
            $email['comment']=$comment['comment'];
            $email['email']=User::where('id',$assign_to)->value('email');
            $email['task_name']=TaskModel::where('id',$request->input('task_id'))->value('title');
            if($email['email']!= null){
                $this->EmailComment($email);
            };
        }
        if(Auth::user()->hasRole('designer')){
            $task_id=$request->input('task_id');
            $noti['user_id']=TaskModel::where('id',$task_id)->value('created_by');
            $noti['task_id']=$request->input('task_id');
            $noti['created_by']=Auth::user()->id;
            $noti['action']="commented on";
            $noti['seen']=0;
            $noti['comment']=$comment->id;
            Notification::create($noti);
            $act['user_id']=Auth::user()->id;
            $act['task_id']=$request->input('task_id');;
            $act['action']="commented on";
            Activity::create($act);
            //email
            $client_id=TaskModel::where('id',$request->input('task_id'))->value('created_by');
            $email['changed_by']=Auth::user()->name;
            $email['comment']=$comment['comment'];
            $email['email']=User::where('id',$client_id)->value('email');
            $email['task_name']=TaskModel::where('id',$request->input('task_id'))->value('title');
            if($email['email']!= null){
                $this->EmailComment($email);
            };
        }
    }
    public function EmailComment($email){
        $email1=$email['email'];
        Mail::send('email.comment',compact('email'), function ($m) use($email1){
            $m->from('notifications@designpac.net', 'DesignPac');
            $m->to($email1)->subject('Notification! New comment added.');
        });
    }


}
