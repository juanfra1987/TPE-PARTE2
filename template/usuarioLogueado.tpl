<div>
    <label>El usuario {$smarty.session.username} esta logueado</label>
    <form action="{BASE_URL}logout/{$desde}" method="POST">
        <input type="submit" value="Desconectarse" href="{$BASE_URL}logout/{$desde}">
    </form>
</div>