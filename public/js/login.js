// Verify the login information.
function verify_login()
{
	var email = document.getElementById("login_email").value;
	var password = document.getElementById("login_password").value;
	
	var email_format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/;
	// Verify input email
	if (email === "")
	{
		document.getElementById("login_email_message").innerHTML = "E-mail cannot be empty!";
	}
	else if (!email_format.test(email)) 
	{
		document.getElementById("login_email_message").innerHTML = "The format of E-mail is invalid.";
	} 
	else
	{
		document.getElementById("login_email_message").innerHTML = "";
	}
	
	// Verify input password
	if (password === "")
	{
		document.getElementById("login_password_message").innerHTML = "Password cannot be empty!";
	}
	else
	{
		document.getElementById("login_password_message").innerHTML = "";
	}
}

// Verify the register information.
function verify_register()
{
<<<<<<< HEAD
	var name = document.getElementById("user_register_name").value;
	var email = document.getElementById("user_register_email").value;
	var password = document.getElementById("user_register_password").value;
=======
	var name = document.getElementById("register_name").value;
	var email = document.getElementById("register_email").value;
	var password = document.getElementById("register_password").value;
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	
	var email_format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/;
	var name_format = /^\w+$/;
	var password_format = /^(\w{5,20})+$/;
	// Verify input name
	if (name === "")
	{
<<<<<<< HEAD
		document.getElementById("user_register_name_message").innerHTML = "Name cannot be empty!";
	}
	else if (!name_format.test(name)) 
	{
		document.getElementById("user_register_name_message").innerHTML = "Name can only contain letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("user_register_name_message").innerHTML = "";
=======
		document.getElementById("register_name_message").innerHTML = "Name cannot be empty!";
	}
	else if (!name_format.test(name)) 
	{
		document.getElementById("register_name_message").innerHTML = "Name can only contain letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("register_name_message").innerHTML = "";
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	// Verify input email
	if (email === "")
	{
<<<<<<< HEAD
		document.getElementById("user_register_email_message").innerHTML = "E-mail cannot be empty!";
	}
	else if (!email_format.test(email)) 
	{
		document.getElementById("user_register_email_message").innerHTML = "The format of E-mail is invalid.";
	} 
	else
	{
		document.getElementById("user_register_email_message").innerHTML = "";
=======
		document.getElementById("register_email_message").innerHTML = "E-mail cannot be empty!";
	}
	else if (!email_format.test(email)) 
	{
		document.getElementById("register_email_message").innerHTML = "The format of E-mail is invalid.";
	} 
	else
	{
		document.getElementById("register_email_message").innerHTML = "";
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
	// Verify input password
	if (password === "")
	{
<<<<<<< HEAD
		document.getElementById("user_register_password_message").innerHTML = "Password cannot be empty!";
	}
	else if (!password_format.test(password)) 
	{
		document.getElementById("user_register_password_message").innerHTML = "Password can only contain 5-20 letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("user_register_password_message").innerHTML = "";
	}

	var name = document.getElementById("enterprise_register_name").value;
	var email = document.getElementById("enterprise_register_email").value;
	var password = document.getElementById("enterprise_register_password").value;
	
	var email_format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/;
	var name_format = /^\w+$/;
	var password_format = /^(\w{5,20})+$/;
	// Verify input name
	if (name === "")
	{
		document.getElementById("enterprise_register_name_message").innerHTML = "Name cannot be empty!";
	}
	else if (!name_format.test(name)) 
	{
		document.getElementById("enterprise_register_name_message").innerHTML = "Name can only contain letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("enterprise_register_name_message").innerHTML = "";
	}
	// Verify input email
	if (email === "")
	{
		document.getElementById("enterprise_register_email_message").innerHTML = "E-mail cannot be empty!";
	}
	else if (!email_format.test(email)) 
	{
		document.getElementById("enterprise_register_email_message").innerHTML = "The format of E-mail is invalid.";
	} 
	else
	{
		document.getElementById("enterprise_register_email_message").innerHTML = "";
	}
	// Verify input password
	if (password === "")
	{
		document.getElementById("enterprise_register_password_message").innerHTML = "Password cannot be empty!";
	}
	else if (!password_format.test(password)) 
	{
		document.getElementById("enterprise_register_password_message").innerHTML = "Password can only contain 5-20 letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("enterprise_register_password_message").innerHTML = "";
=======
		document.getElementById("register_password_message").innerHTML = "Password cannot be empty!";
	}
	else if (!password_format.test(password)) 
	{
		document.getElementById("register_password_message").innerHTML = "Password can only contain 5-20 letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("register_password_message").innerHTML = "";
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
	}
}