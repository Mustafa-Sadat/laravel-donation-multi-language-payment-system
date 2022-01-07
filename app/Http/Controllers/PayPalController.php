<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\NewMail;
use App\Mail\sendingEmail;
use App\Models\User;


class PayPalController extends Controller
{
    /**
    * Responds with a welcome message with instructions
    *
    * @return \Illuminate\Http\Response
    */
    public function payment($total)
    {
       
                $data = [];
                $username=Auth::user()->name;
                $data['items'] = [
                    [
                        'name' => $username,
                        'price' => $total,
                        'desc'  => 'Payments',
                        ]
                    ];
                    
                    
                    $data['invoice_id'] = 1;
                    $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
                    $data['return_url'] = route('payment.success');
                    $data['cancel_url'] = route('payment.cancel');
                    $data['total'] = $total;
                    $provider = new ExpressCheckout;
                    $response = $provider->setExpressCheckout($data);
                    $response = $provider->setExpressCheckout($data, true);
                    
                    return redirect($response['paypal_link']);
                    
                }

                public function cancel()
                {
                    session()->flash('paypal-error', 'Your payment is canceled.');
                    return redirect("/");
                }
                
               
                public function success(Request $request)
                {
                    $response = $provider->getExpressCheckoutDetails($request->token);
                    if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
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
                                'disc'=> $username.' '.' Payment '.' '.$total.' £',
                                'type'=>'donation',
                                'created_at'=>now(),
                                'updated_at'=>now()
                                ]);
                                $name=Auth::user()->name;
                                $email=Auth::user()->emal;
                                $info = array('name'=>$name);
                                Mail::send('email', $info, function($message) {
                                    $id=Auth::user()->id;
                                    $email=Auth::user()->email;
                                    $user=DB::table('users')->select('name')->where('id',$id)->get();
                                    $name=$user[0]->name;
                                   $message->to("".$email."", $name)->subject
                                      ('Payment');
                                   $message->from('info@tomorrowshope.tv',"Tomorrow's-Hope");
                                });
                                
                        session()->flash('paypal-success', 'Payment Successfully.');
                        return redirect("/");
                    }
                    session()->flash('paypal-wrong', 'Something is wrong.');
                    return redirect("/");
                }
            }