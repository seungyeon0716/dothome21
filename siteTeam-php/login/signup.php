<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>새벽일기</title>
    <style>
        /* Global Styles */
 
*{
    padding: 0; /* Reset all padding to 0 */
    margin: 0; /* Reset all margin to 0 */
}
 
body{
    background: #F9F9F9; /* Set HTML background color */
    font: 14px "Lucida Grande";  /* Set global font size & family */
    color: #464646; /* Set global text color */
}
 
p{
    margin: 10px 0px 10px 0px; /* Add some padding to the top and bottom of the <p> tags */
}
 
/* Header */
 
#header{
    height: 45px; /* Set header height */
    background: #464646; /* Set header background color */
}
 
#header h3{
    color: #FFFFF3; /* Set header heading(top left title ) color */
    padding: 10px; /* Set padding, to center it within the header */
    font-weight: normal; /* Set font weight to normal, default it was set to bold */
}
 
/* Wrap */
 
#wrap{
    background: #FFFFFF; /* Set content background to white */
    width: 615px; /* Set the width of our content area */
    margin: 0 auto; /* Center our content in our browser */
    margin-top: 50px; /* Margin top to make some space between the header and the content */
    padding: 10px; /* Padding to make some more space for our text */
    border: 1px solid #DFDFDF; /* Small border for the finishing touch */
    text-align: center; /* Center our content text */
}
 
#wrap h3{
    font: italic 22px Georgia; /* Set font for our heading 2 that will be displayed in our wrap */
}
 
/* Form & Input field styles */
 
form{
    margin-top: 10px; /* Make some more distance away from the description text */
}
 
form .submit_button{
    background: #F9F9F9; /* Set button background */
    border: 1px solid #DFDFDF; /* Small border around our submit button */
    padding: 8px; /* Add some more space around our button text */
}
 
input{
    font: normal 16px Georgia; /* Set font for our input fields */
    border: 1px solid #DFDFDF; /* Small border around our input field */
    padding: 8px; /* Add some more space around our text */
}

#wrap .statusmsg{
    font-size: 12px; /* Set message font size  */
    padding: 3px; /* Some padding to make some more space for our text  */
    background: #EDEDED; /* Add a background color to our status message   */
    border: 1px solid #DFDFDF; /* Add a border arround our status message   */
}

    </style>
</head>
<body>
    <!-- start header div -->	
	<div id="header">
		<h3>NETTUTS > Sign up</h3>
	</div>
	<!-- end header div -->	
	
	<!-- start wrap div -->	
	<div id="wrap">
		
		<!-- start php code -->
		
		<!-- stop php code -->
	
		<!-- title and description -->	
		<h3>Signup Form</h3>
		<p>Please enter your name and email addres to create your account</p>
		<?php
            if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
                // Form Submited
            }        
            
        ?>
            <!-- stop PHP Code -->
		<!-- start sign up form -->	
		<form action="" method="post">
			<label for="name">Name:</label>
			<input type="text" name="name" value="" />
			<label for="email">Email:</label>
			<input type="text" name="email" value="" />
			
			<input type="submit" class="submit_button" value="Sign up" />
		</form>
		<!-- end sign up form -->	
	</div>
	<!-- end wrap div -->
    <!-- start PHP code -->
    <?php
        mysql_connect("localhost", "username", "password") or die(mysql_error()); // Connect to database server(localhost) with username and password.
        mysql_select_db("users") or die(mysql_error()); // Select registrations database.    
    ?>
    <script>
        $name = mysql_escape_string($_POST['name']);
        $email = mysql_escape_string($_POST['email']);
                    
                    
        if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    // Return Error - Invalid Email
            $msg = 'The email you have entered is invalid, please try again.';
        }else{
            // Return Success - Valid Email
            $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
        }
    </script>

</body>
</html>