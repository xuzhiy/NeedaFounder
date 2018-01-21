<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $exist = 0;
    $status = 0;    // '$status = 0' means the user has not logged in.
    // Check if the user has logged in. 
    if(isset($_SESSION['email']))
    {  
        foreach($users as $user)
        {
            if($user->email === $_SESSION['email'])
            {
                $exist = 1;             // '$exist = 1' means the user is existed.
                break;
            }
        } 
        foreach($enterprisea as $enterprise_account)
        {
            if($enterprise_account->email === $_SESSION['email'])
            {
                $exist = 2;             // '$exist = 2' means the enterprise is existed.
                break;
            }
        } 
    }
    if($exist === 1)
    {
        $status = 1;
    }
    else if($exist === 2)
    {
        $status = 2;
    }
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- styles -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
	<title>Detail</title>
	<style>
		h6.price {
			color: red;
		}
		
		img.time {
			width: 10%;
		}
		
		img.location {
			width: 15%;
		}
	</style>

</head>

<body>
	<div class="navbar navbar-default yamm" role="navigation" id="navbar" style="background-color:#a1a1a1">
		<div class="container">
			<div class="navbar-header"> <a class="navbar-brand home" href="homepage" data-animate-hover="bounce"> <img src="img/logo_2.png" alt="logo" class="hidden-xs" style="height: 50px; width: auto"> </a> </div>
			<div class="navbar-collapse collapse" id="navigation">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="homepage" style="color:white">Home</a> </li>
					<li><a style="color:white"> | </a>
					</li>
					<li><a href="about" style="color:white">About us</a> </li>
				</ul>
			</div>
			<div class="navbar-buttons">
				<div class="navbar-collapse collapse right" style="color:white"> <img src="img/Users_213px_1194852_easyicon.net.png" alt="logo" class="hidden-xs" style="height: 30px; width: auto">
					<?php
						if($status === 0)
						{
							echo '<a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Login</span></a>/ <a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Register</span></a>';
						}
						else if($status === 1)
						{
							echo '<span><a href="profile_user" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1">'.$_SESSION['name'].'</a></span> / <span><a href="logout" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1">Logout</a></span>';
						}
                        else if($status === 2)
                        {
                            echo '<span><a href="profile_enterprise" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1">'.$_SESSION['name'].'</a></span> / <span><a href="logout" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1">Logout</a></span>';
                        }
				?>

				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row jumbotron">
			<div class="col-xs-4">
				<img style="max-width:100%;" src="img/jobs.png"/>
				<p style="padding: 10px 0px;">
					<img src="img/Time_Machine_768px_1137385_easyicon.net.png" class="time">
					<small>&nbsp;Publish&nbsp;Time: {{$data->postTime}}</small>
					</img>
					<p>
						<small>Industry:&nbsp;</small>
						<small><strong> {{$data->industry}}</strong></small>
					</p>
				</p>

			</div>
			<div class="col-xs-6" style="border:0px solid gray">

				<div style="width:120%;">
					<p style="padding: 0 20px;">
						<h3><strong>{{$data->name}}</strong></h3>
						<small>{{$data->background}}</small>
					</p>
				</div>

				<br>
				<p style="padding: 50px 20px;">
					<h4><i>Available Jobs</i></h4>
					<table class="table table-condensed ">
						<?php
							foreach($jobs as $job)
							{
								if($job->company === $data->name)
								{
									echo '<tr><td><a href="jobDetail?id='.$job->id.'"><h6 style="color: gray">'.$job->job.'</h6></a></td><td><h6 class="price">$'.$job->salary.'/week</h6></td></tr>';
								}
							}
						?>
					</table>

				</p>
			</div>

			<div class="col-xs-2 item-photo">
				<p></p>
				<img src="img/pin_green_25px_1129789_easyicon.net.png" class="location">
				<small>{{$data->location}}</small>
				</img>
			</div>


		</div>
	</div>



</body>

</html>