<?php

namespace App\Http\Controllers;

use App\AssignModel;
use App\Package;
use App\TaskModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->designers = TaskModel::getDesigner();
    }
    public function clients(){
        $users = User::where('role','client')->get()->all();
        return view('users.view-user', compact('users'));
    }
    public function tasks(){
        $designers = $this->designers;
        $tasks=TaskModel::orderBy('created_at', 'DESC')->get();
        return view('admin.tasks.index',compact('tasks','designers'));
    }
    public function assign(Request $request){
        $data=$request->all();
        $data['assign_by']=Auth::User()->name;
        AssignModel::create($data);
        return redirect('/tasks');
    }
    public function taskDetail($id){
        $tasks=TaskModel::where('id',$id)->get();
        return view('admin.tasks.details',compact('tasks'));

    }
    public function taskDelete($id){
        $task = TaskModel::findOrFail($id);
        $task->delete();
        return back();

    }
    public function package(Request $request){
        $data=$request->all();
        $pac_id=Package::where('user_id',$data['user_id'])->value('id');

        if($pac_id == null){
            $pack=$request->all();
            $pack['user_id']=$data['user_id'];
            Package::create($pack);
        }else{
            $pac=Package::findorfail($pac_id);
            $pac->update($request->all());
        }

        return back();
    }

}
