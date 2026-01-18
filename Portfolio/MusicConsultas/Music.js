document.getElementById('consultaTipo').addEventListener('change', function() {
    document.querySelectorAll('form').forEach(function(form) {
        form.classList.add('hidden');
    });

    var selectedOption = this.value;
    var formId = 'form' + selectedOption.charAt(0).toUpperCase() + selectedOption.slice(1);
    document.getElementById(formId).classList.remove('hidden');
    scrollToForm(formId);
});

function toggleForm(formId) {
    var form = document.getElementById(formId);
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';

    if (form.style.display === 'block') {
        scrollToForm(formId);
    }
}

function scrollToForm(formId) {
    var form = document.getElementById(formId);
    form.scrollIntoView({ behavior: 'smooth' });
}

window.addEventListener('load', function() {
    toggleForm('formTodosContainer');
});

const inputs = document.querySelectorAll('form input[required]');
