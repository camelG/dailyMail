<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\dailyMail;
use App\DailyModel;
use App\DetailModel;

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
        $to = ['camel.tn@gmail.com'];

        if ($user = \Auth::user()):
            $data = $this->makeDataByAuth($user);
        echo '<h2>'.$data['title'].'</h2>';
        echo view('mail')->with($data);

        $daily['user_id'] = $user->id;
        $daily['title'] = $data['title'];
        $daily['text'] = $data['text'];
        $daily['hope'] = $data['hope'];

        $dailymodel = new DailyModel();
        $daily_id = $dailymodel->insert($daily);

        for ($i = 0; $i < count($data['job']); ++$i) {
            $detail[$i]['daily_id'] = $daily_id;
            $detail[$i]['job'] = $data['job'][$i] ?? '';
            $detail[$i]['jobstart'] = $data['jobstart'][$i] ?? '';
            $detail[$i]['jobend'] = $data['jobend'][$i] ?? '';
            $detail[$i]['jobinfo'] = $data['jobinfo'][$i] ?? '';
        }

        $detailmodel = new DetailModel();
        $detailmodel->insert_batch($detail);

        Mail::to($to)
            ->bcc($user->email)
            ->send(new dailyMail($data));

        endif;
    }

    public function makeDataByAuth($user)
    {
        $data['title'] = date('Y/m/d').'日報　'.$user->name;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['text'] = Request('text');
        $data['job'] = (array) Request('job');
        $data['jobstart'] = Request('jobstart');
        $data['jobend'] = Request('jobend');
        $data['jobinfo'] = Request('jobinfo');
        $data['hope'] = Request('hope');

        return $data;
    }
}
