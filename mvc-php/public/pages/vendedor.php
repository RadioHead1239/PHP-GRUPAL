<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Vendedor</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Izquierdo -->
            <div class="col-md-3 col-lg-2 sidebar">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fa-solid fa-cart-shopping me-2"></i>Ventas</a>
                <a href="#"><i class="fa-solid fa-box me-2"></i>Productos</a>
                <a href="perfil.php"><i class="fa-solid fa-user me-2"></i>Perfil</a>

                <!-- Botón Cerrar Sesión Abajo -->
                <div class="logout-btn">
                    <button onclick="window.location.href='login.php'">CERRAR SESIÓN</button>
                </div>
            </div>

            <!-- Contenido -->
            <div class="col-md-9 col-lg-10 content">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.ctfassets.net/o7fa4pf94cfp/35IZumSv8h17jhCibMF2QD/6f3191d9256dd2a35321663bf73dda5a/04902430430715_C1N1.jpeg?w=700&fm=webp"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Shampoo</h5>
                        <p class="card-text">Shampoo anti caidas</p>
                        <p class="card-text">Precio S/.</p>
                        <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>