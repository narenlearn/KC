<html>
<head>
<title>Contact Us Form</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="form-container">
        <form name="frmContact" id="frmContact" method="post"
            action="send-contact-mail.php" enctype="multipart/form-data"
            onsubmit="return validateContactForm()">

            <div class="input-row">
                <label style="padding-top: 20px;">Name</label> <span
                    id="userName-info" class="info"></span><br /> <input
                    type="text" class="input-field" name="userName"
                    id="userName" />
            </div>
            <div class="input-row">
                <label>Email</label> <span id="userEmail-info"
                    class="info"></span><br /> <input type="text"
                    class="input-field" name="userEmail" id="userEmail" />
            </div>
            <div class="input-row">
                <label>Subject</label> <span id="subject-info"
                    class="info"></span><br /> <input type="text"
                    class="input-field" name="subject" id="subject" />
            </div>
			
			<div class="input-row">
                <label>Mobile Number</label> <span id="mobile-info"
                    class="info"></span><br /> <input type="text" maxlength="10"
                    class="input-field" name="mobile" id="mobile" onkeypress="return isNumber(event)"/>
            </div>
			
			
            <div class="input-row">
                <label>Message</label> <span id="userMessage-info"
                    class="info"></span><br />
                <textarea name="content" id="content"
                    class="input-field" cols="60" rows="6"></textarea>
            </div>
            <div>
                <input type="submit" name="send" class="btn-submit"
                    value="submit" />

                <div id="statusMessage"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                        <?php
                        }
                        ?>
                    </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                 $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
			
			 var phoneNo = document.getElementById('mobile');

  if (phoneNo.value == "" || phoneNo.value == null) {
    $("#mobile-info").html("Please enter your Mobile No.");
    return false;
  }
  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
	  
	 
    $("#mobile-info").html("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    return false;
  }

 
			
			
			
			return valid;
		 return true;	
            
        }
		function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	  $("#mobile-info").html("Please enter only Numbers..");

    return false;
  }

  return true;
}

</script>
</body>
</html>