

window.addEventListener('DOMContentLoaded', event => {
    // Initialize all tables with class 'datatable'
    document.querySelectorAll('.datatable').forEach((table) => {
        new simpleDatatables.DataTable(table);
    });
});


