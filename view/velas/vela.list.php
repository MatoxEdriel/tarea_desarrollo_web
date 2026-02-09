<?php require_once HEADER; ?>

<div class="container mt-5 pt-5">
    <h2><?php echo $titulo ?></h2>

    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=vela&f=search" method="POST" class="form-inline">
                <input type="text" name="b" id="busqueda" class="form-control mr-2" placeholder="buscar…">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>

        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=vela&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo
                </button>
            </a>
        </div>

        <div class="table-responsive mt-2">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Aroma</th>
                        <th>Color</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody class="tabladatos">
                    <?php if (!empty($resultados)): ?>
                    <?php foreach ($resultados as $fila): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['id_vela']); ?></td>
                        <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($fila['descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($fila['precio']); ?></td>
                        <td><?php echo htmlspecialchars($fila['stock']); ?></td>
                        <td><?php echo htmlspecialchars($fila['aroma']); ?></td>
                        <td><?php echo htmlspecialchars($fila['color']); ?></td>
                        <td><?php echo htmlspecialchars($fila['categoria'] ?? 'Sin categoría'); ?></td>
                        <td class="d-flex justify-content-center gap-2">
                            <a class="btn btn-primary"
                                href="index.php?c=vela&f=view_edit&id_vela=<?php echo $fila['id_vela']; ?>">
                                Editar
                            </a>

                            <a class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar esta vela?');"
                                href="index.php?c=vela&f=delete&id_vela=<?php echo $fila['id_vela']; ?>">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">Sin resultados</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once FOOTER; ?>