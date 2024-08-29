<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getUserDetails(){
       $Details=User::all();
       return view('admin.user-list',['details'=>$Details]);
    } 

    public function getUserDetailsID(string $uid){
         $id=base64_decode($uid);
       $Details=User::where('id',$id)->first();
       return view('admin.edit',['details'=>$Details]);
    }

    function updateUserDetails(Request $request){

        $validate_request=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        if ($validate_request->fails()) {
            return redirect()->back()->with('msg', 'Please fill all the details');
        }

        $uid=$request->input('id');
         $id=base64_decode($uid);
        $Name=$request->input('name');
        $Email=$request->input('email');
        $password=$request->input('password');
        $data=array(
        "name"=>$Name,
        "email"=>$Email,
        "password"=>Hash::make($password)
        );

        User::where('id',$id)->update($data);
       return redirect('admin/user-list')->with('success',"User details updated successfully!");
    }

    function deleteUserDetails(Request $request,$uid){

        $id=base64_decode($uid);
         User::where('id',$id)->delete();
      return redirect('admin/user-list')->with('success',"User details Deleted successfully!");

    }

}
