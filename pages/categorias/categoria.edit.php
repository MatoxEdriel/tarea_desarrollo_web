<?php require_once HEADER; ?>

<div class="container mt-5 pt-5">
    <h2><?php echo $titulo ?></h2>

    <div class="card card-body">

        <form action="index.php?c=categoria&f=edit" method="POST" name="formCategoriaEdit" edit="formCategoriaEdit">

            <input type="hidden" name="id_categoria" id="id_categoria"
                value="<?php echo htmlspecialchars($categoria['id_categoria']); ?>">

            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="<?php echo isset($categoria['nombre']) ? htmlspecialchars($categoria['nombre']) : ''; ?>"
                        placeholder="Nombre de categoria" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        value="<?php echo isset($categoria['descripcion']) ? htmlspecialchars($categoria['descripcion']) : ''; ?>"
                        placeholder="Descripcion" required>
                </div>

                <div class="form-group mx-auto mt-4">
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('¿Está seguro de modificar el Entrenador?');">
                        Guardar
                    </button>

                    <a href="index.php?c=categoria&f=index" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>