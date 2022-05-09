<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller 
{
    public function __contruct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('users.index');
    }
    public function edit($id){
        $data['info'] = DB::table('users')->where('id',$id)->first();
        return view('users.edit',$data);
    }
    public function update(Request $request, $id){
        $data = $request->except('_token','photo');
        $data['remember_token'] = $request->_token;

        if($request->email != ""){
            $request->validate([
                'email' => 'email',
            ]);
        }
        if($request->file('photo')){
            if (!$request->file('photo')->getSize()) {
                return redirect("/user/edit/{$id}")
                            ->with('warning','ទំហំរូបលើសពី 2MB')
                            ->withInput();
            }
            else{
                $imageName=time().'.'.$request->photo->getClientOriginalExtension();
                $imagefolder = public_path('/assets/images/');
                $request->photo->move($imagefolder, $imageName);
                $data['photo'] = $imageName;
            }
        } 
        $update = DB::table('users')
                ->where('id', $id)
                ->limit(1)
                ->update($data);

        if($update){
            return redirect('/user/detail/')->with('success', 'update គណនីជោគជ័យ');
        }
        else{
            return redirect('/user/detail/')->with('error', 'update គណនីបរាជ័យ');
        }
    }
    public function changePassword(){
        return view('users.change_password');
    }
    public function updatePassword(Request $request,$id){
        if($request->password == "" && $request->password_confirmation == ""){
            return redirect('/dashboard')->with('warning', 'ប្រើប្រាស់លេខសម្ងាត់ដដែរ​ !!!');
        }
       if($request->password != "" || $request->password_confirmation != ""){
        $request->validate([
            'password' => 'required|min:6|max:25|confirmed',
        ]);
        $data['password'] = Hash::make($request->password);
       }

       dd($request->all());
       $data['remember_token'] = $request->_token;
       
       $update = DB::table('users')->where('id',$id)->limit(1)->update($data);
       
        if($update){
            return redirect('/dashboard')->with('success', 'update លេខសម្ងាត់ជោគជ័យ');
        }
        else{
            return redirect('/dashboard')->with('error', 'update លេខសម្ងាត់បរាជ័យ');
        }
    }
}
