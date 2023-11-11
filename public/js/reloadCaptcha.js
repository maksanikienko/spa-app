// При клике на кнопку перезагрузки
document.getElementById('reload').addEventListener('click', function () {
    reloadCaptcha();
});

function reloadCaptcha() {
    var captchaContainer = document.getElementById('captcha-container');
    
        // Отправляем запрос на сервер для получения новой картинки Captcha
        fetch('/reload-captcha')
            .then(response => response.json())
            .then(data => {
                // Заменяем содержимое контейнера новой картинкой Captcha
                captchaContainer.innerHTML = data.captcha;
            })
            .catch(error => console.error('Ошибка:', error));
    
}
