const form = document.querySelector('.modal__form');
const modalEL = document.querySelector('.modal');
const modalThanks = document.querySelector('.modal__thanks');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    fetch('mail.php', {
        method: 'POST',
        body: formData
    }).then((response) => {
        form.classList.add('is-hide');
        modalThanks.classList.add('is-show');
    }).catch((error) => {
        console.error('Сталася помилка при відправці даних з форми: ', error);
    });
});

$(document).ready(function() {
  $('.main-slider').slick({
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    arrows: false,
    infinite: true,
    dots: true
  });

  $('.modal-toggle').on('click', function (e) {
    $('body').toggleClass('is-hidden');
    $('.modal').toggleClass('is-show');
    e.preventDefault();
  });

  $('.modal__close').on('click', function (e) {
    $('.modal__form').removeClass('is-hide');
    $('.modal__thanks').removeClass('is-show');
    e.preventDefault();
  });

  $('.header__toggle').on('click', function (e) {
    $('body').toggleClass('is-menu-mobile-open');
    e.preventDefault();
  });
});