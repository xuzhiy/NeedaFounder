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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enterprise Hiring</title>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<link href="css/list.css" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
	<div class="container">
		<div class="row">
			<div class="col-sm-4 list_op"><a href="business" style="color: black"> Join a business </a>
			</div>
			<div class="col-sm-4 list_op"><a href="job" style="color: black"> Find a job </a>
			</div>
			<div class="col-sm-4 list_op_end" style="color: #FF7600;"> Enterprise Hiring </div>
		</div>
		<br/>
		<div class="row">
			<div class="text-center col-md-12">
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<div class="collapse navbar-collapse" id="inverseNavbar1">
								<form action="enterprise?search=1" method="post" class="navbar-form navbar-left" role="search">
									{{ csrf_field() }}
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter Keywords" name="keywords">
									</div>
									&nbsp;
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter City/Suburb" name="location">
									</div>
									&nbsp;
									<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-globe"></span> Search</button>
								</form>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</nav>

			</div>
		</div>
		<hr style="height:5px;border:none;border-top:5px solid green;">


		<?php
		$x = 0; //x is the number of displayed objects.
		?> 
		@foreach($datas as $data)

		<?php
		// Matching keywords and location.
		if ( isset( $keywords ) ) 
		{
			if ( isset( $location ) ) 
			{
				if ( stripos( $data->name, $keywords ) !== false && ( strcasecmp( $data->location, $location ) == 0 ) ) 
				{
					// Display this object.
					$x = $x + 1;
				} 
				else 
				{
					continue;
				}
			} 
			else 
			{
				if ( stripos( $data->name, $keywords ) !== false) 
				{
					// Display this object.
					$x = $x + 1;
				} 
				else 
				{
					continue;
				}
			}
		} 
		else if ( isset( $location ) ) 
		{
			if ( strcasecmp( $data->location, $location ) == 0 ) 
			{
				// Display this object.
				$x = $x + 1;
			} 
			else 
			{
				continue;
			}
		} 
		else 
		{
			// Display this objects.
			$x = $x + 1;
		}
		?>

		<div class="row">
			<div class="col-sm-4 picture all_center" style="height: 180px">
				<img src="img/enterprise.png" alt="Enterprise" height="150px" width="300px" style="display:block">
			</div>
			<div class="col-sm-6" style="height: 200px">
				<div class="jobtitle"><a href="enterpriseDetail?id={{$data->id}}">{{$data->name}}</a>
				</div>
				<div class="jobcontent">{{$data->background}}</div>
			</div>
			<div class="col-sm-2 all_center joblocation" style="height: 150px"><img src="img/pin_green_25px_1129789_easyicon.net.png" width="12"> {{$data->location}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4" style="height: 50px">
				<div class="publishtime"><img src="img/Time_Machine_768px_1137385_easyicon.net.png" width="20"> Post Time: <strong>{{$data->postTime}}</strong>
				</div>
				<div class="industry">Industry: <strong>{{$data->industry}}</strong>
				</div>
			</div>
			<div class="col-sm-2 col-md-offset-6 all_center" style="height: 50px">
				<div><a class="btn btn-primary view" href="enterpriseDetail?id={{$data->id}}">View</a>
				</div>
			</div>
		</div>
		<hr style="border-top: 2px solid #BBBBBB;"> 
		@endforeach
		<?php
		if ( $x === 0 ) 
		{
			echo "<div style='text-align: center;'><h1>Sorry. There's no result.</h1></div>";
		}
		?>
		<div class="pages" style="text-align: center;">
			<ul class="pagination">
				<li><a href="#">&laquo;</a>
				</li>
				<li class="active"><a href="#">1</a>
				</li>
				<li><a href="#">2</a>
				</li>
				<li><a href="#">3</a>
				</li>
				<li><a href="#">4</a>
				</li>
				<li><a href="#">5</a>
				</li>
				<li><a href="#">&raquo;</a>
				</li>
			</ul>
		</div>
	</div>
</body>

</html>