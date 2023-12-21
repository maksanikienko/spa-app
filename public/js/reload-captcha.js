document.querySelectorAll('.captcha-form').forEach(function(form) {
    form.querySelector('.reload').addEventListener('click', function() {
        reloadCaptcha(form);
    });
});

function reloadCaptcha(form) {
    console.log("Before fetch");
    var captchaContainer = form.querySelector('.captcha-container');

    if (!captchaContainer) {
        console.error('Error: .captcha-container not found.');
        return;
    }
    //reload captcha
    fetch('/reload-captcha')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            captchaContainer.innerHTML = data.captcha;
        })
        .catch(error => console.error('Ошибка:', error));
}

