
<?php 
	session_start();

	// connect to database
	include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
	
	// variable declaration
	$emp_id = "";
	$division = "";
	$first_name = "";
	$last_name = "";
	$email    = "";
	$errors   = array();

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// REGISTER USER
	function register(){
		// call these variables with the global keyword to make them available in function
		global $db, $errors, $emp_id, $email;

		// receive all input values from the form. Call the e() function
		// defined below to escape form values
		$emp_id    =  e($_POST['emp_id']);
		$division  =  e($_POST['division']);
		$user_type  =  e($_POST['type']);
		$first_name =  e($_POST['first_name']);
		$last_name  =  e($_POST['last_name']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
		// form validation: ensure that the form is correctly filled
		if (empty($emp_id)) { 
			array_push($errors, "Employee ID is required"); 
		}
		if (empty($first_name)) { 
			array_push($errors, "First Name is required"); 
		}
		if (empty($last_name)) { 
			array_push($errors, "Last Name is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors);
			// error
			$errors[] = "Passwords do not match";
				$_SESSION['status']  = "Passwords do not match! Try Again!";
				$_SESSION['status_code']  = "error";
			
		}
		if ($password_1 == $password_2){
			$password_check = $password_1;
			$uppercase    = preg_match('@[A-Z]@', $password_check);
  			$lowercase    = preg_match('@[a-z]@', $password_check);
  			$number       = preg_match('@[0-9]@', $password_check);
  			$specialchars = preg_match('@[^a-zA-Z0-9]@', $password_check);
  				if (strlen($password_check) < 8 || !$number) {
					array_push($errors);
    				$errors[] = "Password is weak! Enter a minimum of 8 characters with a mixed of letters and numbers";
					$_SESSION['status']  = "Password is weak! Enter a minimum of 8 characters with a mixed of letters, symbols, and numbers";
					$_SESSION['status_code']  = "error";
					}
					else{
						// Verifies email does not exist already in the system
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors[] = "Please enter a valid email";
				$_SESSION['status']  = "Please enter a valid email";
				$_SESSION['status_code']  = "error";
			}else if (valid_email($email)){
				$errors[] = "Email is invalid";
				$_SESSION['status']  = "Please enter a valid email";
				$_SESSION['status_code']  = "error";
			}else{
				$_SESSION['email'] = $email;
				///// 10-01
				$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

				// generates otp code 
				$expire = time() + (60 * 5);
				$code = rand(10000, 99999);
				$query = "INSERT INTO emailverification (email, code, expire) VALUES ('$email', '$code', '$expire')"; 
				$result = mysqli_query($db, $query);

				// Sends code through otp to user's email 
				include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/verify_mail.php');
				send_mail($email, 'Verify Email', "Your code is " . $code);
			
				// saves user profile to db
				if (isset($_POST['type'])) {
					$user_type = e($_POST['type']);
					$insert = "INSERT INTO `user` (emp_id, division, type, first_name, last_name, email, password) 
					VALUES('$emp_id', '$division', '$user_type', '$first_name', '$last_name', '$email', '$password')";
					$query = mysqli_query($db, $insert);
					$_SESSION['db']['insert'] = $query;
					if($query){
						// $_SESSION['status']  = "New User Successfully Created!";
						// $_SESSION['status_code']  = "success";	
						// header('location: ../nyclibrary/public/users/user-home.php');
						}
			
				}else{
					$insert = "INSERT INTO `user` (emp_id, division, type, first_name, last_name, email, password) 
					VALUES('$emp_id', '$division', '1', '$first_name', '$last_name', '$email', '$password')";
					$query = mysqli_query($db, $insert);
					$_SESSION['db']['insert'] = $query;
					if($query==1){
						$_SESSION['status']  = "Successful Registration!";
						$_SESSION['status_code']  = "success";
						header('location: ../nyclibrary/sign-up_login.php');	
					}				
				}
			}
			
			
					}
			
		}

			
	}

	// asks registered account user to verify email in the user table
	if (isset($_POST['verify_btn'])){
		$email = $_SESSION['email'];
		$otp_code = $_POST['otp_code'];			
	
		$result = is_code_correct($otp_code, $email);
					
		if($result == "The code is correct"){
			$_SESSION['status']  = "Successfully Verified!";
			$_SESSION['status_code']  = "success";	
			header("location: ../sign-up_login.php");	
		}else{
			
			header("location: ../verify.php");
		}
			
	}	

    // checks email if already in the user table
    function valid_email($email){
        global $db, $email;

        $email = addslashes($email);

        $query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($db, $query);
        if($result){
            if(mysqli_num_rows($result) > 0){

                return true;                         
            }
        }

        return false;
    }	


	// Validates entered code if equal to generated code.
    function is_code_correct($otp_code, $email){
        global $db, $email;
		$email = addslashes($email);
		$otp_code = addslashes($otp_code);
        $expire = time();

        $query = "SELECT * FROM emailverification WHERE code = '$otp_code' && email = '$email' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($db, $query);
        // Checks to see if query is runnable
        if($result){
            if(mysqli_num_rows($result) > 0){
                // Checks code's expiration validity
                $row = mysqli_fetch_assoc($result);
                if($row['expire'] > $expire){ 
                    // Code is valid 
                    return "The code is correct";
                }else{	
					$_SESSION['status']  = "OTP code is expired.";
					$_SESSION['status_code']  = "error";	
                    return "The code is expired";
                }
            }
			else{
				$_SESSION['status']  = "OTP code is incorrect.";
				$_SESSION['status_code']  = "error";
                return "The code is incorrect";
            } 
        }
		$_SESSION['status']  = "Code is invalid.";
		$_SESSION['status_code']  = "error";
        return "The code is invalid";
    
    }

	// return user array from their id
	function getUserById($emp_id){
		global $db;
		$query = "SELECT * FROM user WHERE emp_id=" . $emp_id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}	

	function isLoggedIn()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['type'] == '1' ) {
			return true;
		}else{
			return false;
		}
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	// LOGIN USER
	function login(){
		global $db, $emp_id, $errors;

		// grap form values
		$emp_id = e($_POST['emp_id']);
		$password = e($_POST['password']);
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');

		// make sure form is filled properly
		if (empty($emp_id)) {
			array_push($errors, "Employee ID is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			///// 10-01

			$query = "SELECT * FROM user WHERE emp_id ='$emp_id' LIMIT 1";
			$result = mysqli_query($db, $query);
			$hashed_pass = $result ->fetch_assoc()['password'];
			
			if(!password_verify($password, $hashed_pass)){		
			echo '<script>alert("Incorrect Credentials! Try Again!")</script>';
			}else{
				$query = "SELECT * FROM user WHERE emp_id ='$emp_id' LIMIT 1";
				$results = mysqli_query($db, $query);
				if (mysqli_num_rows($results) == 1) {
					$logged_in_user = mysqli_fetch_assoc($results);
					if ($logged_in_user['type'] == '2') {

								$_SESSION['user'] = $logged_in_user;
								$_SESSION['status']  = "You are now logged in!";
								$_SESSION['status_code']  = "success";
								header('location: ../nyclibrary/public/admin/admin-home.php');	
			
								//audit log saving
								$action_made = "An admin logged in.";
								$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
								$save = mysqli_query($db, $sql);
							
							}
							elseif ($logged_in_user['type'] == '1') {

										$_SESSION['user'] = $logged_in_user;
										$_SESSION['status']  = "You are now logged in!";
										$_SESSION['status_code']  = "success";
										header('location: ../nyclibrary/public/users/user-home.php');	
					
										//audit log saving
										$action_made = "An employee logged in.";
										$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
										$save = mysqli_query($db, $sql);
									}
									elseif ($logged_in_user['type'] == '3') {

												$_SESSION['user'] = $logged_in_user;
												$_SESSION['status']  = "You are now logged in!";
												$_SESSION['status_code']  = "success";
												header('location: ../nyclibrary/public/librarian/librarian-home.php');	
							
												//audit log saving
												$action_made = "A library admin logged in.";
												$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
												$save = mysqli_query($db, $sql); 
											}
							
											elseif ($logged_in_user['type'] == '4') {
							
												$_SESSION['user'] = $logged_in_user;
												$_SESSION['status']  = "You are now logged in!";
												$_SESSION['status_code']  = "success";
												header('location: ../nyclibrary/public/researcher/researcher-home.php');	
							
												//audit log saving
												$action_made = "A research admin logged in.";
												$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
												$save = mysqli_query($db, $sql); 
											}
											else{
														$_SESSION['user'] = $logged_in_user;
														$_SESSION['status']  = "You are now logged in!";
														$_SESSION['status_code']  = "success";
									
														header('location: ../nyclibrary/public/users/user-home.php');
									
														//audit log saving
														$action_made = "{$emp_id} logged in.";
														$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
														$save = mysqli_query($db, $sql);
													}
							
				}
				
			}


		}
	}

	// log user out if logout button clicked
	if (isset($_GET['logout'])) {
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];

		//audit log saving
		$action_made = "Logged out.";
		$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
		$save = mysqli_query($db, $sql); 

		session_destroy();
		unset($_SESSION['user']);
		header("location: ../nyclibrary/sign-up_login.php");
	}

	// ...
	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['type'] == '2' ) {
			return true;
		}else{
			return false;
		}
	}

	function isLibrarian()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['type'] == '3' ) {
			return true;
		}else{
			return false;
		}
	}

	function isResearcher()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['type'] == '4' ) {
			return true;
		}else{
			return false;
		}
	}

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_admin_btn'])) {
		register1();
	}


	// REGISTER USER
	function register1(){
		// call these variables with the global keyword to make them available in function
		global $db, $errors, $emp_id, $email;

		// receive all input values from the form. Call the e() function
		// defined below to escape form values
		$emp_id    =  e($_POST['emp_id']);
		$division  =  e($_POST['division']);
		$user_type  =  e($_POST['type']);
		$first_name =  e($_POST['first_name']);
		$last_name  =  e($_POST['last_name']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
		// form validation: ensure that the form is correctly filled
		if (empty($emp_id)) { 
			array_push($errors, "Employee ID is required"); 
		}
		if (empty($first_name)) { 
			array_push($errors, "First Name is required"); 
		}
		if (empty($last_name)) { 
			array_push($errors, "Last Name is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 == $password_2){
			$password_check = $password_1;
			$uppercase    = preg_match('@[A-Z]@', $password_check);
  			$lowercase    = preg_match('@[a-z]@', $password_check);
  			$number       = preg_match('@[0-9]@', $password_check);
  			$specialchars = preg_match('@[^\w]@', $password_check);
  				if (strlen($password_check) < 8 || !$number) {
					array_push($errors);
    				$errors[] = "Password is weak! Enter a minimum of 8 characters with a mixed of letters and numbers";
					$_SESSION['status']  = "Password is weak! Enter a minimum of 8 characters with a mixed of letters, symbols, and numbers";
					$_SESSION['status_code']  = "error";
					}
					else{
			$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

			// saves user profile to db
			if (isset($_POST['type'])) {
				$user_type = e($_POST['type']);
				$insert = "INSERT INTO `user` (emp_id, division, type, first_name, last_name, email, password) 
				VALUES('$emp_id', '$division', '$user_type', '$first_name', '$last_name', '$email', '$password')";
				$query = mysqli_query($db, $insert);
				$_SESSION['db']['insert'] = $query;
				if($query){
					echo '<script>alert("Admin Succesfully Created!")</script>';
					}
		
			}else{
				$insert = "INSERT INTO `user` (emp_id, division, type, first_name, last_name, email, password) 
				VALUES('$emp_id', '$division', '1', '$first_name', '$last_name', '$email', '$password')";
				$query = mysqli_query($db, $insert);
				$_SESSION['db']['insert'] = $query;
				if($query==1){
					// $_SESSION['status']  = "Successful Registration!";
					// $_SESSION['status_code']  = "success";
					// header('location: ../nyclibrary/public/admin/add-admin.php');	
				}				
			}
					}
			
		}
	}

	// edit_profile
	if (isset($_POST['edit-user-profile'])) {

		$id = $_POST['emp_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$division = $_POST['division'];
		$email = $_POST['email'];
	
		$query = "UPDATE `user` SET first_name='$first_name', last_name='$last_name', division='$division', email='$email' WHERE emp_id='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Profile Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/users/user-home.php");
		}

		else{
			$_SESSION['status'] = "Oops.. Updating Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/users/edit-profile.php");
		}
	}

	// edit_profile_password
	if (isset($_POST['user-edit-password'])) {
		header("location: ../public/users/edit-password.php");
	}
    if (isset($_POST['edit-user-pass'])){
		///// 10-01
		$id = $_POST['emp_id'];
		$current_password = ($_POST['current_password']);
		$enc_pass = password_hash($current_password, PASSWORD_DEFAULT);
		$password_1 = ($_POST['password_1']);
		$password_2 = ($_POST['password_2']);
	  
			$query = "SELECT * FROM user WHERE emp_id ='$id' LIMIT 1";
			$results = mysqli_query($db, $query);
			$hashed_pass = $results ->fetch_assoc()['password'];
			
			if(!password_verify($current_password, $hashed_pass)){
			  $_SESSION['status'] = "Oops.. Password Incorrect!";
			  $_SESSION['status_code'] = 'error';
			  header("location: ../public/users/edit-profile.php");
			}else{
				if ($password_1 == $password_2){
				  $password_check = $password_1;
				  $uppercase    = preg_match('@[A-Z]@', $password_check);
					$lowercase    = preg_match('@[a-z]@', $password_check);
					$number       = preg_match('@[0-9]@', $password_check);
					$specialchars = preg_match('@[^\w]@', $password_check);
					if (strlen($password_check) < 8 || !$number || !$uppercase || !$lowercase || !$specialchars) {
					  array_push($errors);
					  $errors[] = "Password is weak! Enter a minimum of 8 characters with a mixed of letters and numbers";
					  $_SESSION['status']  = "Password is weak! Enter a minimum of 8 characters with a mixed of letters, symbols, and numbers";
					  $_SESSION['status_code']  = "error";
					  header("location: ../public/users/edit-password.php");
					  }
					  else{
						  $enc_password_1 = password_hash($password_1, PASSWORD_DEFAULT);
						  $query = "UPDATE `user` SET password='$enc_password_1' WHERE emp_id = '$id'";
						  $query_run = mysqli_query($db, $query);
						  if($query_run){
									  $_SESSION['status'] = "Password Successfully Updated!";
									  $_SESSION['status_code'] = 'success';
									  header("location: ../public/users/edit-profile.php");
								  }
					  }
				}
				else{
				  $_SESSION['status'] = "Oops.. Passwords do not match!";
				  $_SESSION['status_code'] = 'error';
				  header("location: ../public/users/edit-profile.php");
				}
			}
	
    }

	// edit_profile_email
	if (isset($_POST['user-edit-email'])) {
		header("location: ../public/users/edit-email.php");
	}
	if (isset($_POST['edit-user-email'])) {
		$id = $_POST['emp_id'];
		$email = $_POST['email'];

		// Verifies email does not exist already in the system
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Please enter a valid email";
			$_SESSION['status']  = "Please enter a valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/users/edit-email.php");
		}else if (valid_email($email)){
			$errors[] = "Email is invalid";
			$_SESSION['status']  = "Please enter a different valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/users/edit-email.php");
		}else{
			$_SESSION['email'] = $email;

			// generates otp code 
			$expire = time() + (60 * 5);
			$code = rand(10000, 99999);
			$query = "INSERT INTO emailverification (email, code, expire) VALUES ('$email', '$code', '$expire')"; 
			$result = mysqli_query($db, $query);

			// Sends code through otp to user's email 
			include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/verify_mail_profile.php');
			send_mail($email, 'Verify Email', "Your code is " . $code);

			$query = "SELECT * FROM user WHERE emp_id = '$id'";
			$result = mysqli_query($db, $query); 
			$row = mysqli_fetch_array($result);
			if ($row){
				$query = "UPDATE `user` SET email='$email' WHERE emp_id='$id'";
				$query_run = mysqli_query($db, $query);
			}
		}
		
		
	}
	if (isset($_POST['verify_button'])) {

		$email = $_SESSION['email'];
		$otp_code = $_POST['otp_code'];			
	
		$result = is_code_correct($otp_code, $email);
					
		if($result == "The code is correct"){
			$_SESSION['status']  = "Email Successfully Updated! Login again.";
			$_SESSION['status_code']  = "success";	
			header("location:  ../sign-up_login.php");		
		}else{
			header("location: ../verify_profile.php");
		}

	}

	// edit_profile
	if (isset($_POST['edit-admin-profile'])) {

		$date_time = date_create('Asia/Manila')->format('Y	-m-d H:i:s');
		$id = $_POST['emp_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$division = $_POST['division'];
		$email = $_POST['email'];

		$query = "UPDATE `user` SET first_name='$first_name', last_name='$last_name', division='$division', email='$email' WHERE emp_id='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Profile Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/admin-home.php");

			//audit log saving
			$action_made = "Edited profile ({$id}:{$first_name} {$last_name}).";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$id','$action_made')";
			$save = mysqli_query($db, $sql); 
		}

		else{
			$_SESSION['status'] = "Oops.. Updating Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/edit-profile.php");
		}
	}

	// edit_profile_password
	if (isset($_POST['admin-edit-password'])) {
		header("location: ../public/admin/edit-password.php");
		
	}
    if (isset($_POST['edit-admin-pass'])){
  ///// 10-01
  $id = $_POST['emp_id'];
  $current_password = ($_POST['current_password']);
  $enc_pass = password_hash($current_password, PASSWORD_DEFAULT);
  $password_1 = ($_POST['password_1']);
  $password_2 = ($_POST['password_2']);

	  $query = "SELECT * FROM user WHERE emp_id ='$id' LIMIT 1";
	  $results = mysqli_query($db, $query);
	  $hashed_pass = $results ->fetch_assoc()['password'];
	  
	  if(!password_verify($current_password, $hashed_pass)){
		$_SESSION['status'] = "Oops.. Current Password Incorrect!";
		$_SESSION['status_code'] = 'error';
		header("location: ../public/admin/edit-password.php");
	  }else{
		  if ($password_1 == $password_2){
			$password_check = $password_1;
			$uppercase    = preg_match('@[A-Z]@', $password_check);
  			$lowercase    = preg_match('@[a-z]@', $password_check);
  			$number       = preg_match('@[0-9]@', $password_check);
  			$specialchars = preg_match('@[^\w]@', $password_check);
			  if (strlen($password_check) < 8 || !$number || !$uppercase || !$lowercase || !$specialchars) {
				array_push($errors);
				$errors[] = "Password is weak! Enter a minimum of 8 characters with a mixed of letters and numbers";
				$_SESSION['status']  = "Password is weak! Enter a minimum of 8 characters with a mixed of letters, symbols, and numbers";
				$_SESSION['status_code']  = "error";
				header("location: ../public/admin/edit-password.php");
				}
				else{
					$enc_password_1 = password_hash($password_1, PASSWORD_DEFAULT);
					$query = "UPDATE `user` SET password='$enc_password_1' WHERE emp_id = '$id'";
					$query_run = mysqli_query($db, $query);
					if($query_run){
								$_SESSION['status'] = "Password Successfully Updated!";
								$_SESSION['status_code'] = 'success';
								header("location: ../public/admin/edit-profile.php");
							}
				}
		  }
		  else{
			$_SESSION['status'] = "Oops.. Passwords do not match!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/edit-profile.php");
		  }
	  }
    }

	// edit_profile_email
	if (isset($_POST['admin-edit-email'])) {
		header("location: ../public/admin/edit-email.php");
	}
	if (isset($_POST['edit-admin-email'])) {
		$id = $_POST['emp_id'];
		$email = $_POST['email'];

		// Verifies email does not exist already in the system
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Please enter a valid email";
			$_SESSION['status']  = "Please enter a valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/admin/edit-email.php");
		}else if (valid_email($email)){
			$errors[] = "Email is invalid";
			$_SESSION['status']  = "Please enter a different valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/admin/edit-email.php");
		}else{
			$_SESSION['email'] = $email;

			// generates otp code 
			$expire = time() + (60 * 5);
			$code = rand(10000, 99999);
			$query = "INSERT INTO emailverification (email, code, expire) VALUES ('$email', '$code', '$expire')"; 
			$result = mysqli_query($db, $query);

			// Sends code through otp to user's email 
			include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/verify_mail_profile.php');
			send_mail($email, 'Verify Email', "Your code is " . $code);

			$query = "SELECT * FROM user WHERE emp_id = '$id'";
			$result = mysqli_query($db, $query); 
			$row = mysqli_fetch_array($result);
			if ($row){
				$query = "UPDATE `user` SET email='$email' WHERE emp_id='$id'";
				$query_run = mysqli_query($db, $query);
			}
		}
	}
	if (isset($_POST['verify_button'])) {

		$email = $_SESSION['email'];
		$otp_code = $_POST['otp_code'];			
	
		$result = is_code_correct($otp_code, $email);
					
		if($result == "The code is correct"){
			$_SESSION['status']  = "Email Successfully Updated! Login again.";
			$_SESSION['status_code']  = "success";	
			header("location:  ../sign-up_login.php");	
		}else{
			header("location: ../verify_profile.php");
		}
		
	}

	// edit_profile
	if (isset($_POST['edit-researcher-profile'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');			
		$id = $_POST['emp_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$division = $_POST['division'];
		$email = $_POST['email'];

		$query = "UPDATE `user` SET first_name='$first_name', last_name='$last_name', division='$division', email='$email' WHERE emp_id='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Profile Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/researcher/researcher-home.php");

			//audit log saving
			$action_made = "Edited profile ({$id}:{$first_name} {$last_name}).";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Updating Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/researcher/edit-profile.php");
		}
	}

	// edit_profile_password
	if (isset($_POST['researcher-edit-password'])) {
		header("location: ../public/researcher/edit-password.php");
	}
    if (isset($_POST['edit-researcher-pass'])){
  
         ///// 10-01
  $id = $_POST['emp_id'];
  $current_password = ($_POST['current_password']);
  $enc_pass = password_hash($current_password, PASSWORD_DEFAULT);
  $password_1 = ($_POST['password_1']);
  $password_2 = ($_POST['password_2']);

	  $query = "SELECT * FROM user WHERE emp_id ='$id' LIMIT 1";
	  $results = mysqli_query($db, $query);
	  $hashed_pass = $results ->fetch_assoc()['password'];
	  
	  if(!password_verify($current_password, $hashed_pass)){
		$_SESSION['status'] = "Oops.. Password Incorrect!";
		$_SESSION['status_code'] = 'error';
		header("location: ../public/researcher/edit-profile.php");
	  }else{
		if ($password_1 == $password_2){
		  $password_check = $password_1;
		  $uppercase    = preg_match('@[A-Z]@', $password_check);
			$lowercase    = preg_match('@[a-z]@', $password_check);
			$number       = preg_match('@[0-9]@', $password_check);
			$specialchars = preg_match('@[^\w]@', $password_check);
			if (strlen($password_check) < 8 || !$number || !$uppercase || !$lowercase || !$specialchars) {
			  array_push($errors);
			  $errors[] = "Password is weak! Enter a minimum of 8 characters with a mixed of letters and numbers";
			  $_SESSION['status']  = "Password is weak! Enter a minimum of 8 characters with a mixed of letters, symbols, and numbers";
			  $_SESSION['status_code']  = "error";
			  header("location: ../public/researcher/edit-password.php");
			  }
			  else{
				  $enc_password_1 = password_hash($password_1, PASSWORD_DEFAULT);
				  $query = "UPDATE `user` SET password='$enc_password_1' WHERE emp_id = '$id'";
				  $query_run = mysqli_query($db, $query);
				  if($query_run){
							  $_SESSION['status'] = "Password Successfully Updated!";
							  $_SESSION['status_code'] = 'success';
							  header("location: ../public/researcher/edit-profile.php");
						  }
			  }
		}
		else{
		  $_SESSION['status'] = "Oops.. Passwords do not match!";
		  $_SESSION['status_code'] = 'error';
		  header("location: ../public/researcher/edit-profile.php");
		}
	}
    }

	// edit_profile_email
	if (isset($_POST['researcher-edit-email'])) {
		header("location: ../public/researcher/edit-email.php");
	}
	if (isset($_POST['edit-researcher-email'])) {
		$id = $_POST['emp_id'];
		$email = $_POST['email'];

		// Verifies email does not exist already in the system
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Please enter a valid email";
			$_SESSION['status']  = "Please enter a valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/researcher/edit-email.php");
		}else if (valid_email($email)){
			$errors[] = "Email is invalid";
			$_SESSION['status']  = "Please enter a different valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/researcher/edit-email.php");
		}else{
			$_SESSION['email'] = $email;

			// generates otp code 
			$expire = time() + (60 * 5);
			$code = rand(10000, 99999);
			$query = "INSERT INTO emailverification (email, code, expire) VALUES ('$email', '$code', '$expire')"; 
			$result = mysqli_query($db, $query);

			// Sends code through otp to user's email 
			include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/verify_mail_profile.php');
			send_mail($email, 'Verify Email', "Your code is " . $code);

			$query = "SELECT * FROM user WHERE emp_id = '$id'";
			$result = mysqli_query($db, $query); 
			$row = mysqli_fetch_array($result);
			if ($row){
				$query = "UPDATE `user` SET email='$email' WHERE emp_id='$id'";
				$query_run = mysqli_query($db, $query);
			}
		}
	}
	if (isset($_POST['verify_button'])) {

		$email = $_SESSION['email'];
		$otp_code = $_POST['otp_code'];			
	
		$result = is_code_correct($otp_code, $email);
					
		if($result == "The code is correct"){
			$_SESSION['status']  = "Email Successfully Updated! Login again.";
			$_SESSION['status_code']  = "success";	
			header("location:  ../sign-up_login.php");	
		}else{
			header("location: ../verify_profile.php");
		}
		
	}

	// edit_profile
	if (isset($_POST['edit-librarian-profile'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$id = $_POST['emp_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$division = $_POST['division'];
		$email = $_POST['email'];

		$query = "UPDATE `user` SET first_name='$first_name', last_name='$last_name', division='$division', email='$email' WHERE emp_id='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Profile Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/librarian-home.php");
			
			//audit log saving
			$action_made = "Edited profile ({$id}:{$first_name} {$last_name}).";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Updating Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/librarian-profile.php");
		}
	}	

	// edit_profile_password
	if (isset($_POST['librarian-edit-password'])) {
		header("location: ../public/librarian/edit-password.php");
	}
    if (isset($_POST['edit-librarian-pass'])){
    ///// 10-01
	$id = $_POST['emp_id'];
	$current_password = ($_POST['current_password']);
	$enc_pass = password_hash($current_password, PASSWORD_DEFAULT);
	$password_1 = ($_POST['password_1']);
	$password_2 = ($_POST['password_2']);
  
		$query = "SELECT * FROM user WHERE emp_id ='$id' LIMIT 1";
		$results = mysqli_query($db, $query);
		$hashed_pass = $results ->fetch_assoc()['password'];
		
		if(!password_verify($current_password, $hashed_pass)){
		  $_SESSION['status'] = "Oops.. Password Incorrect!";
		  $_SESSION['status_code'] = 'error';
		  header("location: ../public/librarian/edit-profile.php");
		}else{
			if ($password_1 == $password_2){
			  $password_check = $password_1;
			  $uppercase    = preg_match('@[A-Z]@', $password_check);
				$lowercase    = preg_match('@[a-z]@', $password_check);
				$number       = preg_match('@[0-9]@', $password_check);
				$specialchars = preg_match('@[^\w]@', $password_check);
				if (strlen($password_check) < 8 || !$number ) {
				  array_push($errors);
				  $errors[] = "Password is weak! Enter a minimum of 8 characters with a mixed of letters and numbers";
				  $_SESSION['status']  = "Password is weak! Enter a minimum of 8 characters with a mixed of letters, symbols, and numbers";
				  $_SESSION['status_code']  = "error";
				  header("location: ../public/librarian/edit-password.php");
				  }
				  else{
					  $enc_password_1 = password_hash($password_1, PASSWORD_DEFAULT);
					  $query = "UPDATE `user` SET password='$enc_password_1' WHERE emp_id = '$id'";
					  $query_run = mysqli_query($db, $query);
					  if($query_run){
								  $_SESSION['status'] = "Password Successfully Updated!";
								  $_SESSION['status_code'] = 'success';
								  header("location: ../public/librarian/edit-profile.php");
							  }
				  }
			}
			else{
			  $_SESSION['status'] = "Oops.. Passwords do not match!";
			  $_SESSION['status_code'] = 'error';
			  header("location: ../public/librarian/edit-profile.php");
			}
		}
    }

	// edit_profile_email
	if (isset($_POST['librarian-edit-email'])) {
		header("location: ../public/librarian/edit-email.php");
	}
	if (isset($_POST['edit-librarian-email'])) {
		$id = $_POST['emp_id'];
		$email = $_POST['email'];

		// Verifies email does not exist already in the system
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Please enter a valid email";
			$_SESSION['status']  = "Please enter a valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/librarian/edit-email.php");
		}else if (valid_email($email)){
			$errors[] = "Email is invalid";
			$_SESSION['status']  = "Please enter a different valid email";
			$_SESSION['status_code']  = "error";
			header("location:  ../public/librarian/edit-email.php");
		}else{
			$_SESSION['email'] = $email;

			// generates otp code 
			$expire = time() + (60 * 5);
			$code = rand(10000, 99999);
			$query = "INSERT INTO emailverification (email, code, expire) VALUES ('$email', '$code', '$expire')"; 
			$result = mysqli_query($db, $query);

			// Sends code through otp to user's email 
			include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/verify_mail_profile.php');
			send_mail($email, 'Verify Email', "Your code is " . $code);

			$query = "SELECT * FROM user WHERE emp_id = '$id'";
			$result = mysqli_query($db, $query); 
			$row = mysqli_fetch_array($result);
			if ($row){
				$query = "UPDATE `user` SET email='$email' WHERE emp_id='$id'";
				$query_run = mysqli_query($db, $query);
			}
		}
	}
	if (isset($_POST['verify_button'])) {

		$email = $_SESSION['email'];
		$otp_code = $_POST['otp_code'];			
	
		$result = is_code_correct($otp_code, $email);
					
		if($result == "The code is correct"){
			$_SESSION['status']  = "Email Successfully Updated! Login again.";
			$_SESSION['status_code']  = "success";	
			header("location:  ../sign-up_login.php");	
		}else{
			header("location: ../verify_profile.php");
		}
		
	}

	// add_policy
	if (isset($_POST['add_policy'])) {
		
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$policy_status = $_POST['policy_status'];
		$specific_request = $_POST['specific_request'];
		$in_charge = $_POST['in_charge'];
		$date_requested = $_POST['date_requested'];
		$offices = $_POST['offices'];
		$date_submitted = $_POST['date_submitted'];
		$req_position_paper = $_POST['req_position_paper'];
		$link = $_POST['link'];
		

		$query = "INSERT INTO `policy` (emp_id, title, author, policy_status, specific_request, in_charge, date_requested, offices, date_submitted, req_position_paper, link) VALUES
		('$emp_id', '$title', '$author', '$policy_status', '$specific_request', '$in_charge', '$date_requested', '$offices', '$date_submitted', '$req_position_paper', '$link')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Policy Paper Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/researcher/view-policies.php");
			
			//audit log saving
			$action_made = "Employee {$emp_id} added a policy with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/researcher/view-policies.php");
		}


	}

	// edit_policy
	if (isset($_POST['edit_policy'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['currentUser'];
		$id = $_POST['policy_id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$policy_status = $_POST['policy_status'];
		$specific_request = $_POST['specific_request'];
		$in_charge = $_POST['in_charge'];
		$date_requested = $_POST['date_requested'];
		$offices = $_POST['offices'];
		$date_submitted = $_POST['date_submitted'];
		$req_position_paper = $_POST['req_position_paper'];
		$link = $_POST['link'];
		

		$query = "UPDATE `policy` SET title='$title', author='$author', policy_status='$policy_status', specific_request='$specific_request', in_charge='$in_charge', date_requested='$date_requested', offices='$offices', date_submitted='$date_submitted', req_position_paper='$req_position_paper', link='$link' WHERE policy_id='$id'";
		

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Policy Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/researcher/view-policies.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a policy with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Updating Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/researcher/view-policies.php");
		}
	}

	// add_policy_admin
	if (isset($_POST['add_policy_admin'])) {
		
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$policy_status = $_POST['policy_status'];
		$specific_request = $_POST['specific_request'];
		$in_charge = $_POST['in_charge'];
		$date_requested = $_POST['date_requested'];
		$offices = $_POST['offices'];
		$date_submitted = $_POST['date_submitted'];
		$req_position_paper = $_POST['req_position_paper'];
		$link = $_POST['link'];
		

		$query = "INSERT INTO `policy` (emp_id, title, author, policy_status, specific_request, in_charge, date_requested, offices, date_submitted, req_position_paper, link) VALUES
		('$emp_id', '$title', '$author', '$policy_status', '$specific_request', '$in_charge', '$date_requested', '$offices', '$date_submitted', '$req_position_paper', '$link')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Policy Paper Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-policies.php");
			
			//audit log saving
			$action_made = "Employee {$emp_id} added a policy with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-policies.php");
		}


	}

	// edit_policy_admin
	if (isset($_POST['edit_policy_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['currentUser'];
		$id = $_POST['policy_id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$policy_status = $_POST['policy_status'];
		$specific_request = $_POST['specific_request'];
		$in_charge = $_POST['in_charge'];
		$date_requested = $_POST['date_requested'];
		$offices = $_POST['offices'];
		$date_submitted = $_POST['date_submitted'];
		$req_position_paper = $_POST['req_position_paper'];
		$link = $_POST['link'];
		

		$query = "UPDATE `policy` SET title='$title', author='$author', policy_status='$policy_status', specific_request='$specific_request', in_charge='$in_charge', date_requested='$date_requested', offices='$offices', date_submitted='$date_submitted', req_position_paper='$req_position_paper', link='$link' WHERE policy_id='$id'";
		

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Policy Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-policies.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a policy with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Updating Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-policies.php");
		}
	}

	// add_bills
	if (isset($_POST['add_bill_btn'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$bill_number = $_POST['bill_number'];
		$title = $_POST['title'];
		$date_filed = $_POST['date_filed'];
		$subject = $_POST['subject'];
		$sponsor = $_POST['sponsor'];
		$in_charge = $_POST['in_charge'];
		$updates = $_POST['updates'];
		$link = $_POST['link'];
		$center_of_participation = $_POST['center_of_participation'];

		$query = "INSERT INTO `senatebill` (emp_id, bill_number, title, date_filed, subject, sponsor, in_charge, updates, link, center_of_participation) VALUES
		('$emp_id', '$bill_number', '$title', '$date_filed', '$subject', '$sponsor', '$in_charge', '$updates', '$link', '$center_of_participation')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Bill Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/researcher/view-bills.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a bill with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/researcher/view-bills.php");
		}
	}

	// edit_bill
	if (isset($_POST['edit_bill'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['senatebill_id'];
		$bill_number = $_POST['bill_number'];
		$title = $_POST['title'];
		$date_filed = $_POST['date_filed'];
		$subject = $_POST['subject'];
		$sponsor = $_POST['sponsor'];
		$in_charge = $_POST['in_charge'];
		$updates = $_POST['updates'];
		$link = $_POST['link'];
		$center_of_participation = $_POST['center_of_participation'];

		

		$query = "UPDATE `senatebill` SET bill_number='$bill_number', title='$title', date_filed='$date_filed', subject='$subject', sponsor='$sponsor', in_charge='$in_charge', updates='$updates', link='$link', center_of_participation='$center_of_participation' WHERE senatebill_id='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Bill Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/researcher/view-bills.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a bill with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/researcher/view-bills.php");
		}
	}

	// add_bills_admin
	if (isset($_POST['add_bill_btn_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$bill_number = $_POST['bill_number'];
		$title = $_POST['title'];
		$date_filed = $_POST['date_filed'];
		$subject = $_POST['subject'];
		$sponsor = $_POST['sponsor'];
		$in_charge = $_POST['in_charge'];
		$updates = $_POST['updates'];
		$link = $_POST['link'];
		$center_of_participation = $_POST['center_of_participation'];

		$query = "INSERT INTO `senatebill` (emp_id, bill_number, title, date_filed, subject, sponsor, in_charge, updates, link, center_of_participation) VALUES
		('$emp_id', '$bill_number', '$title', '$date_filed', '$subject', '$sponsor', '$in_charge', '$updates', '$link', '$center_of_participation')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Bill Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-bills.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a bill with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-bills.php");
		}
	}

	// edit_bill_admin
	if (isset($_POST['edit_bill_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['senatebill_id'];
		$bill_number = $_POST['bill_number'];
		$title = $_POST['title'];
		$date_filed = $_POST['date_filed'];
		$subject = $_POST['subject'];
		$sponsor = $_POST['sponsor'];
		$in_charge = $_POST['in_charge'];
		$updates = $_POST['updates'];
		$link = $_POST['link'];
		$center_of_participation = $_POST['center_of_participation'];

		

		$query = "UPDATE `senatebill` SET bill_number='$bill_number', title='$title', date_filed='$date_filed', subject='$subject', sponsor='$sponsor', in_charge='$in_charge', updates='$updates', link='$link', center_of_participation='$center_of_participation' WHERE senatebill_id='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Bill Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-bills.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a bill with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-bills.php");
		}
	}

	// add_cd_btn
	if (isset($_POST['add_cd'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$title = $_POST['title'];
		
		$query = "INSERT INTO `cd` (emp_id, title) VALUES
		('$emp_id','$title')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "CD Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-cd.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a cd with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-cd.php");
		}
	}

	// edit_cd
	if (isset($_POST['edit_cd'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_cd'];
		$title = $_POST['title'];

		$query = "UPDATE `cd` SET title='$title' WHERE no_cd='$id'";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "CD Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-cd.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a cd with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-cd.php");
		}
	}

	// add_cd_admin
	if (isset($_POST['add_cd_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$title = $_POST['title'];
		
		$query = "INSERT INTO `cd` (emp_id, title) VALUES
		('$emp_id','$title')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "CD Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-cd.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a cd with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-cd.php");
		}
	}

	// edit_cd_admin
	if (isset($_POST['edit_cd_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_cd'];
		$title = $_POST['title'];

		$query = "UPDATE `cd` SET title='$title' WHERE no_cd='$id'";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "CD Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-cd.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a cd with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-cd.php");
		}
	}


	// add_document_btn
	if (isset($_POST['add_document'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		

		$query = "INSERT INTO `document` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Document Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-documents.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a document with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-documents.php");
		}
	}

	// edit_document
	if (isset($_POST['edit_doc'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_docu'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];

		$query = "UPDATE `document` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year' WHERE no_docu='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Document Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-documents.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a document with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-documents.php");
		}
	}

	// add_document_btn_admin
	if (isset($_POST['add_document_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		

		$query = "INSERT INTO `document` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Document Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-documents.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a document with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-documents.php");
		}
	}

	// edit_document_admin
	if (isset($_POST['edit_doc_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_docu'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];

		$query = "UPDATE `document` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year' WHERE no_docu='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Document Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-documents.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a document with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-documents.php");
		}
	}

	// add_journal_btn
	if (isset($_POST['add_journal'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		

		$query = "INSERT INTO `journal` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Journal Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-journals.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a journal with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-journals.php");
		}
	}

	// edit_journal
	if (isset($_POST['edit_journal'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_journal'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];

		$query = "UPDATE `journal` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year' WHERE no_journal='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Journal Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-journals.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a journal with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-journals.php");
		}
	}

	// add_journal_btn_admin
	if (isset($_POST['add_journal_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		

		$query = "INSERT INTO `journal` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Journal Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-journals.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a journal with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-journals.php");
		}
	}

	// edit_journal_admin
	if (isset($_POST['edit_journal_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_journal'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];

		$query = "UPDATE `journal` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year' WHERE no_journal='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Journal Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-journals.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a journal with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-journals.php");
		}
	}

	// add_thesis_btn
	if (isset($_POST['add_thesis'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		

		$query = "INSERT INTO `thesis` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Thesis Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-thesis.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a thesis with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-thesis.php");
		}
	}

	// edit_thesis
	if (isset($_POST['edit_thesis'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['thesis_no'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];

		$query = "UPDATE `thesis` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year' WHERE thesis_no='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Thesis Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-thesis.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a thesis with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-thesis.php");
		}
	}

	// add_thesis_btn_admin
	if (isset($_POST['add_thesis_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		

		$query = "INSERT INTO `thesis` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Thesis Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-thesis.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a thesis with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-thesis.php");
		}
	}

	// edit_thesis_admin
	if (isset($_POST['edit_thesis_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['thesis_no'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];

		$query = "UPDATE `thesis` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year' WHERE thesis_no='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Thesis Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-thesis.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a thesis with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-thesis.php");
		}
	}

	// add_magazine_btn
	if (isset($_POST['add_magazine'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$magazine_publisher = $_POST['magazine_publisher'];
		$magazine_title = $_POST['magazine_title'];
		$no_copies = $_POST['no_copies'];
		$author = $_POST['author'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$remarks = $_POST['remarks'];
		

		$query = "INSERT INTO `magazine` (emp_id, magazine_publisher, magazine_title, no_copies, author, month, year, remarks) VALUES
		('$emp_id', '$magazine_publisher', '$magazine_title', '$no_copies', '$author', '$month', '$year', '$remarks')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Magazine Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-magazines.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a magazine with the title of {$magazine_title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-magazines.php");
		}
	}

	// edit_magazine
	if (isset($_POST['edit_magazine'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_magazine'];
		$magazine_publisher = $_POST['magazine_publisher'];
		$magazine_title = $_POST['magazine_title'];
		$no_copies = $_POST['no_copies'];
		$author = $_POST['author'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$remarks = $_POST['remarks'];
		

		$query = "UPDATE `magazine` SET magazine_publisher='$magazine_publisher', magazine_title='$magazine_title', no_copies='$no_copies', author='$author', month='$month', year='$year', remarks='$remarks' WHERE no_magazine='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Magazine Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-magazines.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a magazine with the title of {$magazine_title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-magazines.php");
		}
	}

	// add_magazine_btn_admin
	if (isset($_POST['add_magazine_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$magazine_publisher = $_POST['magazine_publisher'];
		$magazine_title = $_POST['magazine_title'];
		$no_copies = $_POST['no_copies'];
		$author = $_POST['author'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$remarks = $_POST['remarks'];
		

		$query = "INSERT INTO `magazine` (emp_id, magazine_publisher, magazine_title, no_copies, author, month, year, remarks) VALUES
		('$emp_id', '$magazine_publisher', '$magazine_title', '$no_copies', '$author', '$month', '$year', '$remarks')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Magazine Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-magazines.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a magazine with the title of {$magazine_title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-magazines.php");
		}
	}

	// edit_magazine_admin
	if (isset($_POST['edit_magazine_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_magazine'];
		$magazine_publisher = $_POST['magazine_publisher'];
		$magazine_title = $_POST['magazine_title'];
		$no_copies = $_POST['no_copies'];
		$author = $_POST['author'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$remarks = $_POST['remarks'];
		

		$query = "UPDATE `magazine` SET magazine_publisher='$magazine_publisher', magazine_title='$magazine_title', no_copies='$no_copies', author='$author', month='$month', year='$year', remarks='$remarks' WHERE no_magazine='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Magazine Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-magazines.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a magazine with the title of {$magazine_title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-magazines.php");
		}
	}

	if (isset($_POST['edit_announcement_1'])){
		/*$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];

		//audit log saving
		$action_made = "Employee {$emp_id} edited an announcement.";
		$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
		$save = mysqli_query($db, $sql);*/
	}

	// add_book_btn
	if (isset($_POST['add_book'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		$remarks = $_POST['remarks'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];
		

		$query = "INSERT INTO `book` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year, remarks, category, isbn) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year', '$remarks', '$category', '$isbn')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Book Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-books.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a book with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-books.php");
		}
	}

		// edit_book
	if (isset($_POST['edit_book'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_book'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		$remarks = $_POST['remarks'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];

		$query = "UPDATE `book` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year', remarks='$remarks', category='$category', isbn='$isbn' WHERE no_book='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Book Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/librarian/view-books.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a book with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/librarian/view-books.php");
		}
	}

	// add_book_btn_admin
	if (isset($_POST['add_book_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$accession_no = $_POST['accession_no'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		$remarks = $_POST['remarks'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];
		

		$query = "INSERT INTO `book` (emp_id, accession_no, title, author, call_no, no_copies, copyright_year, remarks, category, isbn) VALUES
		('$emp_id', '$accession_no', '$title', '$author', '$call_no', '$no_copies', '$copyright_year', '$remarks', '$category', '$isbn')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Book Successfully Added!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-books.php");

			//audit log saving
			$action_made = "Employee {$emp_id} added a book with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-books.php");
		}
	}

		// edit_book_admin
	if (isset($_POST['edit_book_admin'])) {

		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$id = $_POST['no_book'];
		$title = $_POST['title'];
		$accession_no = $_POST['accession_no'];
		$author = $_POST['author'];
		$call_no = $_POST['call_no'];
		$no_copies = $_POST['no_copies'];
		$copyright_year = $_POST['copyright_year'];
		$remarks = $_POST['remarks'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];

		$query = "UPDATE `book` SET title='$title', accession_no='$accession_no', author='$author', call_no='$call_no', no_copies='$no_copies', copyright_year='$copyright_year', remarks='$remarks', category='$category', isbn='$isbn' WHERE no_book='$id'";
		
		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Book Record Successfully Updated!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-books.php");

			//audit log saving
			$action_made = "Employee {$currentUser} edited a book with the title of {$title}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$currentUser','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-books.php");
		}
	}

	// save announcement
	if (isset($_POST['save_announcement'])) {
		
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
		$emp_id = $_POST['emp_id'];
		$message = $_POST['message'];

		$query = "INSERT INTO `announcement` (emp_id, `message`) VALUES ('$emp_id','$message')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Annnouncement successfully made!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/admin-home.php");	

			//audit log saving
			$action_made = "Employee {$emp_id} created an announcement.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/admin-home.php");
		}
	}

	// add policy report
	if (isset($_POST['add_report'])) {
		
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');		
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		$policy_total = $_POST['policy_total'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		$query = "INSERT INTO `monthlypolicy` (emp_id, policy_total, month, year) VALUES ('$emp_id','$policy_total','$month','$year')";

		$query_run = mysqli_query($db, $query);
		if($query_run)
		{
			$_SESSION['status'] = "Policy Report successfully made!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/researcher/researcher-home.php");
			
			//audit log saving
			$action_made = "Employee {$emp_id} added the reports.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/researcher/researcher-home.php");
		}
	}


// del user
	if (isset($_POST['del_user'])) {
		
		$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');		
		$currentUser = $_SESSION['user']['emp_id'];
		$emp_id = $_POST['emp_id'];
		

		$sql = "DELETE FROM `user` WHERE emp_id='$id'"; 
		$sql_run = mysqli_query($db, $sql);


		
		if($sql_run)
		{
			$_SESSION['status'] = "Policy Report successfully made!";
			$_SESSION['status_code'] = 'success';
			header("location: ../public/admin/view-users.php");
			
			//audit log saving
			$action_made = "Employee {$currentUser} deleted Employee {$emp_id}.";
			$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
			$save = mysqli_query($db, $sql);
		}

		else{
			$_SESSION['status'] = "Oops.. Adding Failed!";
			$_SESSION['status_code'] = 'error';
			header("location: ../public/admin/view-users.php");
		}
	}

	