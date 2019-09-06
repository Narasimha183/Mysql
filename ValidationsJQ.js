	$(document).ready(function(){
			$("#firstname").focusout(function() {
				check_fname();
			});
			$("#emailid").focusout(function(){
				check_email();
			});
			$("#phonenumber").focusout(function(){
				check_pnumber();
			});
			$("#repword").focusout(function () {
				check_password();
			});
			function check_fname(){
				var  regex = /^[A-Za-z]+$/;
				var fname = $("#firstname").val();
				if(!fname.match(regex)) {
					alert("please enter first name details");
					$("#form").submit(function(){
					return false;
					});
				}
			}
			function check_email() {
				var regex2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
				var email = $("#emailid").val();
				if(!email.match(regex2)) {
					alert("please enter valid email details");
					$("#form").submit(function(){
					return false;
					});
				}
			}
			function check_pnumber() {
				var regex3 = /^\d{10}$/;
				var Pnmber = $("#phonenumber").val();
				if(!Pnmber.match(regex3)) {
					alert("please enter valid phone number");
					$("#form").submit(function(){
					return false;
					});
				}
			}
			var today = new Date();
			$("#dateofjoining").datepicker({
				changeYear:true,
				changeMonth: true,
				maxDate: new Date(today),
				dateFormat: 'yy-mm-dd'
			});
			function check_password() {
				var pword = $("#pword").val();
				var repword = $("#repword").val();
				if (pword != repword) {
					alert("password and retype password should match");
					$("#form").submit(function(){
					return false;
					});
				}
			}
		
  });