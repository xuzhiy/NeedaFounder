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
		$email_format = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$datas = user::all();
		
		if(!preg_match($email_format, $input['email']))
		{
			echo "<script>alert('The format of E-mail is invalid.');history.go(-1);</script>";
		}
		else
		{
			$x = 0;			// x=1 when the email exist.
			foreach($datas as $data)
			{
				if($data->email === $input['email'])
				{
					$x = 1;
					if($data->password === sha1($input['password']))
					{
						// Login successfully.
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
    }
	
	public function register()
	{
		$name_format = '/^\w+$/';
		$email_format = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/';
		$password_format = '/^(\w{5,20})+$/';
		
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$datas = user::all();
		
		if(!preg_match($name_format, $input['name']))
		{
			echo "<script>alert('Name can only contain letters, numbers and underline.');history.go(-1);</script>";
		}
		else if(!preg_match($email_format, $input['email']))
		{
			echo "<script>alert('The format of E-mail is invalid.');history.go(-1);</script>";
		}
		else if(!preg_match($password_format, $input['password']))
		{
			echo "<script>alert('Password can only contain 5-20 letters, numbers and underline.');history.go(-1);</script>";
		}
		else
		{
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
					DB::insert('insert into user(name,email,password) values(?,?,?)',[$input['name'],$input['email'],sha1($input['password'])]);
					echo "<script>alert('Register successfully!');history.go(-1);</script>";
				}
				else
				{
					echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
				}
			}
		}
    }
}
