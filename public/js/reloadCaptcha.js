document.querySelectorAll('.captcha-form').forEach(function(form) {
    form.querySelector('.reload').addEventListener('click', function() {
        reloadCaptcha(form);
    });
});

function reloadCaptcha(form) {
    var captchaContainer = form.querySelector('.captcha-container');

    fetch('/reload-captcha')
        .then(response => response.json())
        .then(data => {
            captchaContainer.innerHTML = data.captcha;
        })
        .catch(error => console.error('Ошибка:', error));
}
