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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
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
            return view('client.subscribe',compact('data_urs','data_das','data_rs','data_hs','acts'));
        };
        if(Auth::user()->hasRole('passiveclient')){
            return view('client.passive');
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


    
}

