<?php
include 'database.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];

$database = new Database();

$query = "SELECT pokemon.imagen AS pokemon_img, 
                       pokemon.nro_id_unico, 
                       pokemon.nombre, 
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion
                FROM pokemon
                JOIN tipo ON pokemon.tipo_id = tipo.id
                WHERE pokemon.nombre LIKE '%$page%'
";

$resultado = $database->query($query);
}
?>



<?php foreach ($resultado as $pokemon): ?>
    <div class="w3-row">
        <div class="w3-col l6">
            <img src="./imagenes/<?php echo $pokemon['nombre'];?>.png" alt="<?php echo $pokemon['nombre']; ?>" class="w3-image" style="width:100px;">

        </div>
        <div class="w3-col l6">
            <img src="./imagenes/<?php echo $pokemon['descripcion']; ?>.png" alt="Tipo <?php echo $pokemon['descripcion']; ?>" class="w3-image" style="width:100px;">
            <a href="vistaPokedexBusqueda.php?page=<?php echo $pokemon['nombre']; ?>"><?php echo $pokemon['nombre']; ?></a>
            <p>Numero de pokemon: <?php echo $pokemon['nro_id_unico'] ?></p>
        </div>



    </div>
<?php endforeach; ?>




