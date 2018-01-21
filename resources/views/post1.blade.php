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
		echo "<script>alert('Please login first.');history.go(-1);</script>";
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
    <script type="text/javascript">

    function turn2(){
    	document.getElementById("form1").action = "/post2business";
    }
    function turn1(){
    	document.getElementById("form1").action = "/post2";
    }

    </script>

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

				<div class="box" >
					<form method="post" id="form1" action="/post2">
					{{ csrf_field() }}
						<ul class="nav nav-pills nav-justified">
							<li class="active">
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
						<!--Package view-->
						<div class="col-sm-12">
							<br>
							<h3>Choose your plan</h3>
							<div class="col-sm-3"><h5>Our package provided</h5></div>
							<div class="col-sm-9">

							</div>
						</div>
						<!--Price chart model-->
						<div class="col-sm-12">
							<hr>
							<br>
							<h3>Choose your plan</h3>
							<div class="col-sm-3"><h5>Our plan model</h5></div>
							<div class="col-sm-9">
									<!-- Basic Table -->
									<strong></strong>
									<table class="table responsive">
										<thead>
										<tr>
											<th>AD Size</th>
											<th>Basic</th>
											<th>Medium</th>
											<th>Large</th>
										</tr>
										</thead>

										<tbody>
										<tr>
											<td>Price</td>
											<td>$10</td>
											<td>$20</td>
											<td>$30</td>
										</tr>
										<br>
										<tr>
											<td>Priority of AD</td>
											<td>Forward</td>
											<td>Medium</td>
											<td>None</td>
										</tr>

										<tr>
											<td>Price</td>
											<td>$10</td>
											<td>$20</td>
											<td>$30</td>
										</tr>


										</tbody>
									</table>
								</div>
							<br>
						</div>
						<!--choose button-->
						<div class="col-sm-12">
							<div class="col-sm-3"><strong>AD size</strong></div>
							<div class="col-sm-9">
								<p>
									<label class="radio-inline">
										<input type="radio" name="radio-1" checked value="10">
										Basic: $10
									</label>
									<label class="radio-inline">
										<input type="radio" name="radio-1" value="20">
										Medium: $20
									</label>
									<label class="radio-inline">
										<input type="radio" name="radio-1" value="30">
										Large: $30
									</label>
								</p>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="col-sm-3"><strong>Priority</strong></div>
							<div class="col-sm-9">
								<p>
									<label class="radio-inline">
										<input type="radio" name="radio-2" checked value="30">
										Forward: $30
									</label>
									<label class="radio-inline">
										<input type="radio" name="radio-2" value="20">
										Medium: $20
									</label>
									<label class="radio-inline">
										<input type="radio" name="radio-2" value="10">
										None: $0
									</label>
								</p>
							</div>
						</div>
						<!--Job or Business-->
						<div class="col-sm-12">
							<div class="col-sm-3"><strong>Type</strong></div>
							<div class="col-sm-9">
								<p>
									<label class="radio-inline">
										<input type="radio" name="radio-3" checked onclick="turn1()">
										publish a Job
									</label>
									<label class="radio-inline">
										<input type="radio" name="radio-3" onclick="turn2()">
										join a Business
									</label>
								</p>
							</div>
						</div>
						<!--Total-->
						<div class="col-sm-12">
							<div class="col-sm-3"><strong>Total Price:</strong></div>
							<div class="col-sm-9">
								$30
							</div>
						</div>

						<div class="box-footer">
							<div class="pull-right">
								<button type="submit" class="btn btn-primary" >Next Step<i class="fa fa-chevron-right"></i>
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