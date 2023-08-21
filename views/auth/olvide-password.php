<h1 class="nombre-pagina">Recupear contraseña</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para recuperar tu contraseña</p>

<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" placeholder="Tu Email">
    </div>

    <input type="submit" value="Recuperar contraseña" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear una</a>
</div>