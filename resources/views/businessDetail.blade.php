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
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/bootstrap.min.css">
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
		<div class="col-xs-4 item-photo"> <img style="max-width:100%;" src="img/partners.png" /> </div>
		<div class="col-xs-6" style="border:0px solid gray">
			<h2><b>{{$data->title}}</b></h2>
			<h5><b>{{$data->position}} </b> <span style="color: #4fbfa8;">seeking</span> <b>{{$data->neededPosition}}</b></h5>
			<br>
			<table class="table">
				<tr>
					<td><h6 class="title-price" style="color: gray">Location: {{$data->location}} </h6></td>
					<td><h6 class="title-price" style="color: gray">Post Time:  {{$data->postTime}}</h6></td>
				</tr>
				<tr>
					<td><h6 class="title-price" style="color: gray">Industry: {{$data->industry}}</h6></td>
					<td><h6 class="title-price" style="color: gray"></h6></td>
				</tr>
				<tr></tr>
			</table>
			<div style="width:100%;">
				<h4>Background: </h4>
				<small style="color: #808080;">{{$data->background}}</small>
				<h4 style="margin-top: 30px;">Requirements:</h4>
				<small style="color: #808080;">{{$data->requirements}}</small>
				</p>
				<a href="mailto:{{$data->contact}}" class="btn btn-success" style="margin-top: 20px;">Apply Now</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
