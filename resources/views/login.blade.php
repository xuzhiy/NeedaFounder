<?php
	if(!isset($_SESSION)){
		session_start();
	}
	$exist = 0;
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
                $exist = 2;             // '$exist = 1' means the user is existed.
                break;
            }
        }  
	}
	if($exist === 1)
	{
		echo "<script>alert('You have already logged in.');location.href='profile_user';</script>";
	}
    if($exist === 2)
    {
        echo "<script>alert('You have already logged in.');location.href='profile_enterprise';</script>";
    }
?>
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
    <link rel="stylesheet" href="assets/css/xenon-core.css">
    <link rel="stylesheet" href="assets/css/xenon-forms.css">
    <link rel="stylesheet" href="assets/css/xenon-components.css">
    <link rel="stylesheet" href="assets/css/xenon-skins.css">
    <link rel="stylesheet" href="assets/css/custom.css">

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

                        <ul class="nav nav-tabs nav-tabs-justified">
                            <li class="active">
                                <a href="#user_register" data-toggle="tab">
                                    <span class="visible-xs"><i class="fa-home"></i></span>
                                    <span class="hidden-xs">User</span>
                                </a>
                            </li>
                            <li>
                                <a href="#enterprise_register" data-toggle="tab">
                                    <span class="visible-xs"><i class="fa-home"></i></span>
                                    <span class="hidden-xs">Enterprise</span>
                                </a>
                            </li>
                            
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="user_register">
                                
                                 <form action="user_register_submit" method="post"> 
                                    {{ csrf_field() }}
                                   
                                    <div class="form-group">

                                        <label>User Name</label>

                                        <input type="text" class="form-control" name="name" id="user_register_name" onblur="verify_register()">
                            
                                        <label style="color: red" id="user_register_name_message"></label>
                                    </div>

                                    <div class="form-group">

                                        <label>Email</label>

                                        <input type="text" class="form-control" name="email" id="user_register_email" onblur="verify_register()">

                                        <label style="color: red" id="user_register_email_message"></label>
                                    </div>

                                    <div class="form-group">

                                        <label>Password</label>

                                        <input type="password" class="form-control" name="password" id="user_register_password" onblur="verify_register()">

                                        <label style="color: red" id="user_register_password_message"></label>
                                    </div>

                                    <div class="text-center">

                                        <button class="btn btn-primary" type="submit"><i class="fa fa-user-md"></i> User Register</button>

                                    </div> 

                                </form> 
                                
                            </div>
                            <div class="tab-pane" id="enterprise_register">
                                
                                 <form action="enterprise_register_submit" method="post"> 
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">

                                        <label>Enterprise Name</label>

                                        <input type="text" class="form-control" name="name" id="enterprise_register_name" onblur="verify_register()">
                            
                                        <label style="color: red" id="enterprise_register_name_message"></label>
                                    </div>

                                    <div class="form-group">

                                        <label>Email</label>

                                        <input type="text" class="form-control" name="email" id="enterprise_register_email" onblur="verify_register()">

                                        <label style="color: red" id="enterprise_register_email_message"></label>
                                    </div>

                                    <div class="form-group">

                                        <label>Password</label>

                                        <input type="password" class="form-control" name="password" id="enterprise_register_password" onblur="verify_register()">

                                        <label style="color: red" id="enterprise_register_password_message"></label>
                                    </div>

                                    <div class="text-center">

                                        <button class="btn btn-primary" type="submit"><i class="fa fa-user-md"></i> Enterprise Register</button>

                                    </div> 

                                </form> 
                                    
                            </div>
                        </div>


                       

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
