<?php
require_once 'model/dao/CategoriaDAO.php';
require_once 'model/dto/Categoria.php';
require_once 'model/dao/VelasDAO.php';
require_once 'model/dto/Vela.php';
require_once 'utils/functions.php';

class VelaController{

    private $model;

    public function __construct()
    {
        $this->model = new VelasDAO();
    }

    public function index()
    {
        $resultados = $this->model->selectAll('');
        $titulo = 'Lista empanadas';
        require_once VVELAS . 'list.php';
    }

    public function search()
    {
        $parametro = htmlspecialchars($_POST['b'] ?? '');
        $resultados = $this->model->selectAll($parametro);
        $titulo = 'Lista de empanadas';
        require_once VVELAS . 'list.php';
    }

    public function delete()
    {
        $id_vela = htmlentities($_GET['id_vela'] ?? 0);
        $exito = $this->model->delete($id_vela);

        redirectWithMessage(
            $exito,
            'Categoría eliminada correctamente',
            'Error al eliminar la categoría',
            'index.php?c=vela&f=index'
        );
    }

    public function view_new()
    {
        $titulo = 'Nueva Vela';

        $categoriaDAO = new CategoriaDAO();
        $categorias = $categoriaDAO->selectAll();

        require_once VVELAS . 'nuevo.php';
    }


    public function nuevo()
    {
        $vel = $this->populate($_POST);
        $exito = $this->model->insert($vel);

        redirectWithMessage(
            $exito,
            'Categoría creada correctamente',
            'Error al crear la categoría',
            'index.php?c=vela&f=index'
        );
    }

    public function view_edit()
    {
        $titulo = 'Editar Vela';

        $id = $_GET['id_vela'] ?? null;
        if ($id === null) {
            header("Location: index.php?c=vela&f=index");
            exit;
        }

        $vela = $this->model->selectOne((int)$id);

        if ($vela === null) {
            header("Location: index.php?c=vela&f=index");
            exit;
        }

        $categoriaDAO = new CategoriaDAO();
        $categorias = $categoriaDAO->selectAll();

        require_once VVELAS . 'edit.php';
    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?c=vela&f=index");
            exit;
        }

        $vela = $this->populate($_POST);

        $exito = $this->model->update($vela);

        redirectWithMessage(
            $exito,
            'Vela actualizada correctamente',
            'Error al actualizar la vela',
            'index.php?c=vela&f=index'
        );
    }


    public function populate(array $row): Vela
    {
        $vela = new Vela();

        $vela->setId_vela($row['id_vela'] ?? null);
        $vela->setNombre($row['nombre'] ?? null);
        $vela->setDescripcion($row['descripcion'] ?? null);
        $vela->setPrecio($row['precio'] ?? null);
        $vela->setStock($row['stock'] ?? null);
        $vela->setAroma($row['aroma'] ?? null);
        $vela->setColor($row['color'] ?? null);
        $vela->setId_categoria($row['id_categoria'] ?? null);
        $vela->setFecha_registro($row['fecha_registro'] ?? null);

        return $vela;
    }

}