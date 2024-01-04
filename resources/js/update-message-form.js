document.addEventListener("DOMContentLoaded", function() {
    var forms = document.querySelectorAll('.update-form');
    forms.forEach(function(form) {
        form.style.display = 'none';
    });
});

function toggleUpdateForm(commentId) {
    var form = document.getElementById('updateForm' + commentId);
    form.style.display = (form.style.display === 'block') ? 'none' : 'block';
}
window.toggleUpdateForm = toggleUpdateForm;
