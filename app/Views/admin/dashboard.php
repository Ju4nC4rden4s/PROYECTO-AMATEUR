<?= $this->include('templates/menu_admin') ?>

<section class="dashboard">
    <h2>Panel de Administración</h2>

    <div class="cards">
        <div class="card">
            <h3>Gestión de Usuarios</h3>
            <p>Administra los usuarios registrados y sus perfiles.</p>
            <a href="<?= base_url('admin/usuarios') ?>" class="btn">Ver Usuarios</a>
        </div>

        <div class="card">
            <h3>Gestión de Clases</h3>
            <p>Modifica horarios, controla cupos y gestiona asistencia.</p>
            <a href="<?= base_url('admin/clases') ?>" class="btn">Ver Clases</a>
        </div>

        <div class="card">
            <h3>Reservas</h3>
            <p>Consulta las reservas realizadas por los usuarios.</p>
            <a href="<?= base_url('admin/reservas') ?>" class="btn">Ver Reservas</a>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
