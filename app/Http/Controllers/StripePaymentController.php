<?php

namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\NewMail;
use App\Mail\sendingEmail;
use App\Models\User;
use App\Mail\test;


class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $amount=$request->request_total;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // GBP
        Stripe\Charge::create ([
            "amount" => $amount * 100,
            "currency" => "gbp",
            "source" => $request->stripeToken,
            "description" => "Payment with Cradit Cart" 
    ]);




      
        $id=Auth::user()->id;
        $user=DB::table('users')->select('name')->where('id',$id)->get();
        $username= $user[0]->name;


        $table=DB::table('sponsor_datas')
                  ->where('user_id',$id)
                  ->where('status','draft')
                  ->update([
                    'status'=>'finish',
                    'updated_at'=>date("Y-m-d h:i")
                    ]);

        


        $noti=DB::table('notifications')
        ->insert([
            'user_id'=>$id,
            'url' =>url('paymentlog'),
            'disc'=> $username.' '.' Payment '.' '.$amount.' £',
            'type'=>'donation',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        

        $name=Auth::user()->name;
        

        $data = array('name'=>$name);
        Mail::send('email', $data, function($message) {
            $id=Auth::user()->id;
            $email=Auth::user()->email;
            $user=DB::table('users')->select('name')->where('id',$id)->get();
            $name=$user[0]->name;
           $message->to("".$email."", $name)->subject
              ('Payment');
           $message->from('info@tomorrowshope.tv',"Tomorrow's-Hope");
        });

        session()->flash('payment-success', 'Payment Successfully.');
        return redirect("/");

       
    }
}