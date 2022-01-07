<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorDataController extends Controller
{
    
    
    public function index(Request $request){
        $user_id=Auth::user()->id;
        $sponsorship_level=$request->select_level;
        $suported_id=$request->hidden;
        $other_level=$request->other_level;
        // if(empty($request->select_level)){

        // }else{

        // }
         if(empty($other_level)){

                $check=DB::table('sponsor_datas')->where('user_id',$user_id)->where('status','draft')->get();
                
                foreach($check as $item){
                    if($item->sponsorship_level==$sponsorship_level && $item->suported_id==$suported_id){
                        session()->flash('sponsorship_level',"This Sponsorship Level his selected already!");
                        return  back();
                    }
                }
                
                DB::table('sponsor_datas')
                ->insert([
                    'user_id'=>$user_id,
                    'sponsorship_level'=>$sponsorship_level,
                    'suported_id'=>$suported_id,
                    'created_at'=>now(),
                    ]);
                    return  redirect('sponsor');
        }else{
            DB::table('sponsor_datas')
            ->insert([
                'user_id'=>$user_id,
                'sponsorship_level'=>$other_level,
                'suported_id'=>$suported_id,
                'created_at'=>now(),
                ]);
                return  redirect('sponsor');
        }
        
    }
        
        
    public function view(){
        $user_id=Auth::user()->id;
        $data=DB::table('sponsor_datas')
        ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
        ->select('sponsor_datas.id','sponsor_datas.created_at','sponsor_datas.sponsorship_level','supporteds.img', 'supporteds.name', 'supporteds.age','supporteds.place')
        ->where('status','draft')
        ->where('user_id',$user_id)
        ->where('language','English')
        ->orderBy('name', 'asc')
        ->get();
        return view('sponsor',compact('data'));
    }
        
    public function delete(Request $request){
        $id=$request->hidden_delete;
        DB::table('sponsor_datas')->where('id',$id)->where('status','draft')->delete();
        session()->flash('sponsor_draft','Remove Successfully');
        return redirect('sponsor');
    }
        
        
        //Dashboard Code
        public function showTable(Request $request){
            $search=$request->search_value;

            if(empty($search)){
                $data=DB::table('sponsor_datas')
                ->distinct('users.email')
                ->join('users','users.id','=','sponsor_datas.user_id')
                ->select('users.name as username','users.email','sponsor_datas.updated_at as created_at')
                ->groupBy('users.name','sponsor_datas.updated_at','users.email','suported_id','sponsorship_level')
                ->where('status','finish')
                ->orderby('created_at','desc')
                ->paginate(15);

                DB::table('notifications')->where('status','unread')->where('type','donation')->update([
                    'status'=>'read',
                    'read_at'=>now()
                    ]);

                
                    return view('sponsor-data',compact('data'));
            }else{
                $data=DB::table('sponsor_datas')
                ->distinct('users.email')
                ->join('users','users.id','=','sponsor_datas.user_id')
                ->select('users.name as username','users.email','sponsor_datas.updated_at as created_at')
                ->groupBy('users.name','sponsor_datas.updated_at','users.email','suported_id')
                ->where('status','finish')
                ->where('name','LIKE','%'.$search.'%')
                ->orwhere('email','LIKE','%'.$search.'%')
                ->orderby('created_at','desc')
                ->paginate(15);
                DB::table('notifications')->where('status','unread')->where('type','donation')->update([
                    'status'=>'read',
                    'read_at'=>now()
                    ]);
                    return view('sponsor-data',compact('data','search'));
            }






            }
            
            
            
            
            public function details(Request $request){
                $user_id=$request->sponsor_content;
                $data=DB::select("SELECT  DISTINCT (suported_id),user_id, COUNT(suported_id) as count,supporteds.img,supporteds.name,sponsor_datas.total_price ,sponsor_datas.sponsorship_level, supporteds.id as suported_number  FROM sponsor_datas INNER JOIN Users ON sponsor_datas.user_id=users.id  INNER JOIN supporteds ON sponsor_datas.suported_id=supporteds.id WHERE status='finish' GROUP BY supporteds.id, suported_id,supporteds.img,supporteds.name,sponsor_datas.sponsorship_level , sponsor_datas.total_price,supporteds.id,user_id HAVING user_id=?", [$user_id]);
                return view('sponsor-data-content',compact('data'));
            }
            
            
            public function sponsorDelete(Request $request){
                $username= $request->hidden_username;
                $email=$request->hidden_email;
                $created=$request->hidden_created;
                
                $id=DB::table('users')->where('email',$email)->where('name',$username)->get('id');
                
                $user_id= $id[0]->id;
                
                DB::table('sponsor_datas')->where('user_id',$user_id)->where('updated_at',$created)->delete();
                session()->flash('sponsor_delete',"Delete Successfully");
                return redirect()->back();
            }
            
            
            public function checkout(Request $request){
                $total = $request->hidden;
                return view('chekout',compact("total"));
            }

          
            
            public function sponsor_data_view($username,$email,$created){
                $data=DB::table('sponsor_datas')
                ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
                ->join('users', 'users.id', '=', 'sponsor_datas.user_id')
                ->select('sponsor_datas.id','sponsor_datas.updated_at','sponsor_datas.sponsorship_level','supporteds.img', 'supporteds.name', 'supporteds.age','supporteds.place')
                ->where('status','finish')
                ->orderBy('sponsor_datas.updated_at', 'desc')
                ->where('users.name',$username)
                ->where('users.email',$email)
                ->where('sponsor_datas.updated_at',$created)
                ->get();
                
                return response()->json($data);
            }
            
            public function history_details($id){
                $balance[] = DB::table('sponsor_datas')->where('suported_id' , $id)->where('status','finish')->sum('sponsorship_level');
                $balance[]=DB::table('sponsor_datas')->where('suported_id' , $id)->where('status','draft')->count('status');
                $balance[]=DB::table('sponsor_datas')->where('suported_id' , $id)->where('status','finish')->count('user_id');
                return response()->json($balance);
            }
            
            public function history_modal_url($id){
                
                $data=DB::table('sponsor_datas')
                ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
                ->join('users', 'users.id', '=', 'sponsor_datas.user_id')
                ->select('users.name','users.email','sponsor_datas.updated_at','sponsor_datas.sponsorship_level')
                ->where('status','finish')
                ->orderBy('sponsor_datas.updated_at', 'desc')
                ->where('sponsor_datas.suported_id',$id)
                ->get();
                return response()->json($data);   
            }
            







            // Lang Code=====================================
                 
                // Farsi


                    public function viewfarsi(){
                        \App::setlocale("fa");
                        $user_id=Auth::user()->id;
                        $data=DB::table('sponsor_datas')
                        ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
                        ->select('sponsor_datas.id','sponsor_datas.created_at','sponsor_datas.sponsorship_level','supporteds.img', 'supporteds.name', 'supporteds.age','supporteds.place')
                        ->where('status','draft')
                        ->where('language','Farsi')
                        ->where('user_id',$user_id)
                        ->orderBy('name', 'asc')
                        ->get();
                        return view('fa.sponsor',compact('data'));
                    }


                    public function deletefarsi(Request $request){
                        $id=$request->hidden_delete;
                        DB::table('sponsor_datas')->where('id',$id)->where('status','draft')->delete();
                        session()->flash('sponsor_draft','Remove Successfully');
                        return redirect('fa/sponsor');
                    }


                    public function indexfarsi(Request $request){
                        $user_id=Auth::user()->id;
                        $sponsorship_level=$request->select_level;
                        $suported_id=$request->hidden;
    
                        $other_level=$request->other_level;
                        if(empty($other_level)){
                                $check=DB::table('sponsor_datas')->where('user_id',$user_id)->where('status','draft')->get();
                                foreach($check as $item){
                                    if($item->sponsorship_level==$sponsorship_level && $item->suported_id==$suported_id){
                                        session()->flash('sponsorship_level',"This Sponsorship Level his selected already!");
                                        return  back();
                                    }
                                }
                                
                                DB::table('sponsor_datas')
                                ->insert([
                                    'user_id'=>$user_id,
                                    'sponsorship_level'=>$sponsorship_level,
                                    'suported_id'=>$suported_id,
                                    'created_at'=>now(),
                                ]);
                                return redirect('fa/sponsor');
                           }else{
                            DB::table('sponsor_datas')
                            ->insert([
                                'user_id'=>$user_id,
                                'sponsorship_level'=>$other_level,
                                'suported_id'=>$suported_id,
                                'created_at'=>now(),
                            ]);
                            return redirect('fa/sponsor');
                           }
                           
                    }
                      
                    public function checkoutfarsi(Request $request){
                        $total = $request->hidden;
                        return view('chekout',compact("total"));
                    }
                    



                    // Pashto Code
            
                    public function viewpashto(){
                        \App::setlocale("ps");
                        $user_id=Auth::user()->id;
                        $data=DB::table('sponsor_datas')
                        ->join('supporteds', 'supporteds.id', '=', 'sponsor_datas.suported_id')
                        ->select('sponsor_datas.id','sponsor_datas.created_at','sponsor_datas.sponsorship_level','supporteds.img', 'supporteds.name', 'supporteds.age','supporteds.place')
                        ->where('status','draft')
                        ->where('language','pashto')
                        ->where('user_id',$user_id)
                        ->orderBy('name', 'asc')
                        ->get();
                        return view('ps.sponsor',compact('data'));
                    }

                    public function deletepashto(Request $request){
                        $id=$request->hidden_delete;
                        DB::table('sponsor_datas')->where('id',$id)->where('status','draft')->delete();
                        session()->flash('sponsor_draft','Remove Successfully');
                        return redirect('ps/sponsor');
                    }
            

                    public function indexpashto(Request $request){
                        $user_id=Auth::user()->id;
                        $sponsorship_level=$request->select_level;
                        $suported_id=$request->hidden;
                       
                        $other_level=$request->other_level;
                        if(empty($other_level)){
                                $check=DB::table('sponsor_datas')->where('user_id',$user_id)->where('status','draft')->get();
                                foreach($check as $item){
                                    if($item->sponsorship_level==$sponsorship_level && $item->suported_id==$suported_id){
                                        session()->flash('sponsorship_level',"This Sponsorship Level his selected already!");
                                        return  back();
                                    }
                                }
                                   
                            DB::table('sponsor_datas')
                            ->insert([
                                'user_id'=>$user_id,
                                'sponsorship_level'=>$sponsorship_level,
                                'suported_id'=>$suported_id,
                                'created_at'=>now(),
                                ]);
                                return redirect('ps/sponsor');
                        }else{
                        DB::table('sponsor_datas')
                        ->insert([
                            'user_id'=>$user_id,
                            'sponsorship_level'=>$other_level,
                            'suported_id'=>$suported_id,
                            'created_at'=>now(),
                            ]);
                            return redirect('ps/sponsor');
                        }
                    }

                    public function checkoutpashto(Request $request){
                        $total = $request->hidden;
                        return view('chekout',compact("total"));
                    }
            
        }
        
        
        
        