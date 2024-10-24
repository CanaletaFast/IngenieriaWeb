// Archivo JavaScript externo para añadir interactividad a la página

// Espera a que el contenido del DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Ejemplo de código JavaScript que muestra un mensaje de bienvenida en la consola
    console.log('Bienvenido al curso de Ingeniería Web');

    // Seleccionar el formulario de contacto
    const contactForm = document.getElementById('contactForm');

    // Añadir un evento de envío al formulario
    contactForm.addEventListener('submit', function(event) {
        // Prevenir el comportamiento por defecto del formulario
        event.preventDefault();

        // Validación básica de los campos
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();

        if (name === '' || email === '') {
            // Mostrar mensaje de error si los campos están vacíos
            displayMessage('Por favor, completa todos los campos.', 'error');
            return;
        }

        // Validar el formato del email usando una expresión regular
        if (!validateEmail(email)) {
            displayMessage('Por favor, introduce un correo electrónico válido.', 'error');
            return;
        }

        // Crear un objeto FormData para enviar los datos
        const formData = new FormData(contactForm);

        // Enviar los datos al servidor usando Fetch API
        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Verificar la respuesta del servidor
            if (data.success) {
                displayMessage('¡Formulario enviado exitosamente!', 'success');
                // Limpiar el formulario
                contactForm.reset();
            } else {
                displayMessage('Hubo un error al enviar el formulario. Inténtalo de nuevo.', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            displayMessage('Error de conexión. Inténtalo de nuevo más tarde.', 'error');
        });
    });

    // Función para mostrar mensajes al usuario
    function displayMessage(message, type) {
        const formMessage = document.getElementById('formMessage');
        formMessage.textContent = message;
        formMessage.style.color = (type === 'success') ? 'green' : 'red';
    }

    // Función para validar el formato del email
    function validateEmail(email) {
        // Expresión regular básica para validar emails
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
