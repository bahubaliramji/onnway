<script type="text/javascript">
	/* <![CDATA[ */

	jQuery(function() {



		jQuery("#type_loader").validate({
			expression: "if (VAL != '') return true; else return false;",

			message: "Please select a Type"

		});

		jQuery("#name_loader").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please enter Your Name"

		});




		jQuery("#mobile_loader").validate({

			expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",

			message: "Your Phone Number is Invalid"

		});

		jQuery("#email_loader").validate({

			expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

			message: "Please enter a valid Email ID"

		});



		jQuery("#password_loader").validate({

			expression: "if (VAL.length > 5 && VAL) return true; else return false;",

			message: "Please enter a valid Password Min 5 Character"

		});

		jQuery("#re_password_loader").validate({
			expression: "if ((VAL == jQuery('#password_loader').val()) && VAL) return true; else return false;",

			message: "Confirm password doesn't match"
		});

	});

	/* ]]> */
</script>
<script type="text/javascript">
	$(document).ready(function() {


		// login otp
		$("#login_phone").blur(function() {
			if (!isNaN($("#login_phone").val()) && $("#login_phone").val().length == '10') {
				// alert($("#login_phone").val());
				$.ajax({
					type: "POST",
					url: "ajax/login_otp.php",
					data: {
						mobile: $("#login_phone").val(),
						tab: "Check"
					},
					dataType: "JSON",
					beforeSend: function() {
						$(".divOuter").show();
					},
					success: function(result) {
							//alert(result);

								$("#otp_sent_log").show();
								$(".divOuter").css("display", "block");
					},
				
					complete: function() {
						$("#resend_otp_log").show();
					}
				});
			} else {
				$("#login_phone").val('');
				alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
			}
		});

		// provider login otp
		$("#provider_login_phone").blur(function() {
			if (!isNaN($("#provider_login_phone").val()) && $("#provider_login_phone").val().length == '10') {
				// alert($("#provider_login_phone").val());
				$.ajax({
					type: "POST",
					url: "ajax/login_otp.php",
					data: {
						mobile: $("#provider_login_phone").val(),
						tab: "Check"
					},
					dataType: "JSON",
					beforeSend: function() {
						$(".divOuter").show();
					},
					success: function(result) {
							//alert(result);

								$("#p_otp_sent_log").show();
								$(".divOuter").css("display", "block");
					},
				
					complete: function() {
						$("#p_resend_otp_log").show();
					}
				});
			} else {
				$("#provider_login_phone").val('');
				alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
			}
		});


		$("#load_agree").change(function() {
			if ($(this).is(':checked')) {
				$(".load_reg_submit").removeAttr("disabled");
			} else {
				$(".load_reg_submit").attr("disabled", "disabled");
			}

		});
		//check Mobile already exits or not for Loader  
		$("#mobile_loader").blur(function() {
			if (!isNaN($("#mobile_loader").val()) && $("#mobile_loader").val().length == '10') {
				// alert($("#mobile_loader").val());
				$.ajax({
					type: "POST",
					url: "check_ajax_mobile_l.php",
					data: {
						mobile: $("#mobile_loader").val(),
						tab: "Check"
					},
					dataType: "JSON",
					beforeSend: function() {
						$("#otp_ll").show();
					},
					success: function(result) {
						if (result['exits'] == 1) {
							alert("Mobile No Already Exits in our Database");
							$("#mobile_loader").val('');
							$("#otp_ll").hide();
						} else {
							if (result['sms'] == "success") {
								$("#otp_sent_l").show();
							}
						}
					},
					complete: function() {
						$("#resend_otp_l").show();

					}
				});
			} else {
				$("#mobile_loader").val('');
				alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
			}
		});

		$("#resend_otp_l").click(function() {
			$("#otp_sent_l").hide();
			$("#resend_otp_l").hide();

			if (!isNaN($("#mobile_loader").val()) && $("#mobile_loader").val().length == '10') {
				$.ajax({
					type: "POST",
					url: "check_ajax_mobile_l.php",
					data: {
						mobile: $("#mobile_loader").val(),
						tab: "Check"
					},
					dataType: "JSON",
					beforeSend: function() {
						$("#otp_ll").show();
					},
					success: function(result) {
						if (result['exits'] == 1) {
							alert("Mobile No Already Exits in our Database");
							$("#mobile_loader").val('');
							$("#otp_ll").hide();
						} else {
							if (result['sms'] == "success") {
								$("#otp_sent_l").show();
							}
						}
					},
					complete: function() {
						$("#resend_otp_l").show();

					}
				});
			} else {
				$("#mobile_loader").val('');
				alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
			}
		});
	});
</script>