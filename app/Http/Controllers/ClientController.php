<?php

namespace App\Http\Controllers;

use App\AssignModel;
use App\ClientModel;
use App\Package;
use App\TaskModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->designers = TaskModel::getDesigner();
        $this->clients = ClientModel::getClient();
    }
    public function index(){
        $clients = $this->clients;
        $designers = $this->designers;
        return view('admin.client.index',compact('clients','designers'));
        //dd($clients);
    }
    public function createRegister(Requests\UserRequest $request){
        $user = User::create($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $data1=$request->all();
        $package['user_id']=$user->id;
        $package['organization_name']=$data1['organization_name'];
        $package['position_name']=$data1['position_name'];
        $package['suitable_package']=$data1['suitable_package'];
        Package::create($package);
        $this->Email($user);

        $task['created_by']=$package['user_id'];
        $task['status']="ur";
        $task['title']="This Is Task Title";
        $task['description']="This Is Task Description";
        $item=TaskModel::create($task);

        //$user->createLog();
        // get roles
        $roles[0] = "4";

        // asign roles
        $user->roles()->sync($roles);
        return redirect('/login')->with('message', 'success');
    }
    public function assign(Request $request){
        $data=$request->all();
        $data['assign_by']=Auth::User()->name;
        AssignModel::create($data);
        return redirect('/clients');
    }
    public function destroy(Request $request){
        $test=$request->all();
        $id=AssignModel::where('client_id',$test['client_id'])->value('id');
        $data=AssignModel::findorfail($id);
        //dd($data);
        $data->delete();
        return redirect('/clients');
    }
    public function task($id){
        $tasks=TaskModel::where('created_by',$id)->get();
        return view('admin.tasks.index',compact('tasks'));
        //dd($id);
    }
    public function signUp(){
        return view('auth.signUp');
    }
    public function Email($user){
        $email=$user->email;
        Mail::send('email.signUp',compact('user'), function ($m) use($email){
            $m->from('support@designpac.net ', 'DesignPac');
            $m->to($email)->subject('Hey, Welcome to DesignPac!');
            $m->cc('designer@designpac.net');
        });
    }

}
