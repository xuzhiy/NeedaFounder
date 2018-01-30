<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Model\user;
use App\Model\job;
use App\Model\message;
use App\Model\business;
use App\Model\enterprise;
use App\Model\history;
use App\Model\enterprise_account;

class ContactController extends Controller
{
    /**
     * 显示表单
     *
     * @return View
     */

    public function contact(){
		// Get infor from database
		$users = user::all();
		$enterprisea = enterprise_account::all();

		return view('message', compact( 'users', 'enterprisea'));
    }

    public function send() {

        if(!isset($_SESSION)){
            session_start();
        }
        $para=Request::all();
        $users = user::all();
        $messages = message::all();


        $receiver = Request::input('receiver');
        $subject = Request::input('subject');
        $message = Request::input('message');
        $time = date('Y-m-j');
        $sender =$_SESSION['email'];
    
        DB::insert('insert into message(receiver,subject,content,time,sender) values(?,?,?,?,?)', array($receiver,$subject,$message,$time,$sender));
		
		$enterprisea = enterprise_account::all();
        return view('/message', compact('users', 'messages', 'enterprisea'));


    }

    public function inbox(){
        $users = user::all();
        $messages = message::all();
		$enterprisea = enterprise_account::all();
        return view('/inbox', compact('users', 'messages', 'enterprisea'));

    }

    public function sent(){
        $users = user::all();
        $messages = message::all();
		$enterprisea = enterprise_account::all();
        return view('/sent', compact('users', 'messages', 'enterprisea'));

    }

}