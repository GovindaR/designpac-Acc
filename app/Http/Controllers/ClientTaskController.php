<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityNotificationModel;
use App\AssignModel;
use App\CommentModel;
use App\FileModel;
use App\Notification;
use App\Package;
use App\TaskModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientTaskController extends Controller
{
    protected $destination;
    function __construct()
    {
        $this->destination = base_path().'/uploads';
    }
    public function create(Request $request){
        $task=$request->all();
        $task['created_by']=Auth::user()->id;
        $task['status']="ur";
        $item=TaskModel::create($task);
        if(Auth::user()->hasRole('client')){
            //email
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $email['changed_by']=Auth::user()->name;
            $email['email']=User::where('id',$assign_to)->value('email');
            if($email['email']!= null){
                $noti['user_id']=$assign_to;
                $noti['task_id']=$item->id;
                $noti['created_by']=Auth::user()->id;
                $noti['action']="created new task";
                $noti['seen']=0;
               Notification::create($noti);
                $act['user_id']=Auth::user()->id;
                $act['task_id']=$item->id;
                $act['action']="created new task";
                Activity::create($act);
                $this->EmailTaskCreate($email);
                return redirect('/');
            }else{
                $email['email']="support@designpac.net";
                $this->EmailTaskCreate($email);
                return redirect('/')->with('message', 'Great!!!');
            };
        }

    }
    public function update($id,Request $request){
        $test=$request->all();
        $name = null;
        $email=[];
        if($request->hasfile('file'))
        {

            foreach($request->file('file') as $file)
            {

                $name = rand(1,100).$id.$file->getClientOriginalName();
                $destination = $this->destination;
                $file->move($destination, $name);
                $item['path']=$name;
                $item['task_id']=$id;
                FileModel::create($item);
            }


            $noti['task_id']=$id;

            if(Auth::user()->hasRole('client')){
                $noti['created_by']=Auth::user()->id;
                $designer_id=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
                $noti['user_id']=$designer_id;

            }
            if(Auth::user()->hasRole('designer')){
                $noti['created_by']=Auth::user()->id;
                $client_id=AssignModel::where('assign_to',Auth::user()->id)->value('client_id');
                $noti['user_id']=$client_id;
            }
            $noti['action']="uploaded new file on";
            Notification::create($noti);
            $act['task_id']=$id;
            $act['user_id']=Auth::user()->id;
            $act['action']="uploaded new file on";
            Activity::created($act);
        }
        $act['task_id']=$id;
        $noti['task_id']=$id;
        if(Auth::user()->hasRole('client')){
            $act['client_id']=Auth::user()->id;
            $act['action']="changed on";

            //email
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $email['changed_by']=Auth::user()->name;
            $email['email']=User::where('id',$assign_to)->value('email');
            $email['task_name']=TaskModel::where('id',$id)->value('title');
            if($email['email']!= null){
                $this->EmailComment($email);
            };
        }
        if(Auth::user()->hasRole('designer')){
            $act['designer_id']=Auth::user()->id;
            $act['action']="changed on";

        }

        ActivityNotificationModel::create($act);

//        $data=TaskModel::findorfail($id);
//        $data->update($request->except(['attach']));
//        return back();
        return response("test");
    }
    public function createComment(Request $request){
    $this->validate($request,[
    'comment'=> 'required'
    ]);
       // dd($request->all());
        $comments=CommentModel::create($request->all());
        $test=$request->all();
        $act['task_id']=$test['task_id'];
        if(Auth::user()->hasRole('client')){
            $act['client_id']=Auth::user()->id;
            $act['action']="commented on";
            //email
            $assign_to=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
            $email['changed_by']=Auth::user()->name;
            $email['email']=User::where('id',$assign_to)->value('email');
            $email['task_name']=TaskModel::where('id',$test['task_id'])->value('title');
            if($email['email']!= null){
                $this->EmailComment($email);
            };

        }
        if(Auth::user()->hasRole('designer')){
            $act['designer_id']=Auth::user()->id;
            $act['action']="commented on";

            //email
            $client_id=TaskModel::where('id',$test['task_id'])->value('created_by');
            $email['changed_by']=Auth::user()->name;
            $email['email']=User::where('id',$client_id)->value('email');
            $email['task_name']=TaskModel::where('id',$test['task_id'])->value('title');
            if($email['email']!= null){
                $this->EmailComment($email);
            };
        }

        ActivityNotificationModel::create($act);
        return response($comments);
    }
    public function projectStatus(Request $request){
        $data=$request->all();

        if(isset($data['order1'])){
            $i=0;
            $test1=count($data['order1']);
            for($i=0;$i<$test1;$i++){
                $test=$data['order1'][$i];
                $data1=TaskModel::findorfail($test);
                $item['status']="ur";
                $data1->update($item);
            }
        }
        if(isset($data['order2'])){
            $i=0;
            foreach ($data['order2'] as $order1){
                $test=$data['order2'][$i];
                $data2=TaskModel::findorfail($test);
                $item['status']="da";
                $data2->update($item);
               $i++;
            }
        }
        if(isset($data['order3'])){
            $i=0;
            foreach ($data['order3'] as $order1){
                $test=$data['order3'][$i];
                $data3=TaskModel::findorfail($test);
                $item['status']="r";
                $data3->update($item);
                $i++;
            }
        }
        if(isset($data['order4'])){
            $i=0;
            foreach ($data['order4'] as $order1){
                $test=$data['order4'][$i];
                $data4=TaskModel::findorfail($test);
                $item['status']="h";
                $data4->update($item);
                $i++;
            }
        }

        return "test";
    }
    public function remove($id){
        $role = CommentModel::findOrFail($id);

        $role->delete();
        return back();
    }
    public function profile($id){
        if($id == Auth::user()->id){
            $acts=TaskModel::where('created_by',Auth::user()->id)->get();
            $data=User::where('id',$id)->get();
            return view('client.profile',compact('data','acts'));
        }else{
            return back();
        }

    }
    public function profileUpdate(Request $request,$id){
        if($id == Auth::user()->id){

            $user = User::findOrFail($id);
            $user->update($request->all());
            $pac_id=Package::where('user_id',$id)->value('id');

            if($pac_id == null){
                $pack=$request->except('name','last_name');
                $pack['user_id']=Auth::user()->id;
                Package::create($pack);
            }else{
                $pac=Package::findorfail($pac_id);
                $pac->update($request->except('name','last_name'));
            }

            return back();
        }else{
            return back();
        }
    }
    public function clientTaskModel($id){
        $task_id=$id;
        $data_ur=TaskModel::where('id',$id)->first();

        $notifications=Notification::where('task_id',$task_id)->where('user_id',Auth::user()->id)->get();
        $item['seen']=1;
        foreach ($notifications as $notification){
            $noti=Notification::findorfail($notification->id);
            $noti->update($item);
        }


        return view('client.clientTaskModel',compact('data_ur'));
    }
    public function taskDelete($id){
        $task = TaskModel::findOrFail($id);
        $task->delete();
        $notifications=Notification::where('task_id',$id)->get();
        $item['seen']=1;
        foreach ($notifications as $notification){
            $noti=Notification::findorfail($notification->id);
            $noti->update($item);
        }
        return back();

    }
    public function EmailUpdate($email){
        $email1=$email['email'];
        Mail::send('email.update',compact('email'), function ($m) use($email1){
            $m->from('notifications@designpac.net', 'DesignPac');
            $m->to($email1)->subject('Hey, Welcome to DesignPac!');
        });
    }
    public function EmailComment($email){
        $email1=$email['email'];
        Mail::send('email.comment',compact('email'), function ($m) use($email1){
            $m->from('notifications@designpac.net', 'DesignPac');
            $m->to($email1)->subject('Notification! New comment added.');
        });
    }
    public function EmailTaskCreate($email){
        $email1=$email['email'];
        Mail::send('email.create',compact('email'), function ($m) use($email1){
            $m->from('notifications@designpac.net', 'DesignPac');
            $m->to($email1)->subject('Notification! New Task Created');
        });
    }
//    public function updateFile($id,Request $request){
//        $task_id=$id;
//
//        $uploads_dir =$_SERVER['DOCUMENT_ROOT'].'/uploads';
//        $tmp_name = $_FILES["file"]["tmp_name"];
//        // basename() may prevent filesystem traversal attacks;
//        // further validation/sanitation of the filename may be appropriate
//        $name = rand(1,1000).basename($_FILES["file"]["name"]);
//        move_uploaded_file($tmp_name, "$uploads_dir/$name");
//        $item['path']=$name;
//        $item['task_id']=$task_id;
//        FileModel::create($item);
//        $noti['task_id']=$id;
//
//        if(Auth::user()->hasRole('client')){
//            $noti['created_by']=Auth::user()->id;
//            $designer_id=AssignModel::where('client_id',Auth::user()->id)->value('assign_to');
//            $noti['user_id']=$designer_id;
//
//        }
//        if(Auth::user()->hasRole('designer')){
//            $noti['created_by']=Auth::user()->id;
//            $client_id=AssignModel::where('assign_to',Auth::user()->id)->value('client_id');
//            $noti['user_id']=$client_id;
//        }
//        $noti['action']="uploaded new file on";
//        Notification::create($noti);
//        $act['task_id']=$id;
//        $act['user_id']=Auth::user()->id;
//        $act['action']="uploaded new file on";
//        Activity::create($act);
//        return view('client.file',compact('task_id'));
//    }
//    public function fileUploaded($id){
//        $task_id=$id;
//        return view('client.file',compact('task_id'));
//
//    }
//    public function fileDelete($id){
//        $file_id=$id;
//        $task = FileModel::findOrFail($id);
//        $task->delete();
//        return response($file_id);
//    }

}
