
<head>
    <base href="{$BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ResponsivoCSS.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <title>Home</title>
</head>

<div class="container">
    <img src={$consulta->imagen} alt={$consulta->nombre_prof}>
    <div>
        <h1>{$consulta->nombre_prof}</h1>
        <h2>{$consulta->nombre_espec}</h2>
        <h2>{$consulta->dias_atencion}</h2>
        <h3>{$consulta->telefono}</h3>
    </div>
    <input type="hidden" value="{$consulta->id_prof}" id="id_prof"> 
    {include file="template/vue/comentarios.tpl"}
    {if ($logueado)}
    <form id="form-comentarios">
        <label>Agregar Comentario</label><br>
        <label>Comentario: <input type="text" id="detalle"></label></p>
        <label>Puntaje: <input type="number" id="puntaje" cols="50" rows="10"></label></p>
        <input type="hidden" value="{$idUsuario}" id="id_usuario"> 
        <input type="submit">
    </form>
    {/if}
    <script src="js/comentarios.js"></script>
</div>
