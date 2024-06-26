<?php if (!empty($_SESSION['username'])) { ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <button id="add-favoris">Favoris</button>

    <script>
        var idP = "<?php echo $_GET['idP']; ?>";

        $("#add-favoris").on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: './assets/php/_add-favoris.php',
                data: {
                    id: idP
                },
                success: function() {
                    console.log("added")
                },
                error: function() {
                    console.log("error")
                }
            });
        })
    </script>

<?php } ?>