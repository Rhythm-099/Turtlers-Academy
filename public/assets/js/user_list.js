function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this user? This cannot be undone.")) {
        window.location.href = "../../controllers/userController.php?action=delete&id=" + id;
    }
}
