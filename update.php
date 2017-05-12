<?php include 'templates/header.view.php'; ?>
<?php include 'templates/menu.view.php'; ?>
<?php include 'server/utilities.php'; ?>

<?php 

    $errorMessage = '';
    if(isset($_GET['id'])){ //Apsauga! Tikriname ar $_GET['id'] egzistuoja (localhost/read.php?id)
        $id = $_GET['id']; //update.php?id=4  
        $movie = getMovie($id);
        $buttonName = 'Update';
    }
     /*  
    echo "<pre>"; 
    print_R($_POST);
    echo "</pre>";
    */

    //htmlentities();
    //htmlspecialchars(string);

    if(count($_POST) > 0){
        updateMovie($id, 
                htmlentities($_POST['title']), 
                htmlentities($_POST['year']), 
                htmlentities($_POST['length']), 
                htmlentities($_POST['image_url']), 
                htmlentities($_POST['description']), 
                htmlentities($_POST['movie_url']));

        header('Location:/start/update.php?id=' . $id);
        // header('Location:update.php?id=' . $id); 

    }



?>

<main class="container">
    <h1>Filmo atnaujinimas</h1>
    <?php include 'templates/form.view.php' ?>
</main>


<?php include 'templates/footer.view.php' ?>