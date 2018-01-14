<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use App\Model\user;

class FormController extends Controller
{
    // Login function
	public function login()
	{
		$email_format = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$users = user::all();
		
		if(!preg_match($email_format, $input['email']))
		{
			echo "<script>alert('The format of E-mail is invalid.');history.go(-1);</script>";
		}
		else
		{
			$x = 0;			// x=1 when the email exist.
			foreach($users as $user)
			{
				if($user->email === $input['email'])
				{
					$x = 1;
					if($user->password === sha1($input['password']))
					{
						session_start();
						$_SESSION['email'] = $user->email;
						$_SESSION['name'] = $user->name;
						// Login successfully.
						return redirect()->action('DisplayController@profile');
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
	
	// Register function
	public function register()
	{
		$name_format = '/^\w+$/';
		$email_format = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/';
		$password_format = '/^(\w{5,20})+$/';
		
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$users = user::all();
		
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
			foreach($users as $user)
			{
				if($user->email === $input['email'])
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
					session_start();
					$_SESSION['email'] = $input['email'];
					$_SESSION['name'] = $input['name'];
					// Get infor from database after insert operation.
					$users = user::all();
					return redirect()->action('DisplayController@profile');
				}
				else
				{
					echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
				}
			}
		}
    }
	
	// Change password function.
	public function changePass()
	{
		$password_format = '/^(\w{5,20})+$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$users = user::all();
		
		if(!preg_match($password_format, $input['password1']))
		{
			echo "<script>alert('Password can only contain 5-20 letters, numbers and underline.');history.go(-1);</script>";
		}
		else if($input['password1'] !== $input['password2'])
		{
			echo "<script>alert('These two passwords do not match.');history.go(-1);</script>";
		}
		else
		{

			if($input['password1'] !== null)
			{
				if(!isset($_SESSION)){
					session_start();
				}
				DB::update('UPDATE user SET password = ? WHERE email = ?',[sha1($input['password1']),$_SESSION['email']]);
				echo "<script>alert('Change password successfully.');history.go(-1);</script>";
			}
			else
			{
				echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
			}
		}
    }
	
	// Change information function.
	public function changeInfor()
	{
		$name_format = '/^\w+$/';
		$address_format = '/^[0-9A-Za-z\s?]+$/';
		$phone_format = '/^[0-9]{10,14}$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$users = user::all();
		
		if(!preg_match($name_format, $input['name']))
		{
			echo "<script>alert('Name can only contain letters, numbers and underline.');history.go(-1);</script>";
		}
		else if(!preg_match($address_format, $input['address']))
		{
			echo "<script>alert('Address can only contain letters, numbers and space.');history.go(-1);</script>";
		}
		else if(!preg_match($phone_format, $input['phone']))
		{
			echo "<script>alert('Telephone format is wrong.');history.go(-1);</script>";
		}
		else
		{

			if($input['name'] !== null && $input['email'] !== null && $input['address'] !== null && $input['phone'] !== null)
			{
				DB::update('UPDATE user SET name = ?, address = ?, phone = ? WHERE email = ?',[$input['name'],$input['address'],$input['phone'],$input['email']]);
				echo "<script>alert('Change information successfully.');history.go(-1);</script>";
			}
			else
			{
				echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
			}
		}
    }
	
	// Send message function
	public function send()
	{
		// Verify if the receiver is exist. If yes, store the message.
		
	}
}
