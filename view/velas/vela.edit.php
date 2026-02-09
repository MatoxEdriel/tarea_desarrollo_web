<?php require_once HEADER; ?>

<div class="container mt-5 pt-5">
    <h2><?php echo $titulo ?></h2>

    <div class="card card-body">

        <form action="index.php?c=vela&f=edit" method="POST" name="formVelaEdit" id="formVelaEdit">

            <input type="hidden" name="id_vela" id="id_vela" value="<?php echo htmlspecialchars($vela['id_vela']); ?>">

            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="<?php echo htmlspecialchars($vela['nombre']); ?>" placeholder="Nombre de la vela"
                        required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        value="<?php echo htmlspecialchars($vela['descripcion']); ?>" placeholder="Descripción"
                        required>
                </div>

                <div class="form-group col-sm-4">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" class="form-control"
                        value="<?php echo htmlspecialchars($vela['precio']); ?>" placeholder="Precio" required>
                </div>

                <div class="form-group col-sm-4">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control"
                        value="<?php echo htmlspecialchars($vela['stock']); ?>" placeholder="Stock" required>
                </div>

                <div class="form-group col-sm-4">
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color" class="form-control"
                        value="<?php echo htmlspecialchars($vela['color']); ?>" placeholder="Color">
                </div>

                <div class="form-group col-sm-6">
                    <label for="aroma">Aroma</label>
                    <input type="text" name="aroma" id="aroma" class="form-control"
                        value="<?php echo htmlspecialchars($vela['aroma']); ?>" placeholder="Aroma">
                </div>

                <div class="form-group col-sm-6">
                    <label for="id_categoria">Categoría</label>
                    <select name="id_categoria" id="id_categoria" class="form-control" required>
                        <option value="">-- Seleccione una categoría --</option>
                        <?php foreach ($categorias as $cat): ?>
                        <option value="<?php echo $cat['id_categoria']; ?>"
                            <?php echo ($cat['id_categoria'] == $vela['id_categoria']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['nombre']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mx-auto mt-4">
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('¿Está seguro de modificar la vela?');">
                        Guardar
                    </button>

                    <a href="index.php?c=vela&f=index" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>