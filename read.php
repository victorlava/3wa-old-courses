<?php include 'templates/header.view.php'; ?>
<?php include 'templates/menu.view.php'; ?>
<?php include 'server/utilities.php'; ?>

<?php

    $redirect = TRUE;

    if(!empty($_GET)){ //Apsauga! Tikriname ar $_GET masyvas yra tuščias (localhost/read.php)

        if(isset($_GET['id'])){ //Apsauga! Tikriname ar $_GET['id'] egzistuoja (localhost/read.php?id)
            $id = $_GET['id']; 

            if($id != FALSE){  //Apsauga! Tikriname ar $id kintamasis nėra FALSE/null. (localhost/read.php?id=)
                $movie = getMovie($id);

                if($movie != null){ // Tikriname ar $movie masyve yra duomenų
                    $redirect = FALSE; // Jei visos šios sąlygos yra teisingos, tuomet neperkeliame vartotojo į pradinį puslapį
                }

            }

        }

    }

    if($redirect == TRUE){ 
    // Apsaugos funkcija. Standartiškai perkeliame vartotoją į kitą puslapį. 
    // Neperkeliame, tik tuomet kai $movie != null (t.y $movie turi duomenų masyvą)
        header('Location:index.php');
    }
?>

<main class="container">
<section class="movies" id="movies">
  <h1>Filmas: <?php echo $movie['title']?></h1>
  <hr />
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <article class="card">
                <div class="card-block">
                    <div class="img-card">
                        <img src="<?php echo $movie['image_url']; ?>" alt="<?php echo $movie['title']; ?>" class="img-responsive" />
                    </div>
                    <a href="update.php?id=<?php echo $movie['id']?>" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-pencil"></i> Redaguoti</a>
                    <a href="delete.php?id=<?php echo $movie['id']?>" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                </div>
            </article>
        </div> 

        <p><?php echo $movie['description'] ?></p>
  
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $movie['movie_url']; ?>" frameborder="0" allowfullscreen></iframe>
    </div> 
</section>
</main>


<?php include 'templates/footer.view.php' ?>