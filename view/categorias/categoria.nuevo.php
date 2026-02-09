<?php require_once HEADER; ?>

<div class="container mt-5 pt-5">
    <h2><?php echo $titulo ?></h2>

    <div class="card card-body">
        <form action="index.php?c=categoria&f=nuevo" method="POST" name="formCategoriaNuevo" id="formCategoriaNuevo">

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Nombre de la categoria" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        placeholder="Descripcion de la categoria" required>
                </div>

                <div class="form-group mx-auto mt-4 text-center">
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>

                    <a href="index.php?c=categoria&f=index" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>

        </form>
    </div>
</div>

<?php require_once FOOTER; ?>