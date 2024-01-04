function showDeleteModal(commentId) {
    var modal = document.getElementById('deleteModal' + commentId);
    modal.style.display = 'block';
}

function hideDeleteModal(commentId) {
    var modal = document.getElementById('deleteModal' + commentId);
    modal.style.display = 'none';
}

function confirmDelete(commentId) {
    document.getElementById('deleteForm' + commentId).submit();
}

window.showDeleteModal = showDeleteModal;
window.hideDeleteModal = hideDeleteModal;
window.confirmDelete = confirmDelete;
