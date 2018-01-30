

function verify_publish()
{
	var title = document.getElementById("title").value;
	var industry = document.getElementById("industry").value;
	var location = document.getElementById("location").value;
	var requirements = document.getElementById("requirements").value;
	var detail = document.getElementById("detail").value;


	if (title === "") {
		document.getElementById("verify_title").innerHTML = "Business title cannot be empty!";
	}else{
		document.getElementById("verify_title").innerHTML = "";
	}


	if (industry === "") {
		document.getElementById("verify_industry").innerHTML = "Business industry cannot be empty";
	}else{
		document.getElementById("verify_industry").innerHTML = "";
	}

	if (location === "") {
		document.getElementById("verify_location").innerHTML = "Location cannot be empty";
	}else{
		document.getElementById("verify_location").innerHTML = "";
	}

	if (requirements === "") {
		document.getElementById("verify_requirements").innerHTML = "Requirements cannot be empty";
	}else{
		document.getElementById("verify_requirements").innerHTML = "";
	}

	if (detail === "") {
		document.getElementById("verify_detail").innerHTML = "Business detail cannot be empty";
	}else{
		document.getElementById("verify_detail").innerHTML = "";
	}



}