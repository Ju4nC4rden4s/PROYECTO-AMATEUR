<?= $this->include('templates/menu_usuario') ?>

<section class="dashboard">
    <h2>Reservar Nueva Clase</h2>

    <?php if (!empty($clases)): ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Hora</th>
                    <th>Cupos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clases as $clase): ?>
                    <tr>
                        <td><?= esc($clase['dia']) ?></td>
                        <td><?= esc($clase['hora']) ?></td>
                        <td><?= esc($clase['cupos']) ?>/8</td>
                        <td><a href="#" class="btn">Reservar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay clases disponibles en este momento.</p>
    <?php endif; ?>
</section>

<?= $this->include('templates/footer') ?>
