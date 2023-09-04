<h1 class="nombre-pagina">INICIAR SESION</h1>
<p class="descripcion-pagina">Inicia sesion con tus datos</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Correo: </label>
        <input type="email" id="email" placeholder="Tu email" name="email" value="">
    </div>
    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" placeholder="Ingresa tu contrasenia" name="password">
    </div>
    <input type="submit" class="boton" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href="/crear-cuenta">Aun no tienes una cuenta? Crea una</a>
    <a href="/olvide">Olvide mi contraseña</a>
</div>