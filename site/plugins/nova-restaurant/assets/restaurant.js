//doc loaded
window.addEventListener('load', function () {
    // Popover
    Array.from(document.querySelectorAll("[data-bs-toggle='popover']")).forEach(element => {
        var popover = new bootstrap.Popover(element);
    });
}, false);