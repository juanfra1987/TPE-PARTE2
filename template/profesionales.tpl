<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{$BASE_URL}ResponsivoCSS.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Profesionales</title>
</head>
<div class="container">
<div class="alineacion">
<body>
<header>
    {include file="../template/header.tpl"}
</header>
<section>
    {if !($logueado)}
        {include file="../template/login.tpl"}
    {else}
        {include file="../template/usuarioLogueado.tpl"}
    {/if}
</section>
<nav>
    {include file="../template/barra.tpl"}
</nav>
<aside>
{include file="../template/tablaProfesionales.tpl"} <br>
{if ($logueado)}
    {include file="../template/formAgregarProfesional.tpl"}<br>
    {if isset($consultaDoc)}
        {include file="../template/modificacionDatosProf.tpl"}
    {/if}
{/if}
</aside>
</body>
<footer>
{include file="../template/footer.tpl"}
</footer>
</div>
</div>
</html>