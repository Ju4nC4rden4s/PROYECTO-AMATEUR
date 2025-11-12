<?= $this->include('templates/menu_usuario') ?>

<div class="main-content">
    <h1 class="title">Mis Clases</h1>

    <?php if (!empty($clases) && is_array($clases)): ?>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Día</th>
                        <th>Hora</th>
                        <th>Instructor</th>
                        <th>Fecha de Reserva</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clases as $index => $clase): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($clase['dia']) ?></td>
                            <td><?= esc($clase['hora']) ?></td>
                            <td><?= esc($clase['fecha_reserva']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="no-data">No tienes clases reservadas.</p>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer') ?>
