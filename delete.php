<?php
	session_start();
	include('db.php');
	// Перевірка підключення
	if (!$conn) {
	  die('Connection failed: ' . mysqli_connect_error());
	}
	if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["responses_id"])) {
		$sql = "DELETE FROM `responses` WHERE id='" . $_GET['responses_id'] . "'"; 
		$result = mysqli_query($conn, $sql);
		if($result) {
			header("Location: admin.php?id=" . $_SESSION['id']);
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["content_id"]) && isset($_GET["title_id"])) {
		$sql_services_content = "DELETE FROM `services_content` WHERE id='" . $_GET['content_id'] . "'"; 
		$sql_services = "DELETE FROM `services` WHERE id='" . $_GET['title_id'] . "'"; 
		$result_services_content = mysqli_query($conn, $sql_services_content);
		$result_services = mysqli_query($conn, $sql_services);
		if($result_services_content && $sql_services) {
			header("Location: admin.php?id=" . $_SESSION['id']);
		}
	}
	
?>