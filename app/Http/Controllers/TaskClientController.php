<?php

namespace App\Http\Controllers;

use App\Activity;
use App\AssignModel;
use App\FileModel;
use App\Notification;
use App\TaskModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskClientController extends Controller
{
    public function updateFile($id,Request $request){
        $task_id=$id;

        $uploads_dir =$_SERVER['DOCUMENT_ROOT'].'/uploads';
        $tmp_name = $_FILES["file"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = rand(1,1000).basename($_FILES["file"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $item['path']=$name;
        $item['task_id']=$task_id;
        FileModel::create($item);
        $noti['task_id']=$id;
        $noti['file']=$name;
        if(Auth::user()->hasRole('client')){
            $noti['created_by']=Auth::user()->id;
            $designer_id=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $noti['user_id']=$designer_id;
            //email
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $email['changed_by']=Auth::user()->name;
            $email['email']= User::where('id',$assign_to)->value('email');
            $email['task_name']= TaskModel::where('id',$task_id)->value('title');
            if($email['email']!= null){
                $this->EmailFile($email);
            };

        }
        if(Auth::user()->hasRole('designer')){
            $noti['created_by']=Auth::user()->id;
            $client_id=AssignModel::where('assign_to',Auth::user()->id)->value('client_id');
            $noti['user_id']=$client_id;
            //email
            $email['changed_by']=Auth::user()->name;
            $email['email']=User::where('id',$client_id)->value('email');
            $email['task_name']=TaskModel::where('id',$task_id)->value('title');
            if($email['email']!= null){
                $this->EmailFile($email);
            };
        }
        $noti['action']="uploaded new file on";
        $noti['seen']=0;
        Notification::create($noti);
        $act['task_id']=$id;
        $act['user_id']=Auth::user()->id;
        $act['action']="uploaded new file on";
        Activity::create($act);
        return view('client.file',compact('task_id'));
    }
    public function fileDelete($id){
        $file_id=$id;

        $task = FileModel::findOrFail($id);
        $task_id=$task->task_id;
        $task->delete();
        return response($task_id);
    }
    public function EmailFile($email){
        $email1=$email['email'];
        Mail::send('email.file',compact('email'), function ($m) use($email1){
            $m->from('notifications@designpac.net', 'DesignPac');
            $m->to($email1)->subject('Notification! New file uploaded.');
        });
    }
}
