<?php echo $this->extend('plantilla/layout');?>
<?php echo $this->section('contenido');?>

<div class="container my-5">
<section id="inscripcion" class="centrado">
  <h2>Formulario de inscripción</h2>

  <?php if(session()->getFlashdata('mensaje')): ?>
    <div class="alert"><?= session()->getFlashdata('mensaje') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('/inscripcion/guardar') ?>" method="post" style="max-width:400px; margin:20px auto; text-align:left;">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="documento">Documento de identidad:</label>
        <input type="text" id="documento" name="documento" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="genero">Género:</label>
        <select id="genero" name="genero" class="form-control" required>
          <option value="">Seleccione</option>
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
          <option value="otro">Otro</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="objetivo">Objetivo:</label>
        <input type="text" id="objetivo" name="objetivo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="patologias">Patologías (texto libre):</label>
        <textarea id="patologias" name="patologias" rows="3"></textarea>
    </div>

    <button type="submit" class="btn">Enviar inscripción</button>
  </form>
</section>
</div>


  <?php echo $this->endSection();?>

