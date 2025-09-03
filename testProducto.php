<?php
require_once __DIR__ . "/mvc-php/app/models/Producto.php";
require_once __DIR__ . "/mvc-php/app/dao/ProductoDAO.php";

$dao = new ProductoDAO();

$producto = new Producto(null, "Coca Cola 500ml", "coca.png", "Gaseosa helada", 3.50, 20, true);
if ($dao->insertarProducto($producto)) {
    echo "Producto insertado correctamente<br>";
} else {
    echo "Error al insertar<br>";
}

echo "<h3>Lista de productos</h3>";
$productos = $dao->listarProductos();
foreach ($productos as $p) {
    echo "- " . $p->getNombre() . " | S/. " . $p->getPrecio() . " | Stock: " . $p->getStock() . "<br>";
}

if (!empty($productos)) {
    $p = $productos[0]; 
    $p->setPrecio(4.20);
    $p->setStock(50);
    if ($dao->actualizarProducto($p)) {
        echo "Producto actualizado<br>";
    } else {
        echo "Error al actualizar<br>";
    }
}

if (!empty($productos)) {
    $id = $productos[0]->getIdProducto();
    if ($dao->eliminarProducto($id)) {
        echo "Producto eliminado<br>";
    } else {
        echo "Error al eliminar<br>";
    }
}