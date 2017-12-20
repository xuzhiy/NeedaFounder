<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use App\Model\user;
use App\Model\job;
use App\Model\business;

class DisplayController extends Controller
{
    // Display the homepage page
	public function homepage()
	{
		return view('homepage');
	}
	
	// Display the login page
	public function login()
	{
		return view('login');
	}
	
	// Display the job page
	public function job()
	{
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = job::all();
		if(isset($para['search']))
		{
			if(isset($para['keywords']))
			{
				$keywords = $para['keywords'];
				if(isset($para['location']))
				{
					// If the location is defined
					$location = $para['location'];
					return view('job', compact('datas', 'keywords', 'location'));
				}
				else
				{
					// If the location is not defined
					return view('job', compact('datas', 'keywords'));
				}
			}
			else if(isset($para['location']))
			{
				// If the location is defined
				$location = $para['location'];
				return view('job', compact('datas', 'location'));
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
			return view('job', compact('datas'));
		}
	}
	
	// Display the business page
	public function business()
	{
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$datas = business::all();
		
		if(isset($para['search']))
		{
			// User inputs something for searching.
			return view('business');
		}
		else
		{
			// User doesn't input something for searching. Dispaly all objects in database.
			return view('business', compact('datas'));
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
				return view('jobDetail', compact('data'));
			}
		}
	}
	
	// Display the profile page
	public function profile()
	{
		return view('profile');
	}
	
	// Display the about page
	public function about()
	{
		return view('about');
	}
}
