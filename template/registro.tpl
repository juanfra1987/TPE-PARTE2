<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{$BASE_URL}ResponsivoCSS.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Home</title>
</head>
<div class="container">
<div class="alineacion">
    <body>
        <header>
            {include file="../template/header.tpl"}
        </header>
        <section>
            {if (isset($logueado)) && !($logueado)}
                {include file="../template/usuarioLogueado.tpl"}
            {else}    
                {include file="../template/registrar.tpl"}
            {/if}

        </section>
        <nav>{include file="../template/barra.tpl"}</nav>

        <aside>
            <img src="{$BASE_URL}imagenes/medico.jpg" alt="medico">
        </aside>
        <article>
            <label>
                Hasta ahora, los médicos que confían en Consultorios del Parque optimizan su comunicación con
                los
                pacientes de forma rápida, automática y segura a través del sistema de mensaje de texto (SMS).
                Gracias a esto, saludan a sus pacientes en el día de su cumpleaños y le envían recordatorios de
                los turnos, entre otros detalles.
                Dado que el 95% de los usuarios de teléfonos inteligentes de la Argentina utilizan el WhatsApp
                como mensajero instantáneo predilecto,
                en Integrando Salud estamos migrando de sistema para que, paulatinamente, el WhatsApp vaya
                reemplazando al SMS.
            </label>
        </article>
    </body>
    <footer>
        {include file="../template/footer.tpl"}
    </footer>
</div>
</div>
</html>