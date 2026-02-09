<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// --- Conexión a la base de datos ---
$host = "mvc_mysql"; // Nombre que aparece en tu docker ps
$dbname = "CandlesYou_db"; // Mira en tu docker-compose.yml cómo se llama
$user = "root"; 
$pass = "root"; // O la que diga MYSQL_ROOT_PASSWORD en tu compose
$port = 3306;
try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        $id = $_GET['b'] ?? '';
        if ($id) {
            $stmt = $conn->prepare("SELECT * FROM categorias WHERE id_categoria = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare("SELECT * FROM categorias ORDER BY id_categoria ASC");
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)");
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $success = $stmt->execute();
        echo json_encode(["success" => $success]);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id_categoria = :id");
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $stmt->bindParam(':id', $data['id_categoria'], PDO::PARAM_INT);
        $success = $stmt->execute();
        echo json_encode(["success" => $success]);
        break;

    case 'DELETE':
        $id = $_GET['id_categoria'] ?? '';
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM categorias WHERE id_categoria = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $success = $stmt->execute();
            echo json_encode(["success" => $success]);
        } else {
            echo json_encode(["success" => false, "error" => "No se indicó ID"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>