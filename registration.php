<?php 
	session_start();
	if (isset($_SESSION['user_data'])) {
		header("location:chat_application.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<style>
		h1{
			background: #0084ff;
			color: #f7f7f7;
			padding: 15px;
			width: 450px;
			box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.4);
		}
		fieldset{
			width: 450px;
			color: #f7f7f7;
			background: #0084ff;
			box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.4);
			border: none;
		}
		legend{
			background: #f7f7f7;
			color:#0084ff;
			padding: 5px 10px;
			border: 1px solid #0084ff;
		}
		span{
			color: orangered;
		}
		table{
			width: 100%;
			text-align: left;
		}
		.show_table{
			width: 550px;
			text-align: left;
			color: #f7f7f7;
			background: #0084ff;
			padding: 10px;
		}

		table tr > td > div{
			width: 100%;
		}
		table tr > td > div >input{
			width: 98%;
			color: #0084ff;
			height: 25px;
			border-radius: 4px;
			border: none;

		}
		select{
			background: #0084ff;
			color: #f7f7f7;
			width: 100%;
			height: 35px;
			border-radius: 4px;
			border: 1px solid #f7f7f7;;
		}
		.btns input{
			border-radius: 4px;
			color: #f7f7f7;
			background: #0084ff;
			padding: 8px;
			border: none;
			border: 1px solid #f7f7f7;
			cursor: pointer;

		}
		a{
			color: #0084ff;
		}
	</style>
</head>
<body>
	<center>
		<h1>
			REGISTRATION FORM
		</h1>
		<p style="color:<?= $_GET['color']??"";?>;">
			<?= $_GET['msg']??"";?>
		</p>
		<fieldset>
			<legend>
				REGISTER NOW
			</legend>
			<form action="process.php" enctype="multipart/form-data" method="POST">
				<table cellspacing="10">
					<tr>
						<th>First Name </th>
						<td>
							<div>
								<input type="text" name="first_name" id="first_name" required placeholder="Enter First Name">
							</div>
						</td>
					</tr>
					<tr>
						<th>Last Name </th>
						<td>
							<div>
								<input type="text" name="last_name" id="last_name" required placeholder="Enter Last Name">
							</div>
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>
							<div>
								<input type="Email" name="email" id="email" required placeholder="Enter Email ">
							</div>
						</td>
					</tr>
					<tr>
						<th>Phone Number </th>
						<td>
							<div>
								<input type="text" name="phone_number" id="phone_number" required placeholder="Enter Phone Number">
							</div>
						</td>
					</tr>
					<tr>
						<th>Country </th>
						<td>
							<div>
								<select name="country" id="country">
									<option value="">----SELECT OPTION---</option>
									<option value="PAK">Pak</option>
									<option value="USA">USA</option>
									<option value="IND">IND</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<th>Gender </th>
						<td>
							<div>
								<div>
									Male <input type="radio" name="gender" value="Male" checked>
									Female <input type="radio" name="gender" value="Female">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Profile Image 
						</th>
						<td>
							<input type="file" name="profile_image" accept="images/*" required>
						</td>
					</tr>
					<tr>
						<th>Password </th>
						<td>
							<div>
								<input type="Password" name="password" required placeholder="Enter Password">
							</div>
						</td>
					</tr>
					<tr>
						<td align="right" colspan="2" class="btns">
							<input type="submit" name="register" value="Register">
							<input type="reset" name="cancel" value="cancel">
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
		<p>Have Already Account ? <a href="index.php">Login Here</a></p>
	</center>
</body>
</html>