<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon as BaseCarbon;

class Dashboard extends Controller
{
    public function Home(){
        $currentMonth=Date('m');
        
        $last_month=DB::table('sponsor_datas')->select(DB::raw('Sum(sponsorship_level)as totaldonate'))->where('status','finish')->whereMonth('updated_at', '=', $currentMonth)->get();

    

        $data=DB::select('SELECT monthName(updated_at) as month , year(updated_at) as year,count(updated_at) as total FROM users WHERE role="user"   GROUP BY year,month ');

        $color=[];
        foreach($data as $item){
            $color[]='rgba(54, 162, 235, 0.2)';
        }

        $donateChart=DB::select(' SELECT monthName(updated_at) as month,year(updated_at)  as year ,SUM(sponsorship_level) as total FROM sponsor_datas Where status="finish"  GROUP BY  month,year');

        $colorChart=[];
        foreach($donateChart as $item){
            $colorChart[]='rgba(54, 241, 132, 0.3)';
        }

        $total_user=DB::table('users')->where('role','user')->count();
        $total_price=DB::table('sponsor_datas')->where('status','finish')->sum('sponsorship_level');
        $total_history=DB::table('supporteds')->count();

        return view('dashboard',compact('total_user','total_price','total_history','last_month','data','color','donateChart','colorChart'));
    }

}
