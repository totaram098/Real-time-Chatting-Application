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
	<title>Login Form</title>
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
			border: 1px solid #0084ff;
			background: #f7f7f7;
			color:#0084ff;
			padding: 5px 10px;
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
			LOGIN FORM
		</h1>
		<p style="color:<?= $_GET['color']??"";?>;">
			<?= $_GET['msg']??"";?>
		</p>
		<fieldset>
			<legend>
				LOGIN NOW
			</legend>
			<form action="process.php" enctype="multipart/form-data" method="POST">
				<table cellspacing="10">
					
					<tr>
						<th>Email</th>
						<td>
							<div>
								<input type="Email" name="email" id="email" required>
							</div>
						</td>
					</tr>
					
					<tr>
						<th>Password</th>
						<td>
							<div>
								<input type="Password" name="password"  required>
							</div>
						</td>
					</tr>
					
					<tr>
						<td align="right" colspan="2" class="btns">
							<input type="submit" name="login" value="Login">
							<input type="reset" name="cancel" value="cancel">
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
		<p>Don`t Have Already Account ? <a href="registration.php">Register Here</a></p>

	</center>
</body>
</html>