<?php
	include('db.php');
	session_start();
	// Показ сторінки, якщо id адміністратора = id користувача
	if(isset($_GET['id']) && isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id']) {
		// вихід з адмін панелі
	if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["exit"])) {
		session_unset();
		session_destroy();
		header("Location: index.php");
	}
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
				<div class="main-benefits">
					<div class="main-benefits__row">
						<?php 
							// SQL запит з JOIN
							$sql_card = "SELECT services.id, services.title, services_content.*
										FROM services
										JOIN services_content ON services.id = services_content.services_id";

							// Виконання запиту до бази даних
							$result_card = mysqli_query($conn, $sql_card);
							// Перевірка результату запиту
							if ($result_card) {
								// Обробка результатів запиту
								while ($row_card = mysqli_fetch_assoc($result_card)) {
									echo('<div class="main-benefits-card">
												<span class="main-benefits-card__counter"></span>
												<div class="main-benefits-card__content">
													<h3 class="title-size-5 main-benefits-card__title">' .$row_card["title"]. '</h3>
													<p class="main-benefits-card__text">' .$row_card["card_content"]. '</p><br>
													<p class="main-benefits-card__text">' .$row_card["slider_content"]. '</p>
												</div>
												<div class="main-benefits-card__edit">
													<a href="edit.php?id='. $_SESSION['id'] .'&content_id=' .$row_card["id"]. '&title_id=' .$row_card["id"]. '" class="btn-action">Редагувати</a>
													<a href="delete.php?id='. $_SESSION['id'] .'&content_id=' .$row_card["id"]. '&title_id=' .$row_card["id"]. '" class="btn-action-exit">Видалити</a>
											</div></div>');
								}
							} else {
								echo 'Помилка запиту: ' . mysqli_error($conn);
							}
						?>
					</div>
				</div>
				<section class="reviews">
					<h2 class="reviews__title">Відгуки клієнтів</h2>
					<div class="reviews__list">
						<?php
							// вивід відгуків наших клієнтів
							$sql_responses = 'SELECT * FROM responses';
							$result_responses = mysqli_query($conn, $sql_responses);
							if ($result_responses) {
								while($row_responses = mysqli_fetch_assoc($result_responses)) {
									echo('<div class="reviews__item">
											<div class="reviews__item-inner">
												<div class="reviews__item-edit">
													<a href="edit.php?id=' .$_SESSION["id"]. '&responses_id=' .$row_responses["id"]. '">Відредагувати</a>
													<a href="delete.php?id=' .$_SESSION["id"]. '&responses_id=' .$row_responses["id"]. '">Видалити відгук</a>
												</div>
												<div class="reviews__item-name">'.$row_responses["name"].'</div>
												<div class="reviews__item-text">'.$row_responses["content"].'</div>
											</div>
										</div>');
								}
							}
						?>
					</div>
				</section>
			</div>
		</div>

		<?php include('block/footer.php'); ?>

	</body>
</html>
<?php
	}
?>