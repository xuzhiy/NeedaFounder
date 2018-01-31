<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use App\Model\user;
use App\Model\enterprise_account;
use App\Model\enterprise;
use App\Model\card;
use App\Model\payment;

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
		$enterprisea = enterprise_account::all();
		
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
						return redirect()->action('DisplayController@profile_user');
					}
					else
					{
						echo "<script>alert('Wrong password!');history.go(-1);</script>";
						break;
					}
				}
			}
			foreach($enterprisea as $enterprise_account)
			{
				if($enterprise_account->email === $input['email'])
				{
					$x = 1;
					if($enterprise_account->password === sha1($input['password']))
					{
						session_start();
						$_SESSION['email'] = $enterprise_account->email;
						$_SESSION['name'] = $enterprise_account->name;
						// Login successfully.
						return redirect()->action('DisplayController@profile_enterprise');
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
	public function user_register()
	{
		$name_format = '/^\w+$/';
		$email_format = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/';
		$password_format = '/^\w{5,20}$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$enterprisea = enterprise_account::all();
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
			foreach($enterprisea as $enterprise_account)
			{
				if($enterprise_account->email === $input['email'])
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
					$enterprisea = enterprise_account::all();
					$users = user::all();
					return redirect()->action('DisplayController@profile_user');
				}
				else
				{
					echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
				}
			}
		}
    }

    public function enterprise_register()
	{
		$name_format = '/^\w+$/';
		$email_format = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/';
		$password_format = '/^\w{5,20}$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database

		$enterprisea = enterprise_account::all();
		$enterprises = enterprise::all();
		$users = user::all();
		
		$id = 1;
		foreach($enterprises as $enterprise)
		{
			$id = $id + 1;
		}
		
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
			foreach($enterprisea as $enterprise_account)
			{
				if($enterprise_account->email === $input['email'])
				{
					$x = 1;
					echo "<script>alert('Email already exist.');history.go(-1);</script>";
				}
			}
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
					DB::insert('insert into enterprise_account(name,email,password) values(?,?,?)',[$input['name'],$input['email'],sha1($input['password'])]);
					DB::insert('insert into enterprise(id,name,contact) values(?,?,?)',[$id,$input['name'],$input['email']]);
					session_start();
					$_SESSION['email'] = $input['email'];
					$_SESSION['name'] = $input['name'];
					// Get infor from database after insert operation.

					$enterprisea = enterprise_account::all();
					$users = user::all();
					return redirect()->action('DisplayController@profile_enterprise');
				}
				else
				{
					echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
				}
			}
		}
    }
	
	// Change password function.
	public function changePass_user()
	{
		$password_format = '/^\w{5,20}$/';
		
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
	
    public function changePass_enterprise()
	{
		$password_format = '/^\w{5,20}$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$enterprisea = enterprise_account::all();
		
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
				DB::update('UPDATE enterprise_account SET password = ? WHERE email = ?',[sha1($input['password1']),$_SESSION['email']]);
				echo "<script>alert('Change password successfully.');history.go(-1);</script>";
			}
			else
			{
				echo "<script>alert('Information is incomplete.');history.go(-1);</script>";
			}
		}
    }

	// Change information function.
	public function changeInfor_user()
	{
		$name_format = '/^\w+$/';
		$address_format = '/^[0-9A-Za-z\s?]+$/';
		$phone_format = '/^[0-9]{10,14}$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$enterprisea = enterprise_account::all();
		$users = user::all();			

		if(!preg_match($name_format, $input['name']) && $input['name'] !== null)
		{
			echo "<script>alert('Name can only contain letters, numbers and underline.');history.go(-1);</script>";
		}
		else if($input['name'] === null)
		{
			echo "<script>alert('Name cannot be empty.');window.location.replace(document.referrer);</script>";
		}
		else if(!preg_match($address_format, $input['address']) && $input['address'] !== null)
		{
			echo "<script>alert('Address can only contain letters, numbers and space.');history.go(-1);</script>";
		}
		else if(!preg_match($phone_format, $input['phone']) && $input['phone'] !== null)
		{
			echo "<script>alert('Telephone format is wrong.');history.go(-1);</script>";
		}
		else
		{
			if(!isset($_SESSION)){
					session_start();
				}

			if($input['enterprise'] === 'None' )
			{
				DB::update('UPDATE user SET name = ?, address = ?, phone = ?, enterprise = ? WHERE email = ?',[$input['name'],$input['address'],$input['phone'], null, $input['email']]);

				$_SESSION['name'] = $input['name'];

				echo "<script>alert('Change information successfully.');window.location.replace(document.referrer);</script>";
			}
			else
			{
				$_SESSION['name'] = $input['name'];
				DB::update('UPDATE user SET name = ?, address = ?, phone = ?, enterprise = ? WHERE email = ?',[$input['name'],$input['address'],$input['phone'],$input['enterprise'],$input['email']]);
				echo "<script>alert('Change information successfully.');history.go(-1);</script>";
			}
		}
    }

    public function changeInfor_enterprise()
	{
		$name_format = '/^\w+$/';
		$address_format = '/^[0-9A-Za-z\s?]+$/';
		$phone_format = '/^[0-9]{10,14}$/';
		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$enterprisea = enterprise_account::all();
		$users = user::all();
		$enterprises = enterprise::all();
		
		if(!preg_match($name_format, $input['name']) && $input['name'] !== null)
		{
			echo "<script>alert('Name can only contain letters, numbers and underline.');history.go(-1);</script>";
		}
		else if($input['name'] === null)
		{
			echo "<script>alert('Name cannot be empty.');window.location.replace(document.referrer);</script>";
		}
		else if(!preg_match($address_format, $input['address']) && $input['address'] !== null)
		{
			echo "<script>alert('Address can only contain letters, numbers and space.');history.go(-1);</script>";
		}
		else if(!preg_match($phone_format, $input['phone']) && $input['phone'] !== null)
		{
			echo "<script>alert('Telephone format is wrong.');history.go(-1);</script>";
		}
		else
		{
			if(!isset($_SESSION)){
					session_start();
				}

			if($input['name'] === $_SESSION['name'])
			{
				DB::update('UPDATE enterprise_account SET address = ?, phone = ? WHERE email = ?',[$input['address'],$input['phone'],$input['email']]);
				echo "<script>alert('Change information successfully.');history.go(-1);</script>";
			}
			else if($input['name'] !== $_SESSION['name'] && $input['name'] !== null)
			{
				DB::update('UPDATE enterprise_account SET name = ?, address = ?, phone = ? WHERE email = ?',[$input['name'],$input['address'],$input['phone'],$input['email']]);

				foreach($users as $user)
				{
					if($user->enterprise === $_SESSION['name'] )
					{
						DB::update('UPDATE user SET enterprise = ? WHERE email = ?',[$input['name'],$user->email]);
					}

				}
				foreach($enterprises as $enterprise)
				{
					if($enterprise->contact === $_SESSION['email'] )
					{
						DB::update('UPDATE enterprise SET name = ? WHERE contact = ?',[$input['name'],$_SESSION['email']]);
					}

				}
				$_SESSION['name'] = $input['name'];
				echo "<script>alert('Change information successfully.');</script>";
				echo "<script>window.location.replace(document.referrer);</script>";
			}

		}
    }
	
	public function changeEnterprise()
	{		
		// Get infor from request
        $input=Request::all();
		// Get infor from database
		$users = user::all();
		$enterprises = enterprise::all();
		
		if(!isset($_SESSION)){
				session_start();
			}

		DB::update('UPDATE enterprise SET location = ?, background = ?, industry = ?, postTime = ? WHERE contact = ?',[$input['location'],$input['background'],$input['industry'], date('Y-m-d'),$_SESSION['email']]);

		echo "<script>alert('Change information successfully.');</script>";
		echo "<script>window.location.replace(document.referrer);</script>";
    }
	
	// Post4 function
	public function finalPost()
	{
		if(!isset($_SESSION)){
				session_start();
			}
		// Get infor from request
        $input=Request::all();
		
		$name_format = '/^[A-Za-z\s?]+$/';
		$number_format = '/^[0-9]{16}$/';
		$cvv_format = '/^[0-9]{3}$/';
		$expire_format = '/^(0[1-9]|1[0-2])\/[12]\d{3}$/';
		
		// Get infor from database
		$users = user::all();
		$enterprisea = enterprise_account::all();
		$cards = card::all();
		$payments = payment::all();
		
		$card = $input['card'];
		if($card === "new")
		{
			if(!preg_match($name_format, $input['holder']))
			{
				echo "<script>alert('Please follow the prompts to modify the information.');history.go(-1);</script>";
			}
			else if(!preg_match($number_format, $input['number']))
			{
				echo "<script>alert('Please follow the prompts to modify the information.');history.go(-1);</script>";
			}
			else if(!preg_match($expire_format, $input['expire']))
			{
				echo "<script>alert('Please follow the prompts to modify the information.');history.go(-1);</script>";
			}	
			else if(!preg_match($cvv_format, $input['cvv']))
			{
				echo "<script>alert('Please follow the prompts to modify the information.');history.go(-1);</script>";
			}
			else
			{
				$start = substr($input['number'],0,1);
				if($start === "4" || $start === "5" )
				{
					$date = explode("/",$input['expire']);
					if((int)$date[1] < 2018 || ((int)$date[1] === 2018 && (int)$date[0] < 2))
					{
						echo "<script>alert('Card expired.');history.go(-1);</script>";
					}
					else
					{
						$type = "";
						if($start === "4")
						{
							$type = "Visa";
						}
						else
						{
							$type = "MasterCard";
						}
						$holder = $input['holder'];
						$number = $input['number'];
						$expire = $input['expire'];
						$cvv = $input['cvv'];
						$payment_id = 1;	// The id of new payment.
						foreach ($payments as $payment)
						{
							$payment_id = $payment_id + 1;
						}
						$amount = $input['amount'];
						$owner = $_SESSION['email'];
						$date = date('Y-m-d');

						$x = 0; // x=1 when the card is already exist.
						$card_id = 1;	// The id of new card.
						foreach ($cards as $card)
						{
							$card_id = $card_id + 1;
							if(base64_decode($card->number) === $number)
							{
								$x = 1;
							}
						}
						if($x === 0)
						{
							$cardID = $card_id;
							$encode_number = base64_encode($number);
							$encode_cvv = base64_encode($cvv);

							//Store the card information into the database.
							DB::insert('insert into card(id,holder,number,expire,type,owner) values(?,?,?,?,?,?)',[$cardID,$holder,$encode_number,$expire,$type,$_SESSION['email']]);

							//Store the payment information into the database.
							DB::insert('insert into payment(id,amount,cardID,user,date,cvv) values(?,?,?,?,?,?)',[$payment_id,$amount,$cardID,$owner,$date,$encode_cvv]);

							//Store the post information into the database.
							if($input['postType'] === "job")	// post for job
							{
								$id = date('YmdHis');
								$postTime = date('Y-m-j');

								$title =Request::input('title');
								$salary = Request::input('salary');
								$job_type =Request::input('type');
								$location =Request::input('location');
								$vacancy =Request::input('vacancy');
								$requirements =Request::input('requirements');
								$content =Request::input('detail');
								$email =$_SESSION['email'];
								$company = "";
								
								$z = 0; //z=1 when it's normal account. z=2 when it's enterprise account.
								foreach($users as $user)
								{
									if($user->email === $_SESSION['email'])
									{
										$z = 1;
										if($user->enterprise !== null)
										{
											$company = $user->enterprise;
											DB::insert('insert into job(email,contact,id,type,job,vacancy,company,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?,?,?)', array($email,$email,$id,$job_type,$title,$vacancy,$company,$requirements,$content,$salary,$location,$postTime));
										}
										break;
									}
								}
								if($z === 0)
								{
									foreach($enterprisea as $enterprise_account)
									{
										if($enterprise_account->email === $_SESSION['email'])
										{
											$z = 2;
											$company = $enterprise_account->name;
											DB::insert('insert into job(email,contact,id,type,job,vacancy,company,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?,?,?)', array($email,$email,$id,$job_type,$title,$vacancy,$company,$requirements,$content,$salary,$location,$postTime));
											break;
										}
									}
								}
								if($z === 0)
								{
									DB::insert('insert into job(email,contact,id,type,job,vacancy,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?,?)', array($email,$email,$id,$job_type,$title,$vacancy,$requirements,$content,$salary,$location,$postTime));
								}
							}
							else			// post for business
							{
								$id = date('YmdHis');
								$postTime = date('Y-m-j');

								$title =Request::input('title');
								$location =Request::input('location');
								$industry =Request::input('industry');
								$position =Request::input('position');
								$neededPosition =Request::input('neededPosition');
								$requirements =Request::input('requirements');
								$content =Request::input('detail');
								$email =$_SESSION['email'];

								DB::insert('insert into business(email,id,industry,title,requirements,content,location,postTime,position,neededPosition) values(?,?,?,?,?,?,?,?,?,?)', array($email,$id,$industry,$title,$requirements,$content,$location,$postTime,$position,$neededPosition));
							}
							
							echo "<script>alert('Post successfully.');parent.location.href='/homepage'; </script>";
						}
						else
						{
							echo "<script>alert('The card is already exist.');history.go(-1);</script>";
						}
					}
				}
				else
				{
					echo "<script>alert('Please follow the prompts to modify the information.');history.go(-1);</script>";
				}
			}
		} 
		else 
		{
			if(!preg_match($cvv_format, $input['card_cvv']))
			{
				echo "<script>alert('Please follow the prompts to modify the information.');history.go(-1);</script>";
			}
			else
			{
				$payment_id = 1; // The id of new payment.
				foreach ( $payments as $payment ) 
				{
					$payment_id = $payment_id + 1;
				}
				$cardID = $card;
				$owner = $_SESSION[ 'email' ];
				$date = date( 'Y-m-d' );
				$cvv = $input['card_cvv'];
				$amount = $input['amount'];
				$encode_cvv = base64_encode($cvv);
				//Store the payment information into the database.
				DB::insert('insert into payment(id,amount,cardID,user,date,cvv) values(?,?,?,?,?,?)',[$payment_id,$amount,$cardID,$owner,$date,$encode_cvv]);

				//Store the post information into the database.
				if($input['postType'] === "job")	// post for job
				{
					$id = date('YmdHis');
					$postTime = date('Y-m-j');

					$title =Request::input('title');
					$salary = Request::input('salary');
					$job_type =Request::input('type');
					$location =Request::input('location');
					$vacancy =Request::input('vacancy');
					$requirements =Request::input('requirements');
					$content =Request::input('detail');
					$email =$_SESSION['email'];
					$company = "";

					$z = 0; //z=1 when it's normal account. z=2 when it's enterprise account.
					foreach($users as $user)
					{
						if($user->email === $_SESSION['email'])
						{
							$z = 1;
							if($user->enterprise !== null)
							{
								$company = $user->enterprise;
								DB::insert('insert into job(email,contact,id,type,job,vacancy,company,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?,?,?)', array($email,$email,$id,$job_type,$title,$vacancy,$company,$requirements,$content,$salary,$location,$postTime));
							}
							break;
						}
					}
					if($z === 0)
					{
						foreach($enterprisea as $enterprise_account)
						{
							if($enterprise_account->email === $_SESSION['email'])
							{
								$z = 2;
								$company = $enterprise_account->name;
								DB::insert('insert into job(email,contact,id,type,job,vacancy,company,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?,?,?)', array($email,$email,$id,$job_type,$title,$vacancy,$company,$requirements,$content,$salary,$location,$postTime));
								break;
							}
						}
					}
					if($z === 0)
					{
						DB::insert('insert into job(email,contact,id,type,job,vacancy,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?,?)', array($email,$email,$id,$job_type,$title,$vacancy,$requirements,$content,$salary,$location,$postTime));
					}
				}
				else			// post for business
				{
					$id = date('YmdHis');
					$postTime = date('Y-m-j');

					$title =Request::input('title');
					$location =Request::input('location');
					$industry =Request::input('industry');
					$position =Request::input('position');
					$neededPosition =Request::input('neededPosition');
					$requirements =Request::input('requirements');
					$content =Request::input('detail');
					$email =$_SESSION['email'];

					DB::insert('insert into business(email,id,industry,title,requirements,content,location,postTime,position,neededPosition) values(?,?,?,?,?,?,?,?,?,?)', array($email,$id,$industry,$title,$requirements,$content,$location,$postTime,$position,$neededPosition));
				}
				echo "<script>alert('Post successfully.');parent.location.href='/homepage'; </script>";
			}
		}
	
	}
}
