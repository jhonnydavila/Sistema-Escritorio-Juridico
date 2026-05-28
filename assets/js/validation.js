document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form");
    if (!form) return;

    const submitBtn = form.querySelector('button[type="submit"]');
    
    const inputs = form.querySelectorAll(".form-control");

    // Función para validar un input individual y cambiar sus estilos
    function validarInput(input) {
        // Ignoramos inputs ocultos
        if (input.hasAttribute("hidden") || input.type === "hidden") return true;

        // checkValidity() evalúa de forma nativa required, pattern, minlength, etc.
        if (input.checkValidity()) {
            input.classList.remove("is-invalid");
            input.classList.add("is-valid");
            return true;
        } else {
            if (input.value.trim() !== "" || input.hasAttribute("required")) {
                input.classList.remove("is-valid");
                input.classList.add("is-invalid");
            }
            return false;
        }
    }

    // Función para revisar todo el formulario y activar/desactivar el botón
    function validarFormulario() {
        let formValido = true;

        inputs.forEach(input => {
            if (input.hasAttribute("hidden") || input.type === "hidden") return;
            
            if (!input.checkValidity()) {
                formValido = false;
            }
        });

        // Bloquear o desbloquear el botón de enviar
        if (formValido) {
            submitBtn.removeAttribute("disabled");
            submitBtn.style.opacity = "1";
            submitBtn.style.cursor = "pointer";
        } else {
            submitBtn.setAttribute("disabled", "true");
            submitBtn.style.opacity = "0.9";
            submitBtn.style.cursor = "not-allowed";
        }
    }

    inputs.forEach(input => {
        input.addEventListener("input", () => {
            validarInput(input);
            validarFormulario();
        });

        input.addEventListener("blur", () => {
            validarInput(input);
            validarFormulario();
        });
    });
    validarFormulario();
});