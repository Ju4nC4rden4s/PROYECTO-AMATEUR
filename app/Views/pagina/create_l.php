
<link rel="stylesheet" href="<?= base_url('css/Create_L.css') ?>">

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Club Amateur - Crea una cuenta</title>
  <link rel="stylesheet" href="/css/Create_L.css">
    <link rel="icon" type="image/png" href="<?= base_url('imagenes/logo-academia.jpg') ?>" />
</head>
<body>
  <div class="container">
    <h1 class="logo"><img src="<?= base_url('imagenes/logitoo.png') ?>"/>Amateurs Club</h1>
    <div class="form-box">
      <h2>Crea una cuenta</h2>
      <p>Es rápido y fácil.</p>
      <form>
        <div class="name-fields">
          <input type="text" placeholder="Nombre" required>
          <input type="text" placeholder="Apellido" required>
        </div>

        <label for="fecha" class="label">Fecha de nacimiento</label>
        <div class="birth-fields">
          <select required>
            <option value="9">9</option>
            <!-- Puedes agregar los demás días -->
          </select>
          <select required>
            <option value="nov">nov</option>
            <!-- Más meses -->
          </select>
          <select required>
            <option value="2025">2025</option>
            <!-- Más años -->
          </select>
        </div>

        <label class="label">Género</label>
        <div class="gender-fields">
          <label><input type="radio" name="gender" value="Mujer"> Mujer</label>
          <label><input type="radio" name="gender" value="Hombre"> Hombre</label>
          <label><input type="radio" name="gender" value="Personalizado"> Personalizado</label>
        </div>

        <input type="text" placeholder="Número de celular o correo electrónico" required>
        <input type="password" placeholder="Contraseña nueva" required>

      
        <button type="submit" class="btn-register">Registrarte</button>

        <div class="login-link">
          <a href="#">¿Ya tienes una cuenta?</a>
        </div>
      </form>
      
    </div>

