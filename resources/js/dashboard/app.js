document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('[data-drawer-toggle="default-sidebar"]');
    const sidebar = document.getElementById('default-sidebar');

    // Toggle sidebar
    button.addEventListener('click', function() {
        sidebar.classList.toggle('-translate-x-full');
    });

    // Close sidebar when clicking outside
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !button.contains(event.target)) {
            sidebar.classList.add('-translate-x-full');
        }
    });
});