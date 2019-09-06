$(document).ready(function(){
	$("#renewpassword").focusout(function () {
		check_repassword();
		});
		function check_repassword() {
			var newpassword = $("#newpassword").val();
			var renewpassword = $("#renewpassword").val();
			if (newpassword != renewpassword) {
				alert("password and retype password should match");
				$("#form").submit(function(){
				return false;
					});
				}
			}
		
  });