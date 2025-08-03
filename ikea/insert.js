document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form.ajax-form');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const data = new FormData(form);
            const actionUrl = form.getAttribute('action');

            fetch(actionUrl, {
                method: 'POST',
                body: data
            })
                .then(response => response.json())
                .then(json => {
                    const container = form.closest('.modal')?.querySelector('.modal-body') || form;
                    showAlert(container, json.success ? 'success' : 'danger', json.message);

                    if (json.success) {
                        form.reset();
                    }
                })
                .catch(() => {
                    showAlert(form, 'danger', 'Network error. Please try again.');
                });
        });
    });

    function showAlert(container, type, message) {
        container.querySelectorAll('.alert').forEach(el => el.remove());

        const alert = document.createElement('div');
        alert.className = `alert alert-${type} mt-2`;
        alert.textContent = message;
        container.prepend(alert);
    }
});

