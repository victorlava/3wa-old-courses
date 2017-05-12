<?php include 'templates/header.view.php' ?>
<?php include 'templates/menu.view.php' ?>

<?php include 'server/utilities.php'; ?>
<?php 
     
    $id = $_GET['id'];

    $movie = getMovie($id);

    deleteMovie($id);  

    //header('Location:index.php'); // Veikia be uždelsimo
    header('Refresh:1; url=index.php'); // Veikia su uždelsimu

?>

<main class="container">
    <div class="alert alert-success">
        <strong>Success!</strong> 
        Movie <strong>#<?php echo $id; ?></strong> 
        with title: <strong><?php echo $movie['title'] ?></strong>
        has been succesfully deleted.
    </div>
</main>

<?php include 'templates/footer.view.php' ?>
