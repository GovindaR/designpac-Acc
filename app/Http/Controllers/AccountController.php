<?php

namespace App\Http\Controllers;

use App\TaskModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{


  public function index1(){

   //    $uprofile = DB::table('user_profile')->find(Auth::id()); 
   // return view('folder.profile')->with('uprofile',$uprofile);
    $id = Auth::user()->id;
    //dd ($id);
    $data = DB::table('transaction')->where('user_id',$id)->get();
    return view('tabs.index', compact('data'));
  }
   public function index(){

       $id = Auth::user()->id;
       if($id == Auth::user()->id){
           //$acts=TaskModel::where('created_by',Auth::user()->id)->get();
           //$data=User::where('id',$id)->get();
           $data = DB::table('transaction')->where('user_id',$id)->get();
           
          return view('tabs.index', compact('data'));
       }else{
           return back();
       }
   }
    // public function index11($id){

    //     if($id == Auth::user()->id){
    //         $acts=TaskModel::where('created_by',Auth::user()->id)->get();
    //         $data=User::where('id',$id)->get();
    //         return view('tabs.index',compact('data','acts'));
    //     }else{
    //         return back();
    //     }
    // }
   public function complete(){
            $id = Auth::user()->id;
           $acts=TaskModel::where('created_by',Auth::user()->id)->get();
           $data=User::where('id',$id)->get();

       $data1['invoiceNo']=$_POST['invoiceNo'];
       $data1['amount']= $_POST['Amount']/100;
       $data1['amount']= (int) $data1['amount'];
       $data1['dateTime']=$_POST['dateTime'];
       $data1['tranRef']=$_POST['tranRef'];
       $data1['userDefined1']= $_POST['userDefined1'];
       
	if($data1['userDefined1'] == "Starter Package"){
	$data1['userDefined1'] = "Monthly";
	}else{
	$data1['userDefined1'] = "Semi-annually";
	}
       $status = $_POST['respCode'];
       $data1['name']=Auth::user()->first_name;
       if($status == '00'){
           $this->Email($data1);
       }

           return view('client.accountComplete',compact('data','acts'));

   }
    public function Email($data1){
        $email=['finance@designpac.net','thedesignpac@gmail.com'];
        $name = $data1['name'];
        Mail::send('email.payment',compact('data1'), function ($m) use($email,$name){
            $m->from('finance@designpac.net', 'DesignPac');
            $m->to($email)->subject('Hey '.$name.', Payment');
        });
    }
}
