<?php include 'templates/header.view.php' ?>
<?php include 'templates/menu.view.php' ?>

<?php 

    include 'server/utilities.php';

    $limit = 4;
    $ifSearching = FALSE;

    if(count($_GET) == 0) {
        $_GET['page'] = 1;
    } 

    if(count($_POST) > 0) { // Įvyko filmo paieška

        $movies = searchMovies($_POST['movieName']);
        $ifSearching = TRUE;
    }
    else { // Neįvyko filmo paieška, rodome visus filmus

        $movies = getMovies($_GET['page'], $limit);
        $finalPage = getFinalPageNumber($limit);

    }

?>

<main class="container">
    <section class="movies" id="movies">
        <h2>Movies</h2>
        <div class="row">
            <form method="POST">
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Search</span>
                  <input type="text" class="form-control" 
                         placeholder="Enter movie name..." 
                         name="movieName">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Go!</button>
                  </span>
                </div>
            </form> 
        </div>
        <div class="row">
            <?php foreach($movies as $movie): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <article class="card">
                    <header class="title-header">
                        <h3><?php echo $movie['title']; ?></h3>
                    </header> 
                    <div class="card-block">
                        <div class="img-card">
                            <img style="max-height:268px; margin:auto;" src="<?php echo $movie['image_url']; ?>" alt="" class="img-responsive" />
                        </div>
                        <p class="tagline card-text text-xs-center">
                            Metai: <strong><?php echo $movie['year']; ?> m.</strong>, Trukmė: : <?php echo formatTime($movie['length']); ?>
                        </p>
                        <a href="read.php?id=<?php echo $movie['id'];?>" class="btn btn-warning btn-icon">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php if(!$ifSearching): ?>
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php if($_GET['page'] == 1): ?>
        <li class="disabled">
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php else: ?>
        <li>
          <a href="index.php?page=<?php echo $_GET['page'] - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php endif; ?>

        <?php for($i = 0; $i < $finalPage; $i++): ?> <!-- -->
        <li <?php if($_GET['page'] == $i + 1){ echo 'class="active"'; }?>>
            <a href="index.php?page=<?php echo $i + 1; ?>">
                <?php echo $i + 1; ?>
            </a>
        </li>
        <?php endfor; ?>

        <?php if($_GET['page'] == $finalPage): ?>
        <li class="disabled">
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
        <?php else: ?>
        <li>
          <a href="index.php?page=<?php echo $_GET['page'] + 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if(count($movies) == 0): ?>
        <h2>Sorry, no movies found.</h2>
    <?php endif; ?>
</main>

<?php include 'templates/footer.view.php' ?>