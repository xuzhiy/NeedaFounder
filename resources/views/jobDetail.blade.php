<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="detail.js"></script>
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
<div class="navbar navbar-default yamm" role="navigation" id="navbar" style="background-color:#a1a1a1" >
	<div class="container">
		<div class="navbar-header" > <a class="navbar-brand home" href="homepage" data-animate-hover="bounce"> <img src="img/logo_2.png" alt="logo" class="hidden-xs" style="height: 50px; width: auto"> </a> </div>
		<div class="navbar-collapse collapse" id="navigation">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="homepage" style="color:white">Home</a> </li>
				<li><a style="color:white"> | </a></li>
				<li><a href="about" style="color:white">About us</a> </li>
			</ul>
		</div>
		<div class="navbar-buttons">
			<div class="navbar-collapse collapse right" style="color:white"> <img src="img/Users_213px_1194852_easyicon.net.png" alt="logo" class="hidden-xs" style="height: 30px; width: auto"> <a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Login</span></a>/ <a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Register</span></a> </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row jumbotron">
		<div class="col-xs-4 item-photo"> <img style="max-width:100%;" src="img/jobs.png" /> </div>
		<div class="col-xs-6" style="border:0px solid gray">
			<h2><b>{{$data->job}}</b></h2>
			<br>
			<table class="table">
				<tr>
					<td><h6 class="title-price" style="color: gray">Salary: {{$data->salary}} per week</h6></td>
					<td><h6 class="title-price" style="color: gray">Location: {{$data->location}}</h6></td>
				</tr>
				<tr>
					<td><h6 class="title-price" style="color: gray">Type: {{$data->type}}</h6></td>
					<td><h6 class="title-price" style="color: gray">People needed: {{$data->vacancy}} people</h6></td>
				</tr>
				<tr></tr>
			</table>
			<div style="width:100%;">
				<p style="padding:15px;">
				<h4 ><i>Description of job and company:</i></h4>
				<h4>Company Background: </h4>
				<small>{{$data->background}}</small>
				<h4>Requirements of job:</h4>
				<small>{{$data->requirements}}</small>
				</p>
				<a href="mailto:{{$data->contact}}" class="btn btn-success">Apply Now</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
