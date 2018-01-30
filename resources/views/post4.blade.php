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
   
   	<script src="js/card.js"></script>
   
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
					<form method="post" action="finalPost">
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
							<li class="disabled">
								<a href="#">
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
									<div class="col-sm-10"><strong> Balance: ${{$_POST['amount']}}</strong></div>
									<br>
									<hr>
								</div>
							</div>
							

							<div class="row">	
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
									<div class="col-sm-10"><strong> Choose a card to pay!</strong></div>
									<ul class="nav nav-tabs right-aligned" style="right-aligned">
<!--
										<li>
											<a href="#paypal" data-toggle="tab">
												<span class="hidden-xs">Paypal</span>
											</a>
										</li>
-->
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
											<?php
												$num = 0;
											?>
											@foreach($cards as $card)
											<?php
											if ( $card->owner !== $_SESSION['email'] ) 
											{
												continue;
											}
											else
											{
												$num = $num + 1;
											}
											?>
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-2">
													<div class="radio">
														<label>
															<input type="radio" class="card" name="card" value="{{$card->id}}">
															{{$card->type}}
														</label>
													</div>
												</div>
												
												<div class="col-sm-1" style="margin-top:10px">|</div>
												
												<div class="col-sm-3"style="margin-top:10px">Card no.
												<?php 
													$decodeNum = base64_decode($card->number);
													$display = substr($decodeNum,-4);
													echo "************".$display;
												?>
												</div>
												
												
											</div>
											@endforeach
											<?php
												if($num === 0)
												{
											?>
												
												<div class="row">
													<div class="col-sm-10">You haven't store any card information.</div>
												</div>
											<?php
												}
											?>
											
											<div class="row" id="old_card" style="display: none">
												<div class="col-sm-1"></div>
												<div class="col-sm-2"></div>
												<div class="col-sm-1" style="margin-top:10px"></div>
												
												<div class="col-sm-3"style="margin-top:10px"></div>
												
												<div class="col-sm-4"style="margin-top:10px">
													<label>CVV</label>
													<input type="text" id="card_cvv" name="card_cvv" maxlength="3" placeholder="cvv" style="margin-left:10px;width:50px" onblur="verify_cvv()">
													<label style="color: red" id="card_cvv_message"></label>
												</div>
												
												
											</div>
											
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-2">
													<div class="radio">
														<label>
															<input type="radio" class="card" name="card" value="new">
															Add a new card:
														</label>
													</div>
												</div>
											</div>
											
											<script type="text/javascript">
												$( function () {
													$( ".card" ).click( function () {
														if ( $( this ).val() === "new" ) {
															document.getElementById('new_card').style.display = 'inline';
															document.getElementById('old_card').style.display = 'none';
														}
														else
														{
															document.getElementById('old_card').style.display = 'inline';
															document.getElementById('new_card').style.display = 'none';
														}
													} );
												} );
											</script>
											
											
											
										</div>

									</div>
									
									<hr>	
								
								</div>
							</div>

							<div class="row" id="new_card" style="display: none">
								<div class="col-sm-1"></div>
								<div class="col-sm-10" style="border-top:1px solid #000; border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">
								
									<div class="col-sm-4"></div>
									<div class="col-sm-8">
										<h3>Add a new Card</h3>
										<div class="row">
											<select style="margin-top:10px;margin-bottom:6px;width:320px">
												<option>Card</option>
											</select>
										</div>

										<div class="row">
											<input type="text" id="holder" name="holder" placeholder="Cardholder's Name" style="margin-top:10px;margin-bottom:6px;width:320px" onblur="verify_card()">
											<label style="color: red" id="holder_message"></label>
										</div>

										<div class="row">
											<input type="text" id="number" name="number" maxlength="16" placeholder="Card Number" style="margin-top:10px;margin-bottom:6px;width:320px" onblur="verify_card()">
											<label style="color: red" id="number_message"></label>
										</div>

										<div class="row">
											<input type="text" id="expire" name="expire" placeholder="01/2018" style="margin-top:10px;margin-bottom:6px;width:200px" onblur="verify_card()">
											<label style="color: red" id="expire_message"></label>
										</div>
										
										<div class="row">
											<input type="text" id="cvv" name="cvv" maxlength="3" placeholder="cvv" style="margin-top:10px;margin-bottom:6px;width:200px" onblur="verify_card()">
											<label style="color: red" id="cvv_message"></label>
										</div>
										<div class="row">
											VISA and Mastercard only.
											<div class="radio">
												<img src="img/Visa.png" alt="Visa" height="75px" width="150px" style="display:block">
											</div>
											<div class="radio">
												<img src="img/MC.png" alt="MC" height="75px" width="150px" style="display:block">
											</div>
										</div>

										
									</div>
	
								</div>		
										
							</div>	
							<?php
								if($_POST['postType'] === "job")
								{
							?>
								<input type="hidden" class="form-control" id="title" name="title" placeholder="job title" value="{{$_POST['title']}}">
								<input type="hidden" class="form-control" id="salary" name="salary" placeholder="salary" value="{{$_POST['salary']}}">
								<input type="hidden" class="form-control" id="type" name="type" placeholder="job type" value="{{$_POST['type']}}">
								<input type="hidden" class="form-control" id="location" name="location" placeholder="location" value="{{$_POST['location']}}">
								<input type="hidden" class="form-control" id="vacancy" name="vacancy" placeholder="vacancy" value="{{$_POST['vacancy']}}">
								<textarea style="display:none;resize: none;" class="form-control" id="requirements" name="requirements" cols="5">{{$_POST['requirements']}}</textarea>
								<textarea style="display:none;resize: none;" class="form-control" id="detail" name="detail" cols="5">{{$_POST['detail']}}</textarea>
								<input type="hidden" class="form-control" name="amount" value="{{$_POST['amount']}}">
								<input type="hidden" class="form-control" name="postType" value="job">
							<?php	
								}
								else
								{
							?>
								<input type="hidden" class="form-control" id="title" name="title" placeholder="business title" value="{{$_POST['title']}}">
								<input type="hidden" class="form-control" id="industry" name="industry" placeholder="business industry" value="{{$_POST['industry']}}">
								<input type="hidden" class="form-control" id="location" name="location" placeholder="Location" value="{{$_POST['location']}}" >
								<input type="hidden" class="form-control" name="position" value="{{$_POST['position']}}" >
								<input type="hidden" class="form-control" name="neededPosition" value="{{$_POST['neededPosition']}}" >
								<textarea style="display:none;resize: none;" class="form-control" id="requirements" name="requirements" cols="5">{{$_POST['requirements']}}</textarea>
								<textarea style="display:none;resize: none;" class="form-control" id="detail" name="detail" cols="5">{{$_POST['detail']}}</textarea>
								<input type="hidden" class="form-control" name="amount" value="{{$_POST['amount']}}">
								<input type="hidden" class="form-control" name="postType" value="business">
							<?php	
								}
							?>

						<div class="box-footer">
							<div class="pull-left">
								<a href="post1" class="btn btn-default"><i class="fa fa-chevron-left"></i>Re-post</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Submit the Post</button>
							</div>
                        </div>
                    </form>
				</div> <!-- /.box -->
				
			</div>
		</div>
	</div>


</body>
</html>