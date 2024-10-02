<?php 
	session_start();
	if (!(isset($_SESSION['user_data']))) {
		header("location:index.php?msg=Please Login First..!&color=orangered");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Group Chat Application</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		.header{
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
			color: #0084ff;
			border-bottom: 1px solid #0084ff;
		}

		.header a{
			background: #0084ff;
			color: #f7f7f7;
			border-radius: 5px;
			text-decoration: none;
			border: 1px solid #0084ff;
			padding: 6px;
			font-size: 15px;
		}
		.border{
			border: 1px solid #0084ff;
		}
		h1{
			padding: 10px;
			color: #0084ff;
		}
		.user_box h3{
			padding: 10px;
			color:#0084ff;
			border-bottom: 1px solid #0084ff;

		}
		.container{
			display: flex;
			width: 1000px;
			height: 700px;
			margin: auto;
			border-radius:20px 20px 0 0;
		}
		.message_box{
			width: 70%;
		}
		.user_box{
			border-left: 1px solid #0084ff;
			width: 30%;
		}
		#all_users{
			height: 94%;
			overflow-y: scroll;
			-ms-overflow-style: none; 
			scrollbar-width: none; 
		}
		#all_messages{
			height: 89%;
			overflow-y: scroll;
			border-bottom: 1px solid #0084ff;
			-ms-overflow-style: none; 
			scrollbar-width: none;
		}
		.message{
			width: 87%;
			display: flex;
			background: #0084ff;
			color:#f7f7f7;
			margin: 5px;
			border-radius: 10px;
/*			text-align: right;*/
		}
		img{
			width: 40px;
			height: 40px;
			border-radius: 50px;
		}
		.profile_box{
			width: 10%;
			text-align: center;
			padding: 10px;
		}
		.message_text{
			width: 90%;
			padding: 10px;
		}
		p{
			padding: 6px;
		}
		span{
			color:lightgray;
			padding: 6px;
		}
		h4{
			color:#dcf8c6;
			margin: 6px;
			padding-bottom: 6px;
			border-bottom: 1px solid lightgray;
		}
		.send_message_div{
			position: relative;
			align-content: center;
		}
		button{
			height: 33px;
			width: 12%;
			margin-left: 7px;
			position: absolute;
			top: 0;
			background: #f7f7f7;
			border: 1px solid #0084ff;
			color:#0084ff;
		}
		.user{
			border-radius: 5px;
			margin: 5px;
			border: 1px solid #0084ff;
		}
		.active_user{
			color: #25D366;
			font-size: 80px;
			padding: 0;
			margin-top: -40px;
		}
		.inactive_user{
			color: lightgray;
			font-size: 80px;
			padding: 0;
			margin-top: -40px;
		}
		textarea{
			border: none;
			padding-left: 2px;
			color:#332D2D;
			width: 87%;
		}
		textarea:focus{
			outline: none;

		}
		.alertBox,.disappear{
			position: fixed;
			width: fit-content;
			border-radius: 10px;
			top: 15px;
			right: 10px;
			padding: 10px;
			background: white;
			border: 1px solid lightgray;
			box-shadow: 5px 5px 5px lightgray;
			animation: alertBox;
			animation-duration: 2s;
			animation-iteration-count: one;
		}
		.disappear{
			top: -200px;
			animation: disappear;
			animation-duration: 2s;
			animation-iteration-count: one;
		}
		@keyframes alertBox {
			from{
				top: -50px;
			}
			to{
				top: 15px;
			}
		}
		@keyframes disappear {
			from{
				top:15px;
			}
			to{
				top: -200px;
			}
		}
	</style>
</head>
<body>
	<!-- <center> -->
		<h1 align="center">GROUP CHAT APPLICATION</h1>
		<div class="container border">
			<div class="message_box">
				<div class="header">
					<h3>GROUP CHAT</h3>
					<div>
						<?= $_SESSION['user_data']['first_name']." ".$_SESSION['user_data']['last_name']?> &nbsp;&nbsp;
						<a href="logout.php">LOGOUT</a>
					</div>
				</div>
				<div id="all_messages" class="">
				</div>
				<div class="send_message_div">
					<textarea id="message" rows="2" cols="84"></textarea>
					<button onclick="send_message()">SEND</button>
				</div>
			</div>
			<div class="user_box">
				<h3>USERS</h3>
				<div id="all_users">
					
				</div>
			</div>
		</div>
		<div id="alertBox">
		</div>
	<!-- </center> -->
</body>
<script>
	get_all_messages();
	setInterval("get_all_messages()",1000);
	setInterval("get_all_users()",4000);
	function get_all_messages(){
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange =  function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.querySelector("#all_messages").innerHTML = xhr.responseText;
			}
		}
		xhr.open("GET","chat_process.php?action=get_all_messages");
		xhr.send();
	}
	get_all_users();
	function get_all_users(){
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange =  function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.querySelector("#all_users").innerHTML = xhr.responseText;
			}
		}
		xhr.open("GET","chat_process.php?action=get_all_users");
		xhr.send();
	}

	function send_message(){
		message = document.querySelector("#message").value;
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange =  function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.querySelector("#alertBox").innerHTML = xhr.responseText;
				document.querySelector("#message").value = "";
				get_all_messages();
				document.querySelector("#alertBox").setAttribute("class","alertBox");
				setTimeout(function() {
					document.querySelector("#alertBox").setAttribute("class","");
					document.querySelector("#alertBox").setAttribute("class","disappear");
				}, 10000);
			}
		}
		xhr.open("GET","chat_process.php?action=send_message&message="+message);
		xhr.send();
	}
</script>
</html>