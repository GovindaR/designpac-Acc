<?php

namespace App\Http\Controllers;

use App\Notification;
use App\TaskModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesignerController extends Controller
{
    public function index($id){
        $data_an=DB::table('tasks')
            ->join('assign', 'assign.client_id', '=', 'tasks.created_by')
            ->join('users', 'assign.assign_to', '=', 'users.id')
            ->where('users.id', '=',Auth::user()->id )
            ->select('tasks.id as task_id','tasks.status as status','tasks.title as title','tasks.description as description','tasks.created_by as created_by','users.name as user_name')
            ->get();
        $acts=TaskModel::where('created_by',$id)->get();
        $data_urs=TaskModel::where('created_by',$id)->where('status',"ur")->orderBy('created_at', 'DESC')->get();
        $data_das=TaskModel::where('created_by',$id)->where('status',"da")->orderBy('created_at', 'DESC')->get();
        $data_rs=TaskModel::where('created_by',$id)->where('status',"r")->orderBy('created_at', 'DESC')->get();
        $data_hs=TaskModel::where('created_by',$id)->where('status',"h")->orderBy('created_at', 'DESC')->get();
        return view('designer.index',compact('data_urs','data_das','data_rs','data_hs','acts','data_an'));
    }
    public function profile($id){
        if($id == Auth::user()->id){
            $acts=TaskModel::where('created_by',Auth::user()->id)->get();
            $data=User::where('id',$id)->get();
            $data_urs=DB::table('tasks')
                ->join('assign', 'assign.client_id', '=', 'tasks.created_by')
                ->join('users', 'assign.assign_to', '=', 'users.id')
                ->where('users.id', '=',Auth::user()->id )
                ->select('tasks.id as task_id','tasks.status as status','tasks.title as title','tasks.description as description','tasks.created_by as created_by','users.name as user_name')
                ->get();
            return view('designer.profile',compact('data','acts','data_urs'));
        }else{
            return back();
        }

    }
    public function designerTaskModel($id){
        $task_id=$id;
        $data_ur=TaskModel::where('id',$id)->first();

        $notifications=Notification::where('task_id',$task_id)->get();
        $item['seen']=1;
        foreach ($notifications as $notification){
            $noti=Notification::findorfail($notification->id);
            $noti->update($item);
        }


        return view('designer.designerTaskModel',compact('data_ur'));
    }
}
