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


    <img class="image" src="assets/pokemon/abra" alt="">
    <main> 
        <section class="col">
            <div class="pokemon">
            <img  src="assets/pokemon/abra.png" alt="">
            </div>
            <div>
            <p class="stats-info">,,;,;</p>
            </div>
        </section>
        <section>
            <div>
           <img class="evolution" src="" alt=""> 
           </div>
       </section>
    </main>
    <!-- Ajout du fichier footer -->
    <?php include_once("assets/php/footer.php"); ?>
</body>
</html>