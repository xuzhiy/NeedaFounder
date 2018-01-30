// JavaScript Document
// Verify the card information.
function verify_card()
{
	var holder = document.getElementById("holder").value;
	var number = document.getElementById("number").value;
	var expire = document.getElementById("expire").value;
	var cvv = document.getElementById("cvv").value;
	
	var name_format = /^[A-Za-z\s?]+$/;
	var number_format = /^[0-9]{16}$/;
	var cvv_format = /^[0-9]{3}$/;
	var expire_format = /^(0[1-9]|1[0-2])\/[12]\d{3}$/;
	
	// Verify holder
	if (holder === "")
	{
		document.getElementById("holder_message").innerHTML = "Cardholder cannot be empty!";
	}
	else if (!name_format.test(holder)) 
	{
		document.getElementById("holder_message").innerHTML = "Cardholder can only contain letters, numbers and underline.";
	} 
	else
	{
		document.getElementById("holder_message").innerHTML = "";
	}
	// Verify number
	if (number === "")
	{
		document.getElementById("number_message").innerHTML = "Card number cannot be empty!";
	}
	else if (!number_format.test(number)) 
	{
		document.getElementById("number_message").innerHTML = "Card number can only be 16 digits.";
	} 
	else if(!number.startsWith("4") && !number.startsWith("5"))
	{
		document.getElementById("number_message").innerHTML = "Sorry, it is not a visa card or MC card.";
	}
	else
	{
		document.getElementById("number_message").innerHTML = "";
	}
	// Verify expire
	if (expire === "")
	{
		document.getElementById("expire_message").innerHTML = "Expire cannot be empty!";
	}
	else if (!expire_format.test(expire)) 
	{
		document.getElementById("expire_message").innerHTML = "Format of expire date is wrong. (mm/YYYY)";
	}
	else
	{
		document.getElementById("expire_message").innerHTML = "";
	}
	// Verify cvv
	if (cvv === "")
	{
		document.getElementById("cvv_message").innerHTML = "CVV cannot be empty!";
	}
	else if (!cvv_format.test(cvv)) 
	{
		document.getElementById("cvv_message").innerHTML = "CVV can only be 3 digits.";
	} 
	else
	{
		document.getElementById("cvv_message").innerHTML = "";
	}
}

// Verify the cvv of old card.
function verify_cvv()
{
	var cvv = document.getElementById("card_cvv").value;
	
	var cvv_format = /^[0-9]{3}$/;
	
	// Verify cvv
	if (cvv === "")
	{
		document.getElementById("card_cvv_message").innerHTML = "CVV cannot be empty!";
	}
	else if (!cvv_format.test(cvv)) 
	{
		document.getElementById("card_cvv_message").innerHTML = "CVV can only be 3 digits.";
	} 
	else
	{
		document.getElementById("card_cvv_message").innerHTML = "";
	}
}