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
<<<<<<< HEAD
		foreach($enterprisea as $enterprise_account)
		{
			if($enterprise_account->email === $_SESSION['email'])
			{
				$exist = 2;				// '$exist = 2' means the enterprise is existed.
				break;
			}
		} 
=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	if($exist === 1)
	{
		$status = 1;
	}
<<<<<<< HEAD
	else if($exist === 2)
	{
		$status = 2;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="stylesheet" href="css/homepage.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

=======
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<link rel="stylesheet" href="css/homepage.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/homepage.js"></script>
	<title>Welcome to NeedaCofounder</title>
</head>
<<<<<<< HEAD

<body style="min-width: 1200px;">
	<div class="bg" style="background: url('img/background.jpg') no-repeat center top;background-size: 100% 700px;position: absolute;left: 0;top: 0;width: 100%;height: 700px;min-width: 1200px; z-index:-1;">
		<div class="bg_mask"></div>
	</div>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<img class="logo" src="img/logo.png" alt="NeedaCofounder">
			</div>
			<div class="col-md-5 top_bar_right pull-right">
=======
<body style="min-width: 1200px;">
	<div class="bg" style="background: url('img/background.jpg') no-repeat center top;background-size: 100% 700px;position: absolute;left: 0;top: 0;width: 100%;height: 700px;min-width: 1200px; z-index:-1;"><div class="bg_mask"></div></div>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-push-8 top_bar_right">
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
				<div class="op">
					<?php
						if($status === 0)
						{
							echo '<span><a href="login">Login</a></span> / <span><a href="login">Register</a></span>';
						}
<<<<<<< HEAD
						else if($status === 1)
						{
							echo '<span><a href="profile_user">'.$_SESSION['name'].'</a></span> / <span><a href="logout">Logout</a></span>';
						}
						else if($status === 2)
						{
							echo '<span><a href="profile_enterprise">'.$_SESSION['name'].'</a></span> / <span><a href="logout">Logout</a></span>';
						}
					?>
				</div>
				<div class="op"><a href="enterprise">Enterprise List</a>
				</div>
				<div class="op"><a href="job">Job List</a>
				</div>
				<div class="op"><a href="about">About us</a>
				</div>
			</div>
			
		</div>
	</div>

	<div class="middle_container">
		<div id="search_part">
			<br/><br/><br/>
			<h3>Find a Better Job and Partner</h3><br/>
			<h4>23000 jobs are available in Melbourne currently</h4><br/><br/><br/><br/><br/>
			<div class="col-xs-6 col-md-offset-3">
				<?php
				if ( isset( $_GET[ 'search' ] ) ) {
					if ( $_GET[ 'search' ] === "business" ) {
						?>
				<div class="row search_con">
					<div class="search_op"><a href="homepage?search=business" style="color:white;">Join a Business</a>
					</div>
					<div class="search_op"><a href="homepage?search=job">Find a Job</a>
					</div>
					<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a>
					</div>
				</div><br/>
				<form id="searchForm" action="business?search=1" method="post">
					{{ csrf_field() }}
					<div class="dropdown business" style="font-size: 18px;color: #FF7600"><b id="opttext1"> I am an...</b>
						<div id="dropdown1" class="btn-group">
							<a style="font-size:18px;" class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">   
										<span class="placeholder">Entrepreneur</span>
										<span class="caret"></span>
										</a>
						
							<input type="hidden" name="type1" id="type1" value="Entrepreneur">


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


						<div class="dropdown" style="font-size: 18px;color: #FF7600;display: inline"><b id="opttext2"> Looking for an...</b>
							<div id="dropdown2" class="btn-group">
								<a style="font-size:18px;" class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"> 
										<span class="placeholder">Entrepreneur</span>
										<span class="caret"></span>
										</a>
							
								<input type="hidden" name="type2" id="type2" value="Entrepreneur">


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
						</div>
					</div>
					<button type="submit">Search</button>
				</form>
				<?php
				} else if ( $_GET[ 'search' ] === "job" ) {
					?>
				<div class="row search_con">
					<div class="search_op"><a href="homepage?search=business">Join a Business</a>
					</div>
					<div class="search_op"><a href="homepage?search=job" style="color:white;">Find a Job</a>
					</div>
					<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a>
					</div>
				</div><br/>
				<form id="searchForm" action="job?search=1" method="post">
					{{ csrf_field() }}
					<input type="text" name="keywords">
					<button type="submit">Search</button>
				</form>
				<?php
				} else {
					?>
				<div class="row search_con">
					<div class="search_op"><a href="homepage?search=business">Join a Business</a>
					</div>
					<div class="search_op"><a href="homepage?search=job">Find a Job</a>
					</div>
					<div class="search_op"><a href="homepage?search=enterprise" style="color:white;">Enterprise Hiring</a>
					</div>
				</div><br/>
				<form id="searchForm" action="enterprise?search=1" method="post">
					{{ csrf_field() }}
					<input type="text" name="keywords">
					<button type="submit">Search</button>
				</form>
				<?php
				}
				} else {
					?>
				<div class="row search_con">
					<div class="search_op"><a href="homepage?search=business" style="color:white;">Join a Business</a>
					</div>
					<div class="search_op"><a href="homepage?search=job">Find a Job</a>
					</div>
					<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a>
					</div>
				</div><br/>
				<form id="searchForm" action="business?search=1" method="post">
					{{ csrf_field() }}
					<div class="dropdown business" style="font-size: 18px;color: #FF7600"><b id="opttext1"> I am an...</b>
						<div id="dropdown1" class="btn-group">
							<a style="font-size:18px;" class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">   
										<span class="placeholder">Entrepreneur</span>
										<span class="caret"></span>
										</a>
							<input type="hidden" name="type1" id="type1" value="Entrepreneur">



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


						<div class="dropdown" style="font-size: 18px;color: #FF7600;display: inline"><b id="opttext2"> Looking for an...</b>
							<div id="dropdown2" class="btn-group">
								<a style="font-size:18px;" class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"> 
										<span class="placeholder">Entrepreneur</span>
										<span class="caret"></span>
										</a>
								<input type="hidden" name="type2" id="type2" value="Entrepreneur">



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
						</div>
					</div>
					<button type="submit">Search</button>
				</form>
				<?php
				}
				?>
			</div>

		</div>
	</div>

	<div class="foot_container">
		<br/>
		<div class="col-md-4" align="center">
			<img src="img/partners.png" height="150px" width="150px" alt="partners">
			<div class="intro_text"><b>Find a better partners to develop your own business</b>
			</div>
		</div>
		<div class="col-md-4" align="center">
			<img src="img/jobs.png" height="150px" width="150px" alt="jobs">
			<div class="intro_text"><b>All jobs are true here with detailed information</b>
			</div>
		</div>
		<div class="col-md-4" align="center">
			<img src="img/enterprises.png" height="150px" width="150px" alt="enterprises">
			<div class="intro_text"><b>Over 3000 enterprises join in our enterprises group</b>
			</div>
		</div>
	</div>

</body>

</html>
=======
						else
						{
							echo '<span><a href="profile">'.$_SESSION['name'].'</a></span> / <span><a href="logout">Logout</a></span>';
						}
					?>
				</div>
				<div class="op"><a href="enterprise">Enterprise List</a></div>
				<div class="op"><a href="job">Job List</a></div>
				<div class="op"><a href="about">About us</a></div>
			</div>
			<div class="col-md-8 col-md-pull-4">
				<img class="logo" src="img/logo.png" alt="NeedaCofounder">
			</div>
		</div>
	</div>
	
	<div class="middle_container">
		<div id="search_part">
			<br /><br /><br />
			<h3>Find a Better Job and Partner</h3><br />
			<h4>23000 jobs are available in Melbourne currently</h4><br /><br /><br /><br /><br />
			<div class="col-xs-6 col-md-offset-3">
					<?php
						if(isset($_GET['search']))
						{
							if($_GET['search'] === "business")
							{
					?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business" style="color:white;">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="business?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
							}
							else if($_GET['search'] === "job")
							{
					?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job" style="color:white;">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="job?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
							}
							else
							{
?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise" style="color:white;">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="enterprise?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
							}
						}
						else
						{
					?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business" style="color:white;">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="business?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
						}
					?>
			</div>
				
		</div>
	</div>
	
	<div class="foot_container">
  		<br />
		<div class="col-md-4" align="center">
			<img src="img/partners.png" height="150px" width="150px" alt="partners">
			<div class="intro_text"><b>Find a better partners to develop your own business</b></div>
		</div>
		<div class="col-md-4" align="center">
			<img src="img/jobs.png" height="150px" width="150px" alt="jobs">
			<div class="intro_text"><b>All jobs are true here with detailed information</b></div>
		</div>
		<div class="col-md-4" align="center">
			<img src="img/enterprises.png" height="150px" width="150px" alt="enterprises">
			<div class="intro_text"><b>Over 3000 enterprises join in our enterprises group</b></div>
		</div>
	</div>
	
</body>
</html>
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
