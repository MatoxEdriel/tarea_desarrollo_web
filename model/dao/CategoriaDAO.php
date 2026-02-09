<?php
require_once __DIR__ . '/../../config/Conexion.php';

class CategoriaDAO
{
    private PDO $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll(string $param = ""): array
    {
        try {
            $sql = "SELECT * FROM categorias
                    WHERE nombre LIKE :b
                       OR descripcion LIKE :b
                    ORDER BY nombre";

            $stmt = $this->con->prepare($sql);
            $param = '%' . $param . '%';
            $stmt->bindParam(":b", $param, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en selectAll de CategoriaDAO: " . $e->getMessage());
            return [];
        }
    }

    public function selectOne(int $id_categoria): ?array
    {
        try {
            $sql = "SELECT * FROM categorias WHERE id_categoria = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id", $id_categoria, PDO::PARAM_INT);
            $stmt->execute();

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res !== false ? $res : null;
        } catch (PDOException $e) {
            error_log("Error en selectOne de CategoriaDAO: " . $e->getMessage());
            return null;
        }
    }

    public function insert(Categoria $categoria): bool
    {
        try {
            $sql = "INSERT INTO categorias (nombre, descripcion)
                    VALUES (:nombre, :descripcion)";

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":nombre", $categoria->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(":descripcion", $categoria->getDescripcion(), PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en insert de CategoriaDAO: " . $e->getMessage());
            return false;
        }
    }

    public function update(Categoria $categoria): bool
    {
        try {
            $sql = "UPDATE categorias SET 
                        nombre = :nombre,
                        descripcion = :descripcion
                    WHERE id_categoria = :id";

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":nombre", $categoria->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(":descripcion", $categoria->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $categoria->getId_categoria(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en update de CategoriaDAO: " . $e->getMessage());
            return false;
        }
    }

    public function delete(int $id_categoria): bool
    {
        try {
            $sql = "DELETE FROM categorias WHERE id_categoria = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id", $id_categoria, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en delete de CategoriaDAO: " . $e->getMessage());
            return false;
        }
    }
}
?>