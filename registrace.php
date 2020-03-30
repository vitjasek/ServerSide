<?php 
if (isset($_POST['signup-submit'])) {

  // require 'kitlab_db.php'; // connect to db

	$conn = mysqli_connect('localhost', 'root', '','anone');

//fetch things from the form
  $username = $_POST['username'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

//checks if all the fields are filled correctly
  if(empty($username) || empty($email) || empty($password) || empty($password) || empty($passwordRepeat)){
  	header("location: login.php?error=emptyfields&username=".$username."&mail=".$email);
  	exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	header("location: login.php?error=emptyfields&username=".$username);
  	exit();
  }elseif ($password != $passwordRepeat) {
	header("location: login.php?error=emptyfields&username=".$username."&mail=".$email);
	exit();
  } else {
  	$SELECT = "SELECT login FROM uzivatel WHERE login = ? OR email = ? Limit 1";
  	$INSERT = "INSERT INTO uzivatel (login, heslo, email) VALUES(?,?,?)";
  	
    if($stmt = $conn->prepare($SELECT)){
      $stmt->bind_param("ss", $username, $email);
      $stmt->execute();
      
      $stmt->bind_result($username);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
    }else{
      header("location: login.php?db=error");
      exit();
    }
  	

	if($rnum==0){
    $stmt->close();

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("sss", $username, $hashedPwd, $email);
		$stmt->execute();

    header("location: login.php?signup=success");
    exit();
	} else {
    header("location: login.php?signup=useralreadyexists");
    exit();
  }


    mysqli_close($conn);
  }
  

  
} else {
  header("location: login.php");
}
