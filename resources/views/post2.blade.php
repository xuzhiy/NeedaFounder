<?php
	if(!isset($_SESSION)){
		session_start();
	}
	$exist = 0;
	$status = 0;	// '$status = 0' means the user has not logged in.
	// Check if the user has logged in. 
	if(isset($_SESSION['email']))
	{  
		foreach($users as $user)
		{
			if($user->email === $_SESSION['email'])
			{
				$exist = 1;				// '$exist = 1' means the user is existed.
				break;
			}
		} 
		foreach($enterprisea as $enterprise_account)
		{
			if($enterprise_account->email === $_SESSION['email'])
			{
				$exist = 2;				// '$exist = 2' means the enterprise is existed.
				break;
			}
		} 
	}
	if($exist === 0)
	{
		echo "<script>alert('Illegal operation.');history.go(-1);</script>";
	}
	else if($exist === 1)
	{
		$status = 1;
	}
	else if($exist === 2)
	{
		$status = 2;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>POST</title>

    <link href="css/fonts.css" rel="stylesheet" type="text/css">

   	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.min.js"></script>

	<script src="js/publish.js"></script>
   
    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

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


	<div id="all">

		<div class="container">

			<div class="col-md-12">

				<div class="box">
					<form method="post" action="/post3" class="form-horizontal" enctype="multipart/form-data" role="form">
					{{ csrf_field() }}
						<ul class="nav nav-pills nav-justified">
							<li class="disabled">
								<a href="#">
									<span>STEP 1: </span>
									<br>
									<span>Select Package</span>
								</a>
							</li>
							<li class="active">
								<a>
									<span>STEP 2: </span>
									<br>
									<span>Information</span>
								</a>
							</li>
							<li class="disabled">
								<a href="#">
									<span>STEP 3: </span>
									<br>
									<span>Confirm Package</span>
								</a>
							</li>
							<li class="disabled">
								<a href="#">
									<span>STEP 4: </span>
									<br>
									<span>Checkout</span>
								</a>
							</li>
						</ul>

						<div class="content">
							<hr>
							<br>

							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="title">Job:*</label>
									
										<div class="col-sm-9">
											<input type="text" class="form-control" id="title" name="title" placeholder="job title" onblur="verify_publish()">
											<label style="color: red" id="verify_title"></label>
										</div>
									</div>
								</div>
							</div>
							<br>
							
							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="salary">Salary:*</label>
									
										<div class="col-sm-9">
											<input type="text" class="form-control" id="salary" name="salary" placeholder="salary" onblur="verify_publish()">
											<label style="color: red" id="verify_salary"></label>
										</div>
									</div>
								</div>
							</div>
							<br>
							
							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="type">Job type:*</label>
									
										<div class="col-sm-9">
											<input type="text" class="form-control" id="type" name="type" placeholder="job type" onblur="verify_publish()">
											<label style="color: red" id="verify_type"></label>
										</div>
									</div>
								</div>
							</div>
							<br>
							
							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="location">Location:*</label>
									
										<div class="col-sm-9">
											<input type="text" class="form-control" id="location" name="location" placeholder="location" onblur="verify_publish()">
											<label style="color: red" id="verify_location"></label>
										</div>
									</div>
								</div>
							</div>
							<br>
							
							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="vacancy">Vacancy:*</label>
									
										<div class="col-sm-9">
											<input type="text" class="form-control" id="vacancy" name="vacancy" placeholder="vacancy" onblur="verify_publish()">
											<label style="color: red" id="verify_vacancy"></label>
										</div>
									</div>
								</div>
							</div>
							<br>

							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="requirements">Requirements:*</label>
									
										<div class="col-sm-9">
											<textarea style="resize: none;" class="form-control" id="requirements" name="requirements" cols="5" onblur="verify_publish()"></textarea>
											<label style="color: red" id="verify_requirements"></label> 
										</div>
									</div>
								</div>
							</div>
							<br>

							<div class="row">	
								<div class="col-sm-1"></div>
								
								<div class="col-sm-9">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="detail">Job Detail:*</label>
									
										<div class="col-sm-9">
											<textarea style="resize: none;" class="form-control" id="detail" name="detail" cols="5" onblur="verify_publish()"></textarea>
											<label style="color: red" id="verify_detail"></label>
										</div>
									</div>
								</div>
							</div>

						</div>
						
						<input type="hidden" class="form-control" name="amount" value="{{$_POST['amount']}}">
						<input type="hidden" name="size" value="{{$_POST['radio-1']}}">
						
						<div class="box-footer">
							<div class="pull-left">
								<a href="post1" class="btn btn-default"><i class="fa fa-chevron-left"></i>Re-post</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Next Step<i class="fa fa-chevron-right"></i></button>
							</div>
                        </div>
                    </form>
				</div> <!-- /.box -->
				
			</div>
		</div>
	</div>


</body>
</html>