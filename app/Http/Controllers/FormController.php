<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use App\Model\user;

class FormController extends Controller
{
    //
	public function login()
	{
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$datas = user::all();
		
		$x = 0;			// x=1 when the email exist.
		foreach($datas as $data)
		{
			if($data->email === $input['email'])
			{
				$x = 1;
				if($data->password === $input['password'])
				{
					echo "<script>alert('Login successfully!');history.go(-1);</script>";
				}
				else
				{
					echo "<script>alert('Wrong password!');history.go(-1);</script>";
					break;
				}
			}
		}
		if($x === 0)
		{
			echo "<script>alert('Email does not exist.');history.go(-1);</script>";
		}
    }
	
	public function register()
	{
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$datas = user::all();

		$x = 0;			// x=1 when the email exist.
		foreach($datas as $data)
		{
			if($data->email === $input['email'])
			{
				$x = 1;
				echo "<script>alert('Email already exist.');history.go(-1);</script>";
			}
		}
		if($x === 0)
		{
			if($input['name'] !== null && $input['email'] !== null && $input['password'] !== null)
			{
				DB::insert('insert into user(name,email,password) values(?,?,?)',[$input['name'],$input['email'],$input['password']]);
				echo "<script>alert('Register successfully!');history.go(-1);</script>";
			}
			else
			{
				echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
			}
		}
    }
}
