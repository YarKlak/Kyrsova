<footer class="footer">
	<div class="wrapper footer__wrapper">
		<div class="header__col-brand">
			<a href="/" class="header__logo">Кібервітер</a>
			<ul class="footer__nav">
				<li>
					<a href="tel:+380502007720">050 200 77 20</a>
				</li>
				<li>
					<a href="tel:kiberviter@gmail.com">kiberviter@gmail.com</a>
				</li>
			</ul>
		</div>
		<ul class="footer__nav">
			<li>
				<a href="internet.php">Інтернет</a>
			</li>
			<li>
				<a href="virtual-pbx.php">Віртуальна АТС</a>
			</li>
			<li>
				<a href="contacts.php">Контакти</a>
			</li>
		</ul>
		<div class="footer__copyright">© 1996-2023</div>
	</div>
</footer>

<div class="modal">
	<div class="modal__center">
		<div class="modal-toggle modal__close">
			<img src="images/close.svg">
		</div>
		<form action="mail.php" method="POST" class="modal__form">
			<div class="modal__title">Замовити підключення</div>
			<input type="text" name="name" class="input-text modal__input" placeholder="Ім'я">
			<input type="number" name="tel" required class="input-text modal__input" placeholder="Телефон">
			<input type="text" name="address" class="input-text modal__input" placeholder="Бажана адреса підключення">
			<button type="submit" class="btn modal__btn">Відправити</button>
		</form>
		<div class="modal__thanks">
			<div class="modal__title">Дякуємо, заявка на підключення прийнята.<b>Наш менеджер зв'яжеться з вами.</div>
		</div>
	</div>
</div>

<div>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</div>