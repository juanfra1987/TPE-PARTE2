<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{$BASE_URL}ResponsivoCSS.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Usuarios</title>
</head>
<div class="container">
<div class="alineacion">
<body>
<header>
    {include file="../template/header.tpl"}
</header>
<section>
        {include file="../template/usuarioLogueado.tpl"}
</section>
<nav>
    {include file="../template/barra.tpl"}
</nav>
<aside>
    {if isset($consultaUsuario)}
        {include file="../template/modificacionUsuarios.tpl"}
    {/if}  
    {include file="../template/tablaUsuarios.tpl"}     
</aside>
</body>
<footer>
{include file="../template/footer.tpl"}
</footer>
</div>
</div>
</html>