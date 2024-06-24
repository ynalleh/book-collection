// scripts.js

document.addEventListener('DOMContentLoaded', function() {
    const actionButtons = document.querySelectorAll('.action-button');

    actionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const actions = this.nextElementSibling;
            actions.classList.toggle('show');
        });
    });
});
