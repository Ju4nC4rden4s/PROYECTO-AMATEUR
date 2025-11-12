<?= $this->include('templates/menu_admin'); ?>

<div class="main-content">
    <h1 class="title">Gestión de Clases</h1>

    <?php if (!empty($clases)): ?>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Día</th>
                        <th>Hora</th>
                        <th>Cupo Máximo</th>
                        <th>Cupos Disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clases as $clase): ?>
                        <tr>
                            <td><?= esc($clase['id']); ?></td>
                            <td><?= esc($clase['nombre']); ?></td>
                            <td><?= esc($clase['dia']); ?></td>
                            <td><?= esc($clase['hora']); ?></td>
                            <td><?= esc($clase['cupo_maximo']); ?></td>
                            <td><?= esc($clase['cupos_disponibles']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="no-data">No hay clases registradas.</p>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer'); ?>
