<?php 
if (isset($_POST['login-submit'])) {
	$conn = mysqli_connect('localhost', 'root', '','anone');

	$username = $_POST['username'];
	$password = $_POST['password'];

	
	if(empty($username) || empty($password)){
		header("location: login.php?error=emptyfields");
		exit();
	} else {
			$sql = "SELECT userid, login, heslo FROM uzivatel WHERE login =? OR email =? LIMIT 1";
			if($stmt = mysqli_prepare($conn, $sql)){
				mysqli_stmt_bind_param($stmt, "ss", $username, $username);

				if(mysqli_stmt_execute($stmt)){

					 mysqli_stmt_store_result($stmt);

					 if(mysqli_stmt_num_rows($stmt) == 1){
					 	mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
					 }else{
                       header("location: login.php?user=nouser"); 
                       exit();   
                     }
					 if(mysqli_stmt_fetch($stmt)){
					 	
					 	if(password_verify($password, $hashed_password)){
	   						session_start();
	   						$_SESSION["loggedin"] = true;
	                        $_SESSION["id"] = $id;
	                        $_SESSION["username"] = $username;
	                        header("location: index.php?login=sucess");
					 	}else{
						 	echo "ERROR wrong password";
						 	header("location: login.php?error=wrongpassword");
						 	exit();
						}

					}
			}else{
		  		header("location: login.php?error=dbsql");
     			exit();
		  	}

        }else{
	       header("location login.php?error=dbcon");
	       exit();
        }                
    } 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);     
}