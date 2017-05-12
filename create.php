<?php include 'templates/header.view.php' ?>
<?php include 'templates/menu.view.php' ?>

<?php 
    include 'server/utilities.php';

    $movie = array();
    $movie['title'] = ''; 
    $movie['year'] = '';
    $movie['length'] = '';
    $movie['image_url'] = '';
    $movie['movie_url'] = '';
    $movie['description'] = '';
    $buttonName = 'Add';

    $errorMessage = '';

    if(count($_POST) > 0){

        foreach($_POST as $key => $field) {
            if(empty($field)) {
                //0 '' + 'title' = 'title'
                //str_replace(search, replace, subject)
                $key = str_replace('_', ' ', $key); 
                $errorMessage = $errorMessage . $key . ', ';
                //1 'title' + 'year'
                //2 'titleyear' + 'image'
            }
        } 

        $errorMessage = substr($errorMessage, 0, -2); // Triname paskutinius 2 charakterius iš errorMessage eilutės

        if($errorMessage == '') { // Galime įvykdyti SQL užklausą

            $id = createMovie(htmlentities($_POST['title']), 
                        $_POST['year'], 
                        $_POST['length'], 
                        $_POST['image_url'], 
                        $_POST['description'], 
                        $_POST['movie_url']);  

            header("Location:read.php?id=" . $id); // čia reikia įkelto filmo ID  
        } 


    }
  
?>


<main class="container">
    <h1>Filmo įvedimas</h1>
    <?php include 'templates/form.view.php' ?>
</main>

<?php include 'templates/footer.view.php' ?>