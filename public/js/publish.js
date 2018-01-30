

function verify_publish()
{
	var title = document.getElementById("title").value;
	var salary = document.getElementById("salary").value;
	var type = document.getElementById("type").value;
	var location = document.getElementById("location").value;
	var vacancy = document.getElementById("vacancy").value;
	var requirements = document.getElementById("requirements").value;
	var detail = document.getElementById("detail").value;

	
	var salary_format = /^\d{0,10}$/;
	var vacancy_format = /^\d{0,5}$/;

	if (title === "") {
		document.getElementById("verify_title").innerHTML = "Job title cannot be empty!";
	}else{
		document.getElementById("verify_title").innerHTML = "";
	}

	if (salary === "") {
		document.getElementById("verify_salary").innerHTML = "Salary cannot be empty";
	}else if (!salary_format.test(salary)) {
		document.getElementById("verify_salary").innerHTML = "Salary can only be up to 10 digits.";
	}else{
		document.getElementById("verify_salary").innerHTML = "";
	}

	if (type === "") {
		document.getElementById("verify_type").innerHTML = "Job Type cannot be empty";
	}else{
		document.getElementById("verify_type").innerHTML = "";
	}

	if (location === "") {
		document.getElementById("verify_location").innerHTML = "Location cannot be empty";
	}else{
		document.getElementById("verify_location").innerHTML = "";
	}

	if (vacancy === "") {
		document.getElementById("verify_vacancy").innerHTML = "Vacancy cannot be empty";
	}else if (!vacancy_format.test(vacancy)) {
		document.getElementById("verify_vacancy").innerHTML = "Vacancy can only be up to 5 digits.";
	}else{
		document.getElementById("verify_vacancy").innerHTML = "";
	}

	if (requirements === "") {
		document.getElementById("verify_requirements").innerHTML = "Requirements cannot be empty";
	}else{
		document.getElementById("verify_requirements").innerHTML = "";
	}

	if (detail === "") {
		document.getElementById("verify_detail").innerHTML = "Job detail cannot be empty";
	}else{
		document.getElementById("verify_detail").innerHTML = "";
	}



}