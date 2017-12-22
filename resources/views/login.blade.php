<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Login/Register</title>

    <link href="css/fonts.css" rel="stylesheet" type="text/css">

   	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.min.js"></script>
  	<script src="js/login.js"></script>
  	<script src="js/sha1.js"></script>
   
    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

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

<div id="all">

        <div id="content">

            <div class="container">

                <div class="col-md-6">

                    <div class="box">

                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>

                        <p>Our website provide a advanced platform for you to find your willing job.<br>Also you can find your business partner here by typing several key words.</p>

                        <p class="text-muted">If you have any questions, please feel free to <a href="about">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                      <form action="register_submit" method="post"> 
							{{ csrf_field() }}
                            <div class="form-group">

                                <label>Name</label>

                                <input type="text" class="form-control" name="name" id="register_name" onblur="verify_register()">
					
                           		<label style="color: red" id="register_name_message"></label>
                            </div>

                            <div class="form-group">

                                <label>Email</label>

                                <input type="text" class="form-control" name="email" id="register_email" onblur="verify_register()">

                           		<label style="color: red" id="register_email_message"></label>
                            </div>

                            <div class="form-group">

                                <label>Password</label>

                                <input type="password" class="form-control" name="password" id="register_password" onblur="verify_register()">

                           		<label style="color: red" id="register_password_message"></label>
                            </div>

                            <div class="text-center">

                                <button class="btn btn-primary" type="submit"><i class="fa fa-user-md"></i> Register</button>

                            </div> 

                        </form> 

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="box">

                        <h1>Login</h1>



                        <p class="lead">Already our customer?</p>

                        <p>Please login.</p>

                        <hr>

                         <form action="login_submit" method="post">  
							{{ csrf_field() }}
                            <div class="form-group">

                                <label>Email</label>

                                <input type="text" class="form-control" name="email" id="login_email" onblur="verify_login()">

                           		<label style="color: red" id="login_email_message"></label>
                            </div>

                            <div class="form-group">

                                <label>Password</label>

                                <input type="password" class="form-control" name="password" id="login_password" onblur="verify_login()">
					
                           		<label style="color: red" id="login_password_message"></label>
                            </div>

                            <div class="text-center">

                                <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> Log in</button>

                            </div>

                        </form> 

                    </div>

                </div>

            </div>

        </div>

    </div>



</body>
</html>
