<?php
	include('db.php');
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["content_id"])) {
		$content_id = $_GET["content_id"];
		$title = $_POST["title"];
		$title_id = $_GET["title_id"];
		$card_content = $_POST["card_content"];
		$slider_content = $_POST["slider_content"];
		$sql_services_content = "UPDATE `services_content` SET `card_content`='" . $card_content . "', `slider_content`='" .$slider_content. "' WHERE `id`='" . $content_id . "'";
		$sql_services = "UPDATE `services` SET `title`='" . $title . "' WHERE `id`='" . $title_id . "'";
		if (mysqli_query($conn, $sql_services_content) && mysqli_query($conn, $sql_services)) {
		  header("Location: admin.php?id=" . $_SESSION['id']); // Перехід на сторінку admin.php
		} else {
		  echo "Помилка оновлення: " . mysqli_error($conn);
		}	
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["responses_id"])) {
		$responses_id = $_GET["responses_id"];
		$content = $_POST["content"];
		$name = $_POST["name"];
		$sql = "UPDATE `responses` SET `name`='" . $name . "', `content`='" .$content. "' WHERE `id`='" . $responses_id . "'";
		if (mysqli_query($conn, $sql)) {
		  header("Location: admin.php?id=" . $_SESSION['id']); // Перехід на сторінку admin.php
		} else {
		  echo "Помилка оновлення: " . mysqli_error($conn);
		}	
	}
// Відображення сторінки якщо id адміністратора дорвінює id користувача
	if($_GET['id'] == $_SESSION['id'] && isset($_GET["content_id"])) {
?>
<!DOCTYPE html>
<html lang="uk">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, user-scalable=0">
		<meta name="description" content="Інтернет-провайдер Кібервітер">
		<title>Інтернет-провайдер Кібервітер</title>
		<link href="style/style.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper main-wrapper">
			<a href="admin.php?id=<?php echo($_SESSION['id']); ?>&exit=true" class="btn-action-exit">Exit</a>
			<div class="main">
				<div class="admin-edit">
					<?php 
						// SQL запит з JOIN
						$sql_edit = "SELECT t1.id, t1.title, t2.slider_content, t2.card_content
							        FROM services t1
							        JOIN services_content t2 ON t1.id = t2.services_id
							        WHERE t1.id = '" . $_GET["content_id"] . "'";
					
						// Виконання запиту до бази даних
						$result_edit = mysqli_query($conn, $sql_edit);
						// Перевірка результату запиту
						if ($result_edit) {
						    // Обробка результатів запиту
						    while ($row_edit = mysqli_fetch_assoc($result_edit)) {
						    	echo('<form action="edit.php?id=' .$_SESSION['id']. '&content_id=' .$_GET["content_id"]. '&title_id=' .$_GET["title_id"]. '" method="POST">
										<input name="title" class="input-text" value="' .$row_edit["title"]. '" required>
										<textarea name="card_content" class="input-text input-text--textarea" value="" required>' .$row_edit["card_content"]. '</textarea>
										<textarea name="slider_content" class="input-text input-text--textarea" value="" required>' .$row_edit["slider_content"]. '</textarea>
										<input type="submit" class="btn" value="Відправити">
									</form>');
						    }
						} else {
						    echo 'Помилка запиту: ' . mysqli_error($conn);
						}
					?>
				</div>
			</div>
		</div>

		<?php include('block/footer.php'); ?>

	</body>
</html>

<?php		
}
if($_GET['id'] == $_SESSION['id'] && isset($_GET["responses_id"])) {
?>

<!DOCTYPE html>
<html lang="uk">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, user-scalable=0">
		<meta name="description" content="Інтернет-провайдер Кібервітер">
		<title>Інтернет-провайдер Кібервітер</title>
		<link href="style/style.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper main-wrapper">
			<a href="admin.php?id=<?php echo($_SESSION['id']); ?>&exit=true" class="btn-action-exit">Exit</a>
			<div class="main">
				<div class="admin-edit">
					<?php 
					// SQL запит з JOIN
						$sql_edit = 'SELECT * FROM responses WHERE id="' .$_GET["responses_id"]. '"';
						// Виконання запиту до бази даних
						$result_edit = mysqli_query($conn, $sql_edit);
						// Перевірка результату запиту
						if ($result_edit) {
						    // Обробка результатів запиту
						    while ($row_edit = mysqli_fetch_assoc($result_edit)) {
						    	echo('<form action="edit.php?id=' .$_SESSION['id']. '&responses_id=' .$_GET["responses_id"]. '" method="POST">
										<input name="name" class="input-text" value="' .$row_edit["name"]. '" required>
										<textarea name="content" class="input-text input-text--textarea" value="" required>' .$row_edit["content"]. '</textarea>
										<input type="submit" class="btn" value="Відправити">
									</form>');
						    }
						} else {
						    echo 'Помилка запиту: ' . mysqli_error($conn);
						}
					?>
				</div>
			</div>
		</div>

		<?php include('block/footer.php'); ?>

	</body>
</html>
<?php
}
?>