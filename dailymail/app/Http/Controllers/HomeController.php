<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\dailyMail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if ($user = \Auth::user()):

        $data = $this->makeDataByAuth($user);

        return view('home', $data);

        endif;
    }

    public function send()
    {
        $to = ['abc@email.com'];

        if ($user = \Auth::user()):
            $data = $this->makeDataByAuth($user);
        echo '<h2>'.$data['title'].'</h2>';
        echo view('mail')->with($data);

        Mail::to($to)
            ->bcc($user->email)
            ->send(new dailyMail($data)); else:
        echo '???';
        endif;
    }

    public function makeDataByAuth($user)
    {
        $data['title'] = date('Y/m/d').'日報　'.$user->name;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['text'] = nl2br(Request('text'));

        return $data;
    }
}
