<?php 
	session_start();
	extract($_SESSION['user_data']);
	require_once('require/database.php');
	extract($_REQUEST);
	if (isset($action) && $action == "get_all_messages") {
		$query = "SELECT * FROM messages m  JOIN users  USING(user_id) ORDER BY m.message_id DESC";
		$result = $database->execute_query($query);
		if ($result->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$float = ($user_id == $row['user_id'])?"right":"left";
				$span_float = ($float=="left")?"right":"left";
				?>
				<div class="message" style="float:<?= $float ?>">
						<?php
							if ($float=="left"):
						?>		
								<div class="profile_box">
									<img src="<?= $row['profile_image'] ?>">
								</div>
						<?php		
							endif;
						?>
						<div class="message_text">
							<h4>
								<?= $row['first_name']." ".$row['last_name'] ?>
							</h4>
							<p>
								<?= $row['message'] ?>
							</p>
							<span style="float:<?= $span_float ?>;"><?= date("d-m-Y H:i:s A",strtotime($row['message_time'])) ?></span>
						</div>

						<?php
							if ($float=="right"):
						?>		
								<div class="profile_box">
									<img src="<?= $row['profile_image'] ?>">
								</div>
						<?php		
							endif;
						?>
					</div>
				<?php
			}
		}else{
			echo "<p style='text-align:center;'>No Messages</p>";
		}
	}
	elseif(isset($action) && $action == "get_all_users"){
		$query  = "SELECT * FROM users WHERE user_id != '{$user_id}' ORDER BY is_online DESC";
		$result = $database->execute_query($query);
		if ($result->num_rows > 0) {
			while($row = mysqli_fetch_assoc($result)):
				$is_active = ($row["is_online"])?"active_user":"inactive_user";
			?>
			 	<table cellspacing="5" class="user">
					<tr align="center">
						<td>
							<img src="<?= $row['profile_image']; ?>">
						</td>
						<td style="width:80%;color: #0084ff;text-align: left;padding-left: 10px;">
							<h5><?= $row['first_name']." ".$row['last_name']; ?></h5>
						</td>
						<td>
							<h1 class="<?= $is_active; ?>">.</h1>
						</td>
					</tr>
				</table>
			<?php
			endwhile;
		}else{
			echo "<p>There No Any Other User..!</p>";
		} 
	}
	elseif(isset($action) && $action == "send_message"){
		$message = htmlspecialchars($message);
		$query = "INSERT INTO messages VALUES(null,'{$user_id}','{$message}',NOW())";
		$result = $database->execute_query($query);
		if ($result) {
			echo "<p style='color:#25d366'>Message Sent Successfully...!</p>";
		}else{
			echo "<p style='color:#d9534f'>Something Went Wrong Please Try Again...!</p>";
		}

	}
?>