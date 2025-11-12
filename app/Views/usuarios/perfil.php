<?= $this->include('templates/menu_usuario') ?>

<div class="main-content">
    <h1 class="title">Mi Perfil</h1>

    <?php if (!empty($usuario) && is_array($usuario)): ?>
        <div class="profile-info">
            <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
            <p><strong>Email:</strong> <?= esc($usuario['email']) ?></p>
            <p><strong>Teléfono:</strong> <?= esc($usuario['telefono']) ?></p>
            <p><strong>Fecha de Registro:</strong> <?= esc($usuario['fecha_registro']) ?></p>
        </div>
    <?php else: ?>
        <p class="no-data">Usuario no encontrado.</p>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer') ?>
