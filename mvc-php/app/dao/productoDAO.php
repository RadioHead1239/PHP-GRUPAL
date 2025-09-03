<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Producto.php";

class ProductoDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // INSERTAR
    public function insertarProducto(Producto $producto)
    {
        $sql = "CALL sp_insertar_producto(:nombre, :imagen, :descripcion, :precio, :stock)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':imagen', $producto->getImagen());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':precio', $producto->getPrecio());
        $stmt->bindValue(':stock', $producto->getStock());
        return $stmt->execute();
    }

    // LISTAR (devuelve array de objetos Producto)
    public function listarProductos()
    {
        $sql = "CALL sp_listar_productos()";
        $stmt = $this->conn->query($sql);
        $result = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $producto = new Producto(
                $row['IdProducto'],
                $row['Nombre'],
                $row['Imagen'],
                $row['Descripcion'],
                $row['Precio'],
                $row['Stock'],
                $row['Estado']
            );
            $result[] = $producto;
        }
        return $result;
    }

    // ACTUALIZAR
    public function actualizarProducto(Producto $producto)
    {
        $sql = "CALL sp_actualizar_producto(:id, :nombre, :imagen, :descripcion, :precio, :stock, :estado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $producto->getIdProducto());
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':imagen', $producto->getImagen());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':precio', $producto->getPrecio());
        $stmt->bindValue(':stock', $producto->getStock());
        $stmt->bindValue(':estado', $producto->getEstado(), PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    // ELIMINAR (lógico)
    public function eliminarProducto($id)
    {
        $sql = "CALL sp_eliminar_producto(:id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
