 // JavaScript для отображения и скрытия формы ответа по нажатию кнопки "Reply"
 document.querySelectorAll('.reply-btn').forEach(function(replyBtn) {
    replyBtn.addEventListener('click', function() {
        var commentId = this.getAttribute('data-comment-id');
        var replyForm = document.querySelector('.reply-form[data-comment-id="' + commentId + '"]');

        // Переключение отображения формы ответа для выбранного комментария
        if (replyForm.style.display === 'none' || replyForm.style.display === '') {
            // Если форма скрыта, показать ее
            replyForm.style.display = 'block';
        } else {
            // Если форма отображается, скрыть ее
            replyForm.style.display = 'none';
        }
    });
});