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
					<form method="post" action="post1">
					{{ csrf_field() }}
						<ul class="nav nav-pills nav-justified">
							<li>
								<a href="post1">
									<span>STEP 1: </span>
									<br>
									<span>Select Package</span>
								</a>
							</li>
							<li>
								<a href="post2">
									<span>STEP 2: </span>
									<br>
									<span>Job Information</span>
								</a>
							</li>
							<li>
								<a href="post3">
									<span>STEP 3: </span>
									<br>
									<span>Confirm Package</span>
								</a>
							</li>
							<li class="active">
								<a>
									<span>STEP 4: </span>
									<br>
									<span>Checkout</span>
								</a>
							</li>
						</ul>

						<div class="content">
							<hr>
							
							<div class="row" style="margin-top:10px">	
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
									<div class="col-sm-10"><strong> Balance: $500,00.00</strong></div>
									<br>
									<hr>
								</div>
							</div>
							

							<div class="row">	
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
									<div class="col-sm-10"><strong> Choose a method start to pay!</strong></div>
									<ul class="nav nav-tabs right-aligned" style="right-aligned">
										<li>
											<a href="#paypal" data-toggle="tab">
												<span class="hidden-xs">Paypal</span>
											</a>
										</li>
										<li class="active">
											<a href="#card" data-toggle="tab">
												<span class="hidden-xs">Card</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-1"></div>
								
								<div class="col-sm-10">
									<div class="tab-content">
										<div class="tab-pane" id="paypal">
											Paypal
										</div>
										
										<div class="tab-pane active" id="card">
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-2">
													<div class="radio">
														<label>
															<input type="radio" name="card">
															Visa
														</label>
													</div>
												</div>
												
												<div class="col-sm-1" style="margin-top:10px">|</div>
												
												<div class="col-sm-3"style="margin-top:10px">Card no.**********0978</div>
												
												<div class="col-sm-4"style="margin-top:10px">
													<label>CVV</label>
													<input type="text" maxlength="3" placeholder="cvv" style="margin-left:10px;width:50px">
												</div>
												
												
											</div>
											
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-2">
													<div class="radio">
														<label>
															<input type="radio" name="card">
															MasterCard
														</label>
													</div>

												</div>
												
												<div class="col-sm-1"style="margin-top:10px">|</div>
												
												<div class="col-sm-3"style="margin-top:10px">Card no.**********0102</div>
												
												<div class="col-sm-4"style="margin-top:10px">
													<label>CVV</label>
													<input type="text" maxlength="3" placeholder="cvv" style="margin-left:10px;width:50px">
												</div>
											</div>
											
										</div>

									</div>
									
									<hr>	
								
								</div>
							</div>

							<div class="row">
								<div class="col-sm-1"></div>
								<div class="col-sm-10" style="border-top:1px solid #000; border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">
								
									<div class="col-sm-4"></div>
									<div class="col-sm-8">
										<h3>Add new payment method</h3>
										<div class="row">
											<select style="margin-top:10px;margin-bottom:6px;width:320px">
												<option>Choose payment method</option>
												<option>Paypal</option>
												<option>Card</option>
											</select>
										</div>

										<div class="row">										
											<input type="text" placeholder="Payment amount" style="margin-top:10px;margin-bottom:6px;width:320px">
										</div>

										<div class="row">	
											<input type="text" placeholder="Cardholder's Name" style="margin-top:10px;margin-bottom:6px;width:320px">
										</div>

										<div class="row">	
											<input type="text" placeholder="Card Number" style="margin-top:10px;margin-bottom:6px;width:320px">
										</div>

										<div class="row">
											<input type="text" placeholder="08/01/2018" style="margin-top:10px;margin-bottom:6px;width:200px">
											<input type="text" maxlength="3" placeholder="cvv" style="margin-top:10px;margin-bottom:6px;margin-left:40px;width:80px">
										</div>
										
										<div class="row">
											<div class="checkbox" style="margin-top:10px;margin-bottom:20px;margin-left:80px">
												<label style="color:blue">
													<input type="checkbox">
													Save to payment book
												</label>
											</div>
										</div>
										
									</div>
	
								</div>		
										
							</div>	
							

						<div class="box-footer">
							<div class="pull-left">
								<a href="post3" class="btn btn-default"><i class="fa fa-chevron-left"></i>Last Step</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Confirm to pay</button>
							</div>
                        </div>
                    </form>
				</div> <!-- /.box -->
				
			</div>
		</div>
	</div>


</body>
</html>