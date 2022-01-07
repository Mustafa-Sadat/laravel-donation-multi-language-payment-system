<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;


// use App\Models\Book;

// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Categoty;

class SupportedController extends Controller
{
    
    public function index(){
        $data=DB::table('supporteds')->select('id','name','img','language','disc')->where('language','English')->paginate(9);
        return view('donation',compact('data'));
    }

    public function indexEn(){
        return redirect('/');
    }

    public function view($id){
        $data=DB::table('supporteds')->where('id',$id)->get();
        return response()->json($data);
    }

    public function show(Request $request){
        $search=$request->search_value;
        $lang=$request->lang;

        $langAll=DB::table('supporteds')->count();
        $langFarsi=DB::table('supporteds')->where('language','Farsi')->count();
        $langPashto=DB::table('supporteds')->where('language','Pashto')->count();
        $langEnglish=DB::table('supporteds')->where('language','English')->count();

        if(empty($search)){
            if(empty($lang)){
                $data=DB::table('supporteds')->orderby('id','desc')->paginate(15);
                return view('historyTable',compact('data','lang','langAll','langFarsi','langPashto','langEnglish'));
            }else{
                $data=DB::table('supporteds')->where('language', $lang)->paginate(15);
                return view('historyTable',compact('data','lang','langAll','langFarsi','langPashto','langEnglish'));   
            }
        }else{
            $data=DB::table('supporteds')->where('name',"LIKE","%".$search."%")->orwhere('place','LIKE','%'.$search.'%')->orwhere('age','LIKE','%'.$search.'%')->orderby('id','desc')->paginate(15);
            return view('historyTable',compact('data','search','lang','langAll','langFarsi','langPashto','langEnglish'));
        }
       
    }

    public function filterLang(Request $request){
        $lang=$request->lang;

        if(empty($lang)){
            $data=DB::table('supporteds')->paginate(15);
            return view('historyTable',compact('data'));
        }else{
            $data=DB::table('supporteds')->where('language',$lang)->paginate(15);
            return view('historyTable',compact('data','lang'));   
        }
    }




    public function addhistory(){
        return view('historyForm');
    }

    public function insert(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'place'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'disc'=>'required',
            'language'=>'required',
            'img'=>'required|max:300',
        ]);

       if($data){
            $path=Storage::putFile('supporteds-img',$request->file('img'));
            DB::table('supporteds')
                ->insert([
                    'name'=>$request->name,
                    'place'=>$request->place,
                    'gender'=>$request->gender,
                    'age'=> $request->age,
                    'disc'=> $request->disc,
                    'language'=> $request->language,
                    'img'=>$path,
                    'created_at'=>now(),
                ]);
            session()->flash('supporteds',"Add Successfully");
            return redirect('historylist');
       }
    }

    public function model($id){
        $supportedModal=DB::table('supporteds')->where('id',$id)->get();
        return response()->json($supportedModal);
    }

    public function supportedUpdate(Request $request){
        $data=$request->validate([
            'model_name'=>'required',
            'model_place'=>'required',
            'model_gender'=>'required',
            'model_age'=>'required',
            'model_language'=>'required',
            'model_disc'=>'required',
        ]);
        $id=$request->hidden;
        if($data){

            if(empty($request->file('img_file'))){
                $path=$request->modal_hidden_img;
                DB::table('supporteds')
                ->where('id',$id)
                ->update([
                    'name'=>$request->model_name,
                    'place'=>$request->model_place,
                    'gender'=>$request->model_gender,
                    'age'=> $request->model_age,
                    'language'=> $request->model_language,
                    'disc'=> $request->model_disc,
                    'img'=>$path,
                    'updated_at'=>now(),
                    ]);
                session()->flash('supporteds_update','Update Successfully');
                return redirect()->back();
            }else{
                $path=Storage::putFile('supporteds-img',$request->file('img_file'));
                DB::table('supporteds')
                ->where('id',$id)
                ->update([
                    'name'=>$request->model_name,
                    'place'=>$request->model_place,
                    'gender'=>$request->model_gender,
                    'age'=> $request->model_age,
                    'language'=> $request->model_language,
                    'disc'=> $request->model_disc,
                    'img'=>$path,
                    'updated_at'=>now(),
                    ]);
                session()->flash('supporteds_update','Update Successfully');
                return redirect()->back();
            }
           
        }
    }

    public function supportedDelete(Request $request){
        $id=$request->hidden_delete;
        DB::table('supporteds')->where('id',$id)->delete();
        session()->flash('supporteds_delete',"Delete Successfully");
        return redirect()->back();
    }

    public function history($id){
        try {
            $id = decrypt($id);

        } catch (DecryptException $e) {
            abort(404);
        }

        $data=DB::table('supporteds')->where('id',$id)->get();
        return view('history',compact('data'));
    }

    public function historydetails($id){
        $ID=$id;

        $balance[] = DB::table('sponsor_datas')->where('suported_id' , $ID)->where('status','finish')->sum('sponsorship_level');
        $balance[]=DB::table('sponsor_datas')->where('suported_id' , $ID)->where('status','draft')->count('status');
        $balance[]=DB::table('sponsor_datas')->where('suported_id' , $ID)->where('status','finish')->count('user_id');
        $sponsor=DB::table('sponsor_datas')
        ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
        ->join('users', 'users.id', '=', 'sponsor_datas.user_id')
        ->select('users.name','users.email','sponsor_datas.updated_at','sponsor_datas.sponsorship_level')
        ->where('status','finish')
        ->orderBy('sponsor_datas.updated_at', 'desc')
        ->where('sponsor_datas.suported_id',$ID)
        ->paginate(10);
        $data=DB::table('supporteds')->where('id',$ID)->get();

        if(empty($data[0])){
            return redirect('404');
        }
        return view('historyDetail',compact('data','balance','sponsor'));

    }


    // Farsi
    public function indexFarsi(){
        \App::setlocale("fa");
        $data=DB::table('supporteds')->select('id','name','img','language','disc')->where('language','Farsi')->paginate(9);
        return view('fa.donation',compact('data'));
    }

    public function historyFarsi($id){
        \App::setlocale("fa");
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $data=DB::table('supporteds')->where('id',$id)->get();
        return view('fa.history',compact('data'));
    }


     // Pashto
     public function indexpashto(){
        \App::setlocale("ps");
        $data=DB::table('supporteds')->select('id','name','img','language','disc')->where('language','Pashto')->paginate(9);
        return view('ps.donation',compact('data'));
    }

    public function historypashto($id){
        \App::setlocale("ps");
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $data=DB::table('supporteds')->where('id',$id)->get();
        return view('ps.history',compact('data'));
    }
    

}
