<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Ajout du fichier header -->
    <?php 
        include_once("assets/php/header.php");
        ?>
    <!-- contenu body -->
     <!-- debut contenu trouver sur BeCode -->
    <!-- <main>
    <h1>
       < ?php echo $_GET['name']; ?>
    </h1>
    <a href="/">Homepage</a>
</main> -->
<!-- fin contenu trouver sur BeCode -->


<section id="pokedex" class="col">
            <h2>Pokedex</h2>
            <div class="pokemon">
                <img src="assets/pokemon/abra.png" alt="Abra">
                <p class="stats-info">Some stats information here</p>
            </div>
        </section>
        <section class="evolution-container">
            <img class="evolution" src="assets/pokemon/kadabra.png" alt="Evolution 1">
            <img class="evolution" src="assets/pokemon/evolution2.png" alt="Evolution 2">

       </section>
    </main>
    <!-- Ajout du fichier footer -->
    <?php include_once("assets/php/footer.php"); ?>
</body>
</html>