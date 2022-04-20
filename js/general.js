function showSnackbar(message, type) {
    const snackbar = document.getElementById("snackbar");
    snackbar.innerText = message;
    snackbar.className = "snackbar snackbar-".concat(type);
    setTimeout(() => {
        snackbar.className = "snackbar snackbar-close"
    }, 180);
    return
}