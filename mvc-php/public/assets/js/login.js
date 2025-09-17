document.getElementById("loginForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const correo = document.getElementById("correo").value.trim();
    const clave = document.getElementById("clave").value.trim();
    const mensaje = document.getElementById("mensaje");

    // Reset mensajes y estilos
    mensaje.innerText = "";
    mensaje.className = "";

    // Validación rápida en el frontend
    if (!correo || !clave) {
        mensaje.innerText = "⚠️ Por favor, complete todos los campos.";
        mensaje.className = "error";
        return;
    }

    // Mostrar loader mientras se procesa
    mensaje.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Validando credenciales...`;
    mensaje.className = "loading";

    try {
        const response = await fetch("/public/apiLogin.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ correo, clave })
        });

        const data = await response.json();

        if (data.success) {
            mensaje.innerHTML = `<i class="fa fa-check-circle"></i> Bienvenido ${data.rol}`;
            mensaje.className = "success";

            setTimeout(() => {
                if (data.rol === "Administrador") {
                    window.location.href = "/views/usuario/admin.php";
                } else if (data.rol === "Vendedor") {
                    window.location.href = "/views/usuario/vendedor.php";
                }
            }, 1200);
        } else {
            mensaje.innerHTML = `<i class="fa fa-times-circle"></i> ${data.message}`;
            mensaje.className = "error";
        }
    } catch (error) {
        mensaje.innerHTML = `<i class="fa fa-exclamation-triangle"></i> Error de conexión con el servidor.`;
        mensaje.className = "error";
    }
});

// Toggle para mostrar/ocultar contraseña
document.getElementById("togglePassword").addEventListener("click", function() {
    const claveInput = document.getElementById("clave");
    const icon = this.querySelector("i");
    if (claveInput.type === "password") {
        claveInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
        this.classList.add("active");
    } else {
        claveInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
        this.classList.remove("active");
    }
});