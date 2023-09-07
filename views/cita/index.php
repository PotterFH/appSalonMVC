<h1 class="nombre-pagina">Crear Nueva Pagina</h1>
<p class="descripcion-pagina"> Elige tus servicios y coloca tus datos</p>


<div id="pago">
    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p>Elige tus servicios a continuacion</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Tus datos y cita</h2>
        <p>Coloca tus datos y fecha de cita</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu Nombre" value="<?php echo $nombre?>" disabled >
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">
            </div>
            <div class="campo">
                <label for="hora">Hora</label>
                <input type="time" id="hora">
            </div>
        </form>
    </div>
    <div id="paso-3" class="seccion">
        <h2>Resumen</h2>
        <p>Verifica que la informacion sea correcta</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
</div>