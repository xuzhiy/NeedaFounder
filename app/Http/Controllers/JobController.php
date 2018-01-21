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
		return view('publish', compact('users','enterprisea', 'jobs'));
    }

    public function destroy($id){
        Job::destroy($id);
        return redirect('publish');
    }


    public function add() {

    	if(!isset($_SESSION)){
			session_start();
		}
		$datas = job::all();
        $para=Request::all();
        $jobs = job::all();
        $users = user::all();


        $id = date('YmdHis');
        $postTime = date('Y-m-j');
        $title =Request::input('title');
        $salary = (int)Request::input('salary');
        $type =Request::input('type');
        $location =Request::input('location');
        $vacancy =Request::input('vacancy');
        $requirements =Request::input('requirements');
        $content =Request::input('detail');
        $email =$_SESSION['email'];
	
        DB::insert('insert into job(email,id,type,job,vacancy,requirements,content,salary,location,postTime) values(?,?,?,?,?,?,?,?,?,?)', array($email,$id,$type,$title,$vacancy,$requirements,$content,$salary,$location,$postTime));
		$enterprisea = enterprise_account::all();
		return view('post3',compact('users','enterprisea','jobs'))->with('id',$id);

    }
}





