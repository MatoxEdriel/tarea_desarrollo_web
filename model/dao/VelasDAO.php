<?php
require_once __DIR__ . '/../../config/Conexion.php';
require_once __DIR__ . '/../dto/Vela.php';

class VelasDAO
{
    private PDO $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll(string $param = ""): array
    {
        try {
            $sql = "SELECT v.*, c.nombre AS categoria
                    FROM velas v
                    LEFT JOIN categorias c ON v.id_categoria = c.id_categoria
                    WHERE v.nombre LIKE :b
                       OR v.descripcion LIKE :b
                       OR c.nombre LIKE :b
                    ORDER BY v.fecha_registro DESC";

            $stmt = $this->con->prepare($sql);
            $param = '%' . $param . '%';
            $stmt->bindValue(":b", $param, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en selectAll de VelasDAO: " . $e->getMessage());
            return [];
        }
    }

    public function selectOne(int $id_vela): ?array
    {
        try {
            $sql = "SELECT * FROM velas WHERE id_vela = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":id", $id_vela, PDO::PARAM_INT);
            $stmt->execute();

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res !== false ? $res : null;
        } catch (PDOException $e) {
            error_log("Error en selectOne de VelasDAO: " . $e->getMessage());
            return null;
        }
    }

    public function insert(Vela $vela): bool
    {
        try {
            $sql = "INSERT INTO velas 
                        (nombre, descripcion, precio, stock, aroma, color, id_categoria)
                    VALUES 
                        (:nombre, :descripcion, :precio, :stock, :aroma, :color, :id_categoria)";

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":nombre", $vela->getNombre());
            $stmt->bindValue(":descripcion", $vela->getDescripcion());
            $stmt->bindValue(":precio", $vela->getPrecio());
            $stmt->bindValue(":stock", $vela->getStock(), PDO::PARAM_INT);
            $stmt->bindValue(":aroma", $vela->getAroma());
            $stmt->bindValue(":color", $vela->getColor());
            $stmt->bindValue(":id_categoria", $vela->getId_categoria(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en insert de VelasDAO: " . $e->getMessage());
            return false;
        }
    }

    public function update(Vela $vela): bool
    {
        try {
            $sql = "UPDATE velas SET 
                        nombre = :nombre,
                        descripcion = :descripcion,
                        precio = :precio,
                        stock = :stock,
                        aroma = :aroma,
                        color = :color,
                        id_categoria = :id_categoria
                    WHERE id_vela = :id";

            $stmt = $this->con->prepare($sql);
            // Usamos bindValue
            $stmt->bindValue(":nombre", $vela->getNombre());
            $stmt->bindValue(":descripcion", $vela->getDescripcion());
            $stmt->bindValue(":precio", $vela->getPrecio());
            $stmt->bindValue(":stock", $vela->getStock(), PDO::PARAM_INT);
            $stmt->bindValue(":aroma", $vela->getAroma());
            $stmt->bindValue(":color", $vela->getColor());
            $stmt->bindValue(":id_categoria", $vela->getId_categoria(), PDO::PARAM_INT);
            $stmt->bindValue(":id", $vela->getId_vela(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en update de VelasDAO: " . $e->getMessage());
            return false;
        }
    }

    public function delete(int $id_vela): bool
    {
        try {
            $sql = "DELETE FROM velas WHERE id_vela = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":id", $id_vela, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en delete de VelasDAO: " . $e->getMessage());
            return false;
        }
    }
}
?>