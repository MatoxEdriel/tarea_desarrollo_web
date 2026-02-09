<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../model/dao/VelasDAO.php';

$dao = new VelasDAO();
$buscar = $_GET['b'] ?? '';

echo json_encode($dao->selectAll($buscar));
?>