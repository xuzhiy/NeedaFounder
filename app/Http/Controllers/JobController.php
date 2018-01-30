<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Model\user;
use App\Model\job;
use App\Model\business;
use App\Model\enterprise;
use App\Model\history;
use App\Model\enterprise_account;

class JobController extends Controller
{



	// Display the post2 page
	public function post2()
	{
		// Get infor from request
        $para=Request::all();
		// Get infor from database
		$users = user::all();
		$enterprisea = enterprise_account::all();
		return view('post2', compact('users','enterprisea'));
	}

	public function post2business(){
		$users = user::all();
		$enterprisea = enterprise_account::all();
		return view('post2business', compact('users','enterprisea'));
	}
    //
    public function index(){
		$users = user::all();
		$jobs = job::all();
		$enterprisea = enterprise_account::all();
		return view('publishedJob', compact('users','enterprisea', 'jobs'));
    }

    public function show(){
        $users = user::all();
        $businesss = business::all();
        $enterprisea = enterprise_account::all();
        return view('publishedBusiness', compact('users','enterprisea', 'businesss'));       
    }

    public function destroy($id){
        Job::destroy($id);
        return redirect('publishedJob');
    }

    public function destroyBusiness($id){
        Business::destroy($id);
        return redirect('publishedBusiness');
    }


    public function add() {

    	if(!isset($_SESSION)){
			session_start();
		}
		$datas = job::all();
        $jobs = job::all();
        $users = user::all();
        $enterprisea = enterprise_account::all();


        $id = date('YmdHis');
        $postTime = date('Y-m-j');

        $title =Request::input('title');
        $salary = Request::input('salary');
        $type =Request::input('type');
        $location =Request::input('location');
        $vacancy =Request::input('vacancy');
        $requirements =Request::input('requirements');
        $content =Request::input('detail');
        $email =$_SESSION['email'];

        if ($title == "") {
            echo "<script>alert('The job title cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        };

        if ($salary == "") {
            echo "<script>alert('The salary cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        }elseif (!preg_match("/^\d{0,10}$/", $salary)) {
            echo "<script>alert('Salary can only be up to 10 digits. Please re-post this job.');parent.location.href='/post1';</script>";
        };

        if ($type == "") {
            echo "<script>alert('The job type cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        };

        if ($location == "") {
            echo "<script>alert('The location cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        };

        if ($vacancy == "") {
            echo "<script>alert('The vacancy cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        }else if (!preg_match("/^\d{0,5}$/", $vacancy)) {
            echo "<script>alert('Vacancy can only be up to 5 digits. Please re-post this job.');parent.location.href='/post1';</script>";
        };

        if ($requirements == "") {
            echo "<script>alert('The requirements cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        };

        if ($content == "") {
            echo "<script>alert('The job details cannot be empty! Please re-post this job.');parent.location.href='/post1';</script>";
        };
	
        
		$enterprisea = enterprise_account::all();
		return view('post3',compact('users','enterprisea','jobs'))->with('id',$id);

    }

    public function addbusiness() {
        if(!isset($_SESSION)){
            session_start();
        }
        $datas = job::all();
        $businesss = business::all();
        $users = user::all();
        $enterprisea = enterprise_account::all();


        $id = date('YmdHis');
        $postTime = date('Y-m-j');

        $title =Request::input('title');
        $location =Request::input('location');
        $industry =Request::input('industry');
        $requirements =Request::input('requirements');
        $content =Request::input('detail');
        $email =$_SESSION['email'];

        if ($title == "") {
            echo "<script>alert('The business title cannot be empty! Please re-post this business.');parent.location.href='/post1';</script>";
        };

        if ($industry == "") {
            echo "<script>alert('The business industry cannot be empty! Please re-post this business.');parent.location.href='/post1';</script>";
        };

        if ($location == "") {
            echo "<script>alert('The location cannot be empty! Please re-post this business.');parent.location.href='/post1';</script>";
        };


        if ($requirements == "") {
            echo "<script>alert('The requirements cannot be empty! Please re-post this business.');parent.location.href='/post1';</script>";
        };

        if ($content == "") {
            echo "<script>alert('The business details cannot be empty! Please re-post this business.');parent.location.href='/post1';</script>";
        };
    
        
        $enterprisea = enterprise_account::all();
        return view('post3business',compact('users','enterprisea','business'))->with('id',$id);

    }
}





