<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use App\Model\user;
use App\Model\job;
use App\Model\business;
use App\Model\enterprise;
use App\Model\history;
<<<<<<< HEAD
use App\Model\enterprise_account;
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f

class DisplayController extends Controller
{
    // Display the homepage page
	public function homepage()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('homepage', compact('users','enterprisea'));
=======
		return view('homepage', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the login page
	public function login()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('login', compact('users','enterprisea'));
=======
		return view('login', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the job page
	public function job()
	{
		if(!isset($_SESSION)){
			session_start();
		}
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = job::all();
		// Get infor from database
		$histories = history::all();
		
		if(isset($para['search']))
		{
			if(isset($para['complete']))
			{
				$salary = (int)$para['salary'];
				$type = (int)$para['type'];
				if(isset($para['keywords']))
				{
					$keywords = $para['keywords'];
					if(isset($para['location']))
					{
						// If the location is defined
						$location = $para['location'];
						// Get infor from database
						$users = user::all();
<<<<<<< HEAD
						$enterprisea = enterprise_account::all();
						return view('job', compact('datas', 'keywords', 'location', 'salary', 'type', 'users','enterprisea'));
=======
						return view('job', compact('datas', 'keywords', 'location', 'salary', 'type', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					}
					else
					{
						// If the location is not defined
						// Get infor from database
						$users = user::all();
<<<<<<< HEAD
						$enterprisea = enterprise_account::all();
						return view('job', compact('datas', 'keywords', 'salary', 'type', 'users','enterprisea'));
=======
						return view('job', compact('datas', 'keywords', 'salary', 'type', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					}
				}
				else if(isset($para['location']))
				{
					// If the location is defined
					$location = $para['location'];
					// Get infor from database
					$users = user::all();
<<<<<<< HEAD
					$enterprisea = enterprise_account::all();
					return view('job', compact('datas', 'location', 'salary', 'type', 'users','enterprisea'));
=======
					return view('job', compact('datas', 'location', 'salary', 'type', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
				}
				else
				{
					// User does not input anything.
					echo "<script>alert('The content cannot be empty!');history.go(-1);</script>";
				}
			}
			else
			{
				if(isset($para['keywords']))
				{
					$keywords = $para['keywords'];
					if(isset($para['location']))
					{
						// If the location is defined
						$location = $para['location'];
						// Get infor from database
						$users = user::all();
<<<<<<< HEAD
						$enterprisea = enterprise_account::all();
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
						
						if(!isset($para['history']))			// If the jump is from history page, the results will not be store for another time.
						{
							if(isset($_SESSION['email']))
							{
								$x = 0; //x is the number of results.
								foreach($datas as $data)
								{
									if ( ( stripos( $data->job, $keywords ) !== false || stripos( $data->content, $keywords ) !== false || stripos( $data->background, $keywords ) !== false || stripos( $data->requirements, $keywords ) !== false ) && ( strcasecmp( $data->location, $location ) == 0 ) ) 
									{
										// Results + 1.
										$x = $x + 1;
									} 
									else 
									{
										continue;
									}
								}
								$y = 0;	//y is the number of existed histories of current user.
								foreach($histories as $history)
								{
									if ($history->email === $_SESSION['email']) 
									{
										// Histories + 1.
										$y = $y + 1;
									} 
									else 
									{
										continue;
									}
								}

								$email = $_SESSION['email'];
								$id = $y + 1;		// ID of this search in history table.
								$type = "job";
								$results = $x;
								$time = date('Y-m-d');

								DB::insert('insert into history(email,id,type,time,keywords,location,results) values(?,?,?,?,?,?,?)',[$email,$id,$type,$time,$keywords,$location,$results]);
							}
						}
						
<<<<<<< HEAD
						return view('job', compact('datas', 'keywords', 'location', 'users','enterprisea'));
=======
						return view('job', compact('datas', 'keywords', 'location', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					}
					else
					{
						// If the location is not defined
						// Get infor from database
						$users = user::all();
<<<<<<< HEAD
						$enterprisea = enterprise_account::all();
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
						
						if(!isset($para['history']))			// If the jump is from history page, the results will not be store for another time.
						{
							if(isset($_SESSION['email']))
							{
								$x = 0; //x is the number of results.
								foreach($datas as $data)
								{
									if (stripos( $data->job, $keywords ) !== false || stripos( $data->content, $keywords ) !== false || stripos( $data->background, $keywords ) !== false || stripos( $data->requirements, $keywords ) !== false) 
									{
										// Results + 1.
										$x = $x + 1;
									} 
									else 
									{
										continue;
									}
								}
								$y = 0;	//y is the number of existed histories of current user.
								foreach($histories as $history)
								{
									if ($history->email === $_SESSION['email']) 
									{
										// Histories + 1.
										$y = $y + 1;
									} 
									else 
									{
										continue;
									}
								}

								$email = $_SESSION['email'];
								$id = $y + 1;		// ID of this search in history table.
								$type = "job";
								$results = $x;
								$time = date('Y-m-d');

								DB::insert('insert into history(email,id,type,time,keywords,results) values(?,?,?,?,?,?)',[$email,$id,$type,$time,$keywords,$results]);
							}
						}
						
<<<<<<< HEAD
						return view('job', compact('datas', 'keywords', 'users','enterprisea'));
=======
						return view('job', compact('datas', 'keywords', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					}
				}
				else if(isset($para['location']))
				{
					// If the location is defined
					$location = $para['location'];
					// Get infor from database
					$users = user::all();
<<<<<<< HEAD
					$enterprisea = enterprise_account::all();
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					
					if(!isset($para['history']))			// If the jump is from history page, the results will not be store for another time.
					{
						if(isset($_SESSION['email']))
						{
							$x = 0; //x is the number of results.
							foreach($datas as $data)
							{
								if (strcasecmp( $data->location, $location ) == 0) 
								{
									// Results + 1.
									$x = $x + 1;
								} 
								else 
								{
									continue;
								}
							}
							$y = 0;	//y is the number of existed histories of current user.
							foreach($histories as $history)
							{
								if ($history->email === $_SESSION['email']) 
								{
									// Histories + 1.
									$y = $y + 1;
								} 
								else 
								{
									continue;
								}
							}

							$email = $_SESSION['email'];
							$id = $y + 1;		// ID of this search in history table.
							$type = "job";
							$results = $x;
							$time = date('Y-m-d');

							DB::insert('insert into history(email,id,type,time,location,results) values(?,?,?,?,?,?)',[$email,$id,$type,$time,$location,$results]);
						}
					}
					
<<<<<<< HEAD
					return view('job', compact('datas', 'location', 'users','enterprisea'));
=======
					return view('job', compact('datas', 'location', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
				}
				else
				{
					// User does not input anything.
					echo "<script>alert('The content cannot be empty!');history.go(-1);</script>";
				}
			}
		}
		else
		{
			// User doesn't input something for searching. Dispaly all objects in database.
			// Get infor from database
			$users = user::all();
<<<<<<< HEAD
			$enterprisea = enterprise_account::all();
			return view('job', compact('datas', 'users','enterprisea'));
=======
			return view('job', compact('datas', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
		}
	}
	
	// Display the business page
	public function business()
	{
<<<<<<< HEAD
		if(!isset($_SESSION)){
			session_start();
		}
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = business::all();
		
		if(isset($para['search']))
		{
			// User inputs something for searching.
			// Get infor from database
<<<<<<< HEAD
			$neededPosition = $para['type1'];
			$position = $para['type2'];
			$users = user::all();
			$enterprisea = enterprise_account::all();
			return view('business', compact('datas', 'neededPosition', 'position', 'users','enterprisea'));
=======
			$users = user::all();
			return view('business', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
		}
		else
		{
			// User doesn't input something for searching. Dispaly all objects in database.
			// Get infor from database
			$users = user::all();
<<<<<<< HEAD
			$enterprisea = enterprise_account::all();
			return view('business', compact('datas', 'users','enterprisea'));
=======
			return view('business', compact('datas', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
		}
	}
	
	// Display the enterprise page
	public function enterprise()
	{
		if(!isset($_SESSION)){
			session_start();
		}
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = enterprise::all();
		// Get infor from database
		$histories = history::all();
		
		if(isset($para['search']))
		{
			if(isset($para['keywords']))
			{
				$keywords = $para['keywords'];
				if(isset($para['location']))
				{
					// If the location is defined
					$location = $para['location'];
					// Get infor from database
					$users = user::all();
<<<<<<< HEAD
					$enterprisea = enterprise_account::all();
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					
					if(!isset($para['history']))			// If the jump is from history page, the results will not be store for another time.
					{
						if(isset($_SESSION['email']))
						{
							$x = 0; //x is the number of results.
							foreach($datas as $data)
							{
								if ( stripos( $data->name, $keywords ) !== false && ( strcasecmp( $data->location, $location ) == 0 ) ) 
								{
									// Results + 1.
									$x = $x + 1;
								} 
								else 
								{
									continue;
								}
							}
							$y = 0;	//y is the number of existed histories of current user.
							foreach($histories as $history)
							{
								if ($history->email === $_SESSION['email']) 
								{
									// Histories + 1.
									$y = $y + 1;
								} 
								else 
								{
									continue;
								}
							}

							$email = $_SESSION['email'];
							$id = $y + 1;		// ID of this search in history table.
							$type = "enterprise";
							$results = $x;
							$time = date('Y-m-d');

							DB::insert('insert into history(email,id,type,time,keywords,location,results) values(?,?,?,?,?,?,?)',[$email,$id,$type,$time,$keywords,$location,$results]);
						}
					}
					
<<<<<<< HEAD
					return view('enterprise', compact('datas', 'keywords', 'location', 'users','enterprisea'));
=======
					return view('enterprise', compact('datas', 'keywords', 'location', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
				}
				else
				{
					// If the location is not defined
					// Get infor from database
					$users = user::all();
<<<<<<< HEAD
					$enterprisea = enterprise_account::all();
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
					
					if(!isset($para['history']))			// If the jump is from history page, the results will not be store for another time.
					{
						if(isset($_SESSION['email']))
						{
							$x = 0; //x is the number of results.
							foreach($datas as $data)
							{
								if ( stripos( $data->name, $keywords ) !== false) 
								{
									// Results + 1.
									$x = $x + 1;
								} 
								else 
								{
									continue;
								}
							}
							$y = 0;	//y is the number of existed histories of current user.
							foreach($histories as $history)
							{
								if ($history->email === $_SESSION['email']) 
								{
									// Histories + 1.
									$y = $y + 1;
								} 
								else 
								{
									continue;
								}
							}

							$email = $_SESSION['email'];
							$id = $y + 1;		// ID of this search in history table.
							$type = "enterprise";
							$results = $x;
							$time = date('Y-m-d');

							DB::insert('insert into history(email,id,type,time,keywords,results) values(?,?,?,?,?,?)',[$email,$id,$type,$time,$keywords,$results]);
						}
					}

<<<<<<< HEAD
					return view('enterprise', compact('datas', 'keywords', 'users','enterprisea'));
=======
					return view('enterprise', compact('datas', 'keywords', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
				}
			}
			else if(isset($para['location']))
			{
				// If the location is defined
				$location = $para['location'];
				// Get infor from database
				$users = user::all();
<<<<<<< HEAD
				$enterprisea = enterprise_account::all();
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
				
				if(!isset($para['history']))			// If the jump is from history page, the results will not be store for another time.
				{
					if(isset($_SESSION['email']))
					{
						$x = 0; //x is the number of results.
						foreach($datas as $data)
						{
							if (strcasecmp( $data->location, $location ) == 0) 
							{
								// Results + 1.
								$x = $x + 1;
							} 
							else 
							{
								continue;
							}
						}
						$y = 0;	//y is the number of existed histories of current user.
						foreach($histories as $history)
						{
							if ($history->email === $_SESSION['email']) 
							{
								// Histories + 1.
								$y = $y + 1;
							} 
							else 
							{
								continue;
							}
						}

						$email = $_SESSION['email'];
						$id = $y + 1;		// ID of this search in history table.
						$type = "enterprise";
						$results = $x;
						$time = date('Y-m-d');

						DB::insert('insert into history(email,id,type,time,location,results) values(?,?,?,?,?,?)',[$email,$id,$type,$time,$location,$results]);
					}
				}

<<<<<<< HEAD
				return view('enterprise', compact('datas', 'location', 'users','enterprisea'));
=======
				return view('enterprise', compact('datas', 'location', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
			}
			else
			{
				// User does not input anything.
				echo "<script>alert('The content cannot be empty!');history.go(-1);</script>";
			}
		}
		else
		{
			// User doesn't input something for searching. Dispaly all objects in database.
			// Get infor from database
			$users = user::all();
<<<<<<< HEAD
			$enterprisea = enterprise_account::all();
			return view('enterprise', compact('datas', 'users','enterprisea'));
		}
	}
	
	// Display the detail page
	public function businessDetail()
	{
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = business::all();
		
		foreach($datas as $data)
		{
			if($data->id === (int)$para["id"])
			{
				// Get infor from database
				$users = user::all();
				$enterprisea = enterprise_account::all();
				return view('businessDetail', compact('data', 'users','enterprisea'));
			}
=======
			return view('enterprise', compact('datas', 'users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
		}
	}
	
	// Display the detail page
	public function jobDetail()
	{
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = job::all();
		
		foreach($datas as $data)
		{
			if($data->id === (int)$para["id"])
			{
				// Get infor from database
				$users = user::all();
				$enterprises = enterprise::all();
<<<<<<< HEAD
				$enterprisea = enterprise_account::all();
				return view('jobDetail', compact('data', 'users', 'enterprises','enterprisea'));
=======
				return view('jobDetail', compact('data', 'users', 'enterprises'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
			}
		}
	}
	
	// Display the detail page
	public function enterpriseDetail()
	{
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = enterprise::all();
		
		foreach($datas as $data)
		{
			if($data->id === (int)$para["id"])
			{
				// Get infor from database
				$users = user::all();
				$jobs = job::all();
<<<<<<< HEAD
				$enterprisea = enterprise_account::all();
				return view('enterpriseDetail', compact('data', 'users', 'jobs','enterprisea'));
=======
				return view('enterpriseDetail', compact('data', 'users', 'jobs'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
			}
		}
	}
	
	// Display the profile page
<<<<<<< HEAD
	public function profile_user()
	{
		// Get infor from database
		$users = user::all();
		return view('profile_user', compact('users'));
	}

	public function profile_enterprise()
	{
		// Get infor from database
		$enterprisea = enterprise_account::all();
		return view('profile_enterprise', compact('enterprisea'));
=======
	public function profile()
	{
		// Get infor from database
		$users = user::all();
		return view('profile', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the message page
	public function message()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('message', compact('users','enterprisea'));
=======
		return view('message', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the history page
	public function history()
	{
		// Get infor from database
		$users = user::all();
		// Get infor from database
		$histories = history::all();
		return view('history', compact('users', 'histories'));
	}
<<<<<<< HEAD

	// Display the member page
	public function member()
	{
		// Get infor from database
		$users = user::all();
		$enterprisea = enterprise_account::all();
		return view('member', compact('users','enterprisea'));
	}
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	
	// Display the about page
	public function about()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('about', compact('users','enterprisea'));
=======
		return view('about', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the search page
	public function search()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('completeSearch', compact('users','enterprisea'));
=======
		return view('completeSearch', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the post1 page
	public function post1()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('post1', compact('users','enterprisea'));
=======
		return view('post1', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the post2 page
	public function post2()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('post2', compact('users','enterprisea'));
=======
		return view('post2', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the post3 page
	public function post3()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('post3', compact('users','enterprisea'));
=======
		return view('post3', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Display the post4 page
	public function post4()
	{
		// Get infor from database
		$users = user::all();
<<<<<<< HEAD
		$enterprisea = enterprise_account::all();
		return view('post4', compact('users','enterprisea'));
=======
		return view('post4', compact('users'));
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	
	// Logout function
	public function logout()
	{
		if(!isset($_SESSION)){
			session_start();
		}
		session_unset();
		session_destroy();
		return redirect()->action('DisplayController@homepage');
	}
}
