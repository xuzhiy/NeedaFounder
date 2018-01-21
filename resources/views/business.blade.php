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
	<title>Join a Business</title>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/list.js"></script>
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
			<div class="col-sm-4 list_op" style="color: #FF7600;"> Join a business </div>
			<div class="col-sm-4 list_op"><a href="job" style="color: black"> Find a job </a>
			</div>
			<div class="col-sm-4 list_op_end"><a href="enterprise" style="color: black"> Enterprise Hiring </a>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="text-center col-md-12">
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<div class="collapse navbar-collapse" id="inverseNavbar1">
								<form action="business?search=1" method="post"  class="navbar-form navbar-left" role="search">
									{{ csrf_field() }}
									<div class="dropdown form-group" style="color: white"><b id="opttext1"> I am an...</b>
										<div id="dropdown1" class="btn-group">
											<?php 
												if ( isset( $position ) ) 
												{
											?>
											<a style="font-size:14px;" class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">    
									<span class="placeholder">{{$neededPosition}}</span>
									<span class="caret"></span>
								  </a>
										
									<input type="hidden" name="type1" id="type1" value="{{$neededPosition}}">
											<?php 
												}
												else
												{
											?>
											<a style="font-size:14px;" class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">    
									<span class="placeholder">Entrepreneur</span>
									<span class="caret"></span>
								  </a>
										
									<input type="hidden" name="type1" id="type1" value="Entrepreneur">
											<?php
												}
											?>



											<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
												<li role="presentation" value="1" onclick="getoptname('Entrepreneur')"><a role="menuitem" tabindex="1" href="javascript:void(0);">Entrepreneur</a>
												</li>
												<li role="presentation" value="2" onclick="getoptname('Business Partner')"><a role="menuitem" tabindex="2" href="javascript:void(0);">Business Partner</a>
												</li>
												<li role="presentation" value="3" onclick="getoptname('Co Founder')"><a role="menuitem" tabindex="3" href="javascript:void(0);">Co Founder</a>
												</li>
												<li role="presentation" value="4" onclick="getoptname('Collaborator')"><a role="menuitem" tabindex="4" href="javascript:void(0);">Collaborator</a>
												</li>
												<li role="presentation" value="5" onclick="getoptname('Investor')"><a role="menuitem" tabindex="5" href="javascript:void(0);">Investor</a>
												</li>
												<li role="presentation" value="6" onclick="getoptname('Advisor')"><a role="menuitem" tabindex="6" href="javascript:void(0);">Advisor</a>
												</li>
											</ul>
										</div>
									</div>


									<div class="dropdown form-group" style="color: white"><b id="opttext2"> Looking for an...</b>
										<div id="dropdown2" class="btn-group">
										<?php 
												if ( isset( $position ) ) 
												{
										?>
											<a style="font-size:14px;" class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown">  
									<span class="placeholder">{{$position}}</span>
									<span class="caret"></span>
								  </a>
										<input type="hidden" name="type2" id="type2" value="{{$position}}">
										<?php 
												}
												else
												{
											?>
											<a style="font-size:14px;" class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown">  
									<span class="placeholder">Entrepreneur</span>
									<span class="caret"></span>
								  </a>
										<input type="hidden" name="type2" id="type2" value="Entrepreneur">
											<?php
												}
											?>
											<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
												<li role="presentation" value="1" onclick="getoptname2('Entrepreneur')"><a role="menuitem" tabindex="1" href="javascript:void(0);">Entrepreneur</a>
												</li>
												<li role="presentation" value="2" onclick="getoptname2('Business Partner')"><a role="menuitem" tabindex="2" href="javascript:void(0);">Business Partner</a>
												</li>
												<li role="presentation" value="3" onclick="getoptname2('Co Founder')"><a role="menuitem" tabindex="3" href="javascript:void(0);">Co Founder</a>
												</li>
												<li role="presentation" value="4" onclick="getoptname2('Collaborator')"><a role="menuitem" tabindex="4" href="javascript:void(0);">Collaborator</a>
												</li>
												<li role="presentation" value="5" onclick="getoptname2('Investor')"><a role="menuitem" tabindex="5" href="javascript:void(0);">Investor</a>
												</li>
												<li role="presentation" value="6" onclick="getoptname2('Advisor')"><a role="menuitem" tabindex="6" href="javascript:void(0);">Advisor</a>
												</li>
											</ul>
										</div>
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-globe"></span> Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<hr style="height:5px;border:none;border-top:5px solid green;">

		<?php
		$x = 0; //x is the number of displayed objects.
		?> @foreach($datas as $data)
		
		<?php
		// Matching position and neededPosition.
		if ( isset( $position ) ) 
		{
			if ( ( strcasecmp( $data->position, $position ) == 0 ) && ( strcasecmp( $data->neededPosition, $neededPosition ) == 0 ) ) 
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
			<div class="col-sm-4 picture" style="height: 150px"><img src="img/business.png" alt="Business" height="150px" width="300px" style="display:block">
			</div>
			<div class="col-sm-8" style="height: 200px">
				<div class="jobtitle"><a href="businessDetail?id={{$data->id}}">{{$data->title}}</a></div>
				<div class="joblocation" style="margin-top: 5px"><img src="img/pin_green_25px_1129789_easyicon.net.png" width="12">&nbsp;&nbsp;&nbsp;{{$data->location}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/Time_Machine_768px_1137385_easyicon.net.png" width="18">&nbsp;&nbsp;Publish Time: {{$data->postTime}}</div>
				<div class="business_industry" style="margin-top: 3px">Industry: <span style="color: #000000;">{{$data->industry}}</span>
				</div>
				<div class="jobcontent" style="margin-top: 10px">{{$data->content}}</div>
			</div>
		</div>
		<hr style="border-top: 2px solid #BBBBBB;"> @endforeach
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