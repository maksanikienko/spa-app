import './bootstrap.js';


// функция для обновления капчи
const refreshCaptcha = (target) => {
    const captchaImage = target.closest('.captcha__image-reload').querySelector('.captcha__image');
    captchaImage.src = '/public/php/captcha.php?r=' + new Date().getUTCMilliseconds();
  }
  // получение кнопки для обновления капчи
  const captchaBtn = document.querySelector('.captcha__refresh');
  // запуск функции refreshCaptcha при нажатии на кнопку
  captchaBtn.addEventListener('click', (e) => refreshCaptcha(e.target));