<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class PromoController extends Controller
{
    //
    public function newsletter()
    {        # code...
        return view('back.promotion.newsletter');
    }
    
    public function send_newsletter(Request $request)
    {
        $users = User::all();
        if ($request->user_emails ==1) {
            foreach ($users as $key => $user) {
                // return $user->email;
                $data['view'] = 'emails.newsletter';
                $data['subject'] = $request->subject;
                $data['email'] = env('MAIL_FROM_ADDRESS');
                $data['content'] = $request->content;
                
                try {
                    Mail::to($user->email)->queue(new Sendmail($data));
                } catch (\Exception $e) {
                    // dd($e);
                }
            }
        }            
        $other_emails = array_filter(array_map('trim', explode(',', $request->other_emails)));
        foreach ($other_emails as $key => $email) {
            $data['view'] = 'emails.newsletter';
            $data['subject'] = $request->subject;
            $data['email'] = env('MAIL_FROM_ADDRESS');
            $data['content'] = $request->content;
            
            try {
                Mail::to($email)->queue(new Sendmail($data));
            } catch (\Exception $e) {
                // dd($e);
            }
        }

        return back()->with('success',__('Newsleter sent Successfully.'));
    }

    public function advertising()
    {
        # code...
        return view('back.promotion.advertising');
    }
    
    public function test_smtp(Request $request)
    {
        # code...
        $data['view'] = 'emails.newsletter';
        $data['subject'] = "SMTP Test on ".\get_setting('title');
        $data['email'] = env('MAIL_FROM_ADDRESS');
        $data['content'] = "SMTP Testing </br> We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet Service Providers utilized and other similar information. </br> Designed By Jayflash <a href='https://jadsedev.com.ng'>JadesDev </a>";
        
        try {
            Mail::to($request->email)->queue(new Sendmail($data));
        } catch (\Exception $e) {
            // dd($e);
            return back()->with('error',__('Check SMTP Settings'));
        }
        return back()->with('success',__('Email sent Successfully.'));
    }
}
