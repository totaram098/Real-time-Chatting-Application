<?php 	
	require_once('require/database.php');
	session_start();
	if (isset($_POST['register'])) {
		extract($_POST);
		$img_orginal_name = $_FILES['profile_image']['name'];
		$img_temp_name = $_FILES['profile_image']['tmp_name'];
		$destination_path = "images";
		if(!is_dir($destination_path)){
			mkdir($destination_path);
		}
		$destination_path .= "/".date("d_m_Y_h_m_i")."_".$img_orginal_name;
		$destination_path = htmlspecialchars($destination_path);
		if (move_uploaded_file($img_temp_name, $destination_path)) {
			$query = "INSERT INTO users VALUES (null,'{$first_name}','{$last_name}','{$email}','{$phone_number}','{$country}','{$gender}','{$destination_path}','{$password}',false)";
			$result = $database->execute_query($query);
			if($result){
				header("location:registration.php?msg=You Have been Registered Successfully..!&color=seagreen");
			}else{
				unlink($destination_path);
				header("location:registration.php?msg=Registration Failed..!&color=orangered");
			}
		}
		
	}elseif(isset($_POST['login'])){
		extract($_POST);
		$query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
		$result = $database->execute_query($query);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_data'] = $row;
			$query = "UPDATE users SET is_online = 1 WHERE user_id = '{$row['user_id']}'";
			$database->execute_query($query);
			header("location:chat_application.php");
		}else{
			header("location:index.php?msg=Invalid Email/Password&color=orangered");
		}

	}
?>