<?php
echo '<div class="w3-container w3-gray w3-padding-16">
    <form class="w3-row" action="vistaPokedexBuscado.php" method="POST">

        <div class="w3-col l8">
            <input class="w3-input w3-border" type="text" name="datoBuscado" required
                   placeholder="Ingrese el nombre, tipo o numero de pokemon que busca">
        </div>

        <div class="w3-col l4">
            <button class="" type="submit">Buscar pokemon</button>
        </div>
    </form>
</div> ';
?>