<?php include('db.php'); 
	// вхід адміністратора у систему
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$sql = "SELECT `id`, `user_name`, `password` FROM `users` WHERE `user_name`='" .$username . "'";
		$result = mysqli_query($conn, $sql);
		while($result_array = mysqli_fetch_assoc($result)) {
			// перевірка паролю
			if ($result_array["password"] == $password){
				// запуск сесії
				session_start();
				// збереження інформації про користувача у сесії
				$_SESSION["id"] = $result_array["id"];
				// перенаправлення на сторінку адміністратора
				header("Location: admin.php?id=" . $result_array["id"]);
			}
		}		
	}

?>


<form action="login.php" method="POST">
  <input type="text" name="username" placeholder="Ім'я користувача" required>
  <input type="password" name="password" placeholder="Пароль" required>
  <input type="submit" value="Увійти">
</form>