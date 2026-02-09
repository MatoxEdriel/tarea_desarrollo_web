<?php
require_once 'model/dao/CategoriaDAO.php';
require_once 'model/dto/Categoria.php';
require_once 'utils/functions.php';

class CategoriaController{

    private $model;

    public function __construct()
    {
        $this->model = new CategoriaDAO();
    }

    public function index()
    {
        $resultados = $this->model->selectAll('');
        $titulo = 'Lista de Categorias';
        require_once VCATEGORIAS . 'list.php';
    }

    public function search()
    {
        $parametro = htmlspecialchars($_POST['b'] ?? '');
        $resultados = $this->model->selectAll($parametro);
        $titulo = 'Lista de Categorias';
        require_once VCATEGORIAS . 'list.php';
    }

    public function delete()
    {
        $id_categoria = htmlentities($_GET['id_categoria'] ?? 0);
        $exito = $this->model->delete($id_categoria);

        redirectWithMessage(
            $exito,
            'Categoría eliminada correctamente',
            'Error al eliminar la categoría',
            'index.php?c=categoria&f=index'
        );
    }

    public function view_nuevo()
    {
        $titulo = 'Nueva CATEGORIA';
        require_once VCATEGORIAS . 'nuevo.php';
    }

    public function nuevo()
    {
        $cat = $this->populate($_POST);
        $exito = $this->model->insert($cat);

        redirectWithMessage(
            $exito,
            'Categoría creada correctamente',
            'Error al crear la categoría',
            'index.php?c=categoria&f=index'
        );
    }

    public function view_edit()
    {
        $titulo = 'Editar CATEGORIA';

        $id = $_GET['id_categoria'] ?? null;
        if ($id === null) {
            header("Location: index.php?c=categoria&f=index");
            exit;
        }

        $categoria = $this->model->selectOne((int)$id);

        if ($categoria === null) {
            header("Location: index.php?c=categoria&f=index");
            exit;
        }

        require_once VCATEGORIAS . 'edit.php';
    }


    public function edit()
    {
        $cat = $this->populate($_POST);
        $exito = $this->model->update($cat);

        redirectWithMessage(
            $exito,
            'Categoría actualizada correctamente',
            'Error al actualizar la categoría',
            'index.php?c=categoria&f=index'
        );
    }


    public function populate(array $row): Categoria
    {
        $categoria = new Categoria();
        $categoria->setId_categoria($row['id_categoria'] ?? null);
        $categoria->setNombre($row['nombre'] ?? null);
        $categoria->setDescripcion($row['descripcion'] ?? null);

        return $categoria;
    }

}