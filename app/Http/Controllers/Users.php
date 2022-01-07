<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Validator;




class Users extends Controller
{
    
    public function donors(Request $request){
        $search=$request->search_value;

        if(empty($search)){
            $data=DB::table('users')->where('role','user')->orderby('created_at','desc')->paginate(15);
            return view('userTable',compact('data'));
        }else{
            $data=DB::table('users')->where('role','user')->where('name','LIKE','%'.$search.'%')->orwhere('email','LIKE','%'.$search.'%')->orderby('created_at','desc')->paginate(15);
            return view('userTable',compact('data','search'));
        }
    }

    public function addUser(){
        return view('userForm');
    }
    public function submitUser(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
            'img' => 'image',
        ]);

        $password= Hash::make($request->password);
        if(empty($request->file('img'))){
            DB::table('users')
            ->insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$password,
                'role'=>'admin',  
                'created_at'=>now(),
                'updated_at'=>now(), 
            ]);
        }else{
            $path=Storage::putFile('user-img',$request->file('img'));
            DB::table('users')
            ->insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$password,
                'role'=>'admin',  
                'profile_photo_path'=>$path,
                'created_at'=>now(),
                'updated_at'=>now(), 
            ]);
        }

        session()->flash('addAdmin',"Add Admin Successfully");
        return redirect('systemadmin');
    }

    public function deleteUser(Request $request){
        $id=$request->hidden_id;
        DB::table('users')->where('id',$id)->delete();
        session()->flash('deleteUser',"Delete Successfully");
        return redirect()->back();
    }

    public function showUserUpdate($id){
        $data=DB::table('users')->where('id',$id)->get();
        return response()->json($data);
    }

    public function insertUpdate(Request $request){
        $id=$request->modal_hidden;
        $validated = $request->validate([
            'modal_name' => 'required|string',
            'modal_email' => 'required|email',
            // 'modal_password' => 'required|min:8',
            // 'modal_confirm' => 'required|same:modal_password',
            'modal_img' => 'image',
        ]);
        $password= Hash::make($request->modal_password);
        if(empty($request->file('modal_img'))){
            $path=$request->hidden_img;
            DB::table('users')
            ->where('id',$id)
            ->update([
                'name'=>$request->modal_name,
                'email'=>$request->modal_email,
                'profile_photo_path'=>$path,   
                'updated_at'=>now(), 
                ]);
        }
        else{
            $path=Storage::putFile('user-img',$request->file('modal_img'));
            DB::table('users')
            ->where('id',$id)
            ->update([
                'name'=>$request->modal_name,
                'email'=>$request->modal_email, 
                'profile_photo_path'=>$path, 
                'updated_at'=>now(), 
                ]);
        }
        session()->flash('updateUser',"Update User Successfully");
        return redirect('donors');
    }
    

    public function user_details($id){
        $data[] = DB::table('sponsor_datas')->where('user_id' , $id)->where('status','finish')->sum('sponsorship_level');
        $data[]=DB::table('sponsor_datas')->where('user_id' , $id)->where('status','draft')->count('status');
        $data[]=DB::table('sponsor_datas')->where('user_id' , $id)->where('status','finish')->count('suported_id');
        return response()->json($data);
    }

    public function user_modal_url($id){
        $data=DB::table('sponsor_datas')
        ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
        ->join('users', 'users.id', '=', 'sponsor_datas.user_id')
        ->select('supporteds.img','supporteds.name','supporteds.age','sponsor_datas.sponsorship_level','sponsor_datas.updated_at')
        ->where('status','finish')
        ->orderBy('sponsor_datas.updated_at', 'desc')
        ->where('sponsor_datas.user_id',$id)
        ->get();
         return response()->json($data);
    }



    
    public function donarDetails($id){
        $ID = $id;
        $data[] = DB::table('sponsor_datas')->where('user_id' , $ID)->where('status','finish')->sum('sponsorship_level');
        $data[]=DB::table('sponsor_datas')->where('user_id' , $ID)->where('status','draft')->count('status');
        $data[]=DB::table('sponsor_datas')->where('user_id' , $ID)->where('status','finish')->count('suported_id');

        $history=DB::table('sponsor_datas')
        ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
        ->join('users', 'users.id', '=', 'sponsor_datas.user_id')
        ->select('supporteds.img','supporteds.name as supported_name','supporteds.place','supporteds.age','sponsor_datas.sponsorship_level','sponsor_datas.updated_at as data')
        ->where('status','finish')
        ->where('role','user')
        ->orderBy('data', 'desc')
        ->where('sponsor_datas.user_id',$ID)
        ->paginate(10);

        $user=DB::table('users')->where('id',$ID)->where('role','user')->get();

    
        if(empty($user[0]->id)){
            return redirect('404');
        }
        return view('donarDetails',compact('data','history','user'));
    }

    public function systemadmin(){
        $data=DB::table('users')->where('role','admin')->paginate(10);

        return view('admin',compact('data'));
    }


    public function updateadmin(Request $request){
        $id=$request->modal_hidden;
        $validated = $request->validate([
            'modal_name' => 'required|string',
            'modal_email' => 'required|email',
            // 'modal_password' => 'required|min:8',
            // 'modal_confirm' => 'required|same:modal_password',
            'modal_img' => 'image',
        ]);
        $password= Hash::make($request->modal_password);
        if(empty($request->file('modal_img'))){
            $path=$request->hidden_img;
            DB::table('users')
            ->where('id',$id)
            ->update([
                'name'=>$request->modal_name,
                'email'=>$request->modal_email,
                'profile_photo_path'=>$path,   
                'updated_at'=>now(), 
                ]);
        }
        else{
            $path=Storage::putFile('user-img',$request->file('modal_img'));
            DB::table('users')
            ->where('id',$id)
            ->update([
                'name'=>$request->modal_name,
                'email'=>$request->modal_email, 
                'profile_photo_path'=>$path, 
                'updated_at'=>now(), 
                ]);
        }
        
        session()->flash('updatAdmin',"Update User Successfully");
        return redirect('systemadmin');
    }


    public function updatePassword(Request $request){

        $id = $request->password_hidden;
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_passowrd'=>'required|same:new_password'
        ]);

        $user=DB::table('users')->where('role','admin')->where('id',$id)->get();
        if (Hash::check($request->old_password, $user[0]->password)) { 
           DB::table('users')->where('role','admin')->where('id',$id)->update([
            'password' => Hash::make($request->new_password)
           ]);
            session()->flash('updatePassword',"Update Password Successfully");
            return redirect('systemadmin');
        } else {
            session()->flash('errorPassword', 'Password does not match');
            return redirect('systemadmin');
        }



    }


}
