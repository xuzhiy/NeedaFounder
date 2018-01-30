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
					<form method="post" action="/post4">
					{{ csrf_field() }}
						<ul class="nav nav-pills nav-justified">
							<li class="disabled">
								<a href="#">
									<span>STEP 1: </span>
									<br>
									<span>Select Package</span>
								</a>
							</li>
							<li class="disabled">
								<a href="#">
									<span>STEP 2: </span>
									<br>
									<span>Information</span>
								</a>
							</li>
							<li class="active">
								<a>
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
							
							<div class="row">	
								<div class="col-sm-1"></div>
								<div class="col-sm-9">
									<h3> Your Package Detail:</h3>
								</div>
							</div>
			
							<div class="row">	
								<div class="col-sm-1"></div>
								<div class="col-sm-10" style="border-top:1px solid #000; border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">

									<div class="col-sm-3" style="margin-top:10px;margin-bottom:6px"><strong>Post Type:</strong></div>
									<div class="col-sm-7" style="margin-top:10px;margin-bottom:6px">Business</div>

									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>ADS size:</strong></div>
									<?php
										if($_POST['size'] === "10")
										{
									?>
										<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px">Basic</div>
									<?php
										}
										else if($_POST['size'] === "20")
										{
									?>
										<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px">Medium</div>
									<?php
										}
										else
										{
									?>
										<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px">Large</div>
									<?php
										}
									?>
									
									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>Price:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px">{{$_POST['amount']}}$</div>
									
									<div class="col-sm-11" style="margin-top:6px;margin-bottom:6px"></div>
									<div class="col-sm-1" style="margin-top:6px;margin-bottom:6px"></div>

								</div>
							</div>
							<br>
							<?php
								$jobtitle = $_POST['title'];
								$industry = $_POST['industry'];
								$location = $_POST['location'];
								$detail = $_POST['detail'];
								$requirements = $_POST['requirements'];
								$position = $_POST['position'];
								$neededPosition = $_POST['neededPosition'];
							?>


							<div class="row">	
								<div class="col-sm-1"></div>
								<div class="col-sm-10" style="border-top:1px solid #000; border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">
								
									<div class="col-sm-3" style="margin-top:10px;margin-bottom:6px"><strong>Business:</strong></div>
									<div class="col-sm-7" style="margin-top:10px;margin-bottom:6px"><?php echo $jobtitle; ?></div>
									<input type="hidden" class="form-control" id="title" name="title" placeholder="business title" value="{{$jobtitle}}">
									
									
									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>Business industry:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px"><?php echo $industry;?></div>
									<input type="hidden" class="form-control" id="industry" name="industry" placeholder="business industry" value="{{$industry}}">
									
									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>Location:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px"><?php echo $location; ?></div>
									<input type="hidden" class="form-control" id="location" name="location" placeholder="Location" value="{{$location}}" >
									
									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>Position:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px"><?php echo $position; ?></div>
									<input type="hidden" class="form-control" name="position" value="{{$position}}" >
									
									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>NeededPosition:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px"><?php echo $neededPosition; ?></div>
									<input type="hidden" class="form-control" name="neededPosition" value="{{$neededPosition}}" >

									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>Requirements:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px;word-wrap:break-word;word-break:break-all;overflow: hidden;"><?php echo $requirements;?></div>
									<textarea style="display:none;resize: none;" class="form-control" id="requirements" name="requirements" cols="5">{{$requirements}}</textarea>

									<div class="col-sm-3" style="margin-top:6px;margin-bottom:6px"><strong>Business Description:</strong></div>
									<div class="col-sm-7" style="margin-top:6px;margin-bottom:6px;word-wrap:break-word;word-break:break-all;overflow: hidden;"><?php echo $detail;?></div>
									<textarea style="display:none;resize: none;" class="form-control" id="detail" name="detail" cols="5">{{$detail}}</textarea>
									
									<div class="col-sm-11" style="margin-top:6px;margin-bottom:6px"></div>
									<div class="col-sm-1" style="margin-top:6px;margin-bottom:6px"></div>

								</div>
							</div>
							<br>
							
							<input type="hidden" class="form-control" name="amount" value="{{$_POST['amount']}}">
							<input type="hidden" class="form-control" name="postType" value="business">
							
						</div>
						
						<div class="box-footer">
							<div class="pull-left">
								<a href="post1" class="btn btn-default"><i class="fa fa-chevron-left"></i>Re-post</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Confirm<i class="fa fa-chevron-right"></i>
								</button>
							</div>
                        </div>
                    </form>
				</div> <!-- /.box -->
				
			</div>
		</div>
	</div>


</body>
</html>
