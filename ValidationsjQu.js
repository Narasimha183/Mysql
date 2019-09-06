function validate() {
	alert("sgsdfsdg");
	if(validateIdata())
	{
		//alert("sgsdfsdg");
		return;
	}
}
function validateIdata() {
	var  regex = /^[A-Za-z]+$/;
	var fname = $("#firstname").val();
	if(!fname.match(regex)) {
		alert("please enter first name details");
		return false;
		}
	var regex2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
	var email = $("#emailid").val();
	if(!email.match(regex2)) {
		alert("please enter valid email details");
		return false;
		}
	var regex3 = /^\d{10}$/;
	var Pnmber = $("#phonenumber").val();
	if(!Pnmber.match(regex3)) {
		alert("please enter valid phone number");
		return false;
		}
	$("#dateofjoining").datepicker({
		changeYear:true,
		changeMonth: true,
		maxDate: new Date(2019,8,03),
		dateFormat: 'yy-mm-dd'
		});	
	return true;
}