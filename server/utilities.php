<?php 
/*
createMovie('The God Father', 
            2016, 
            '01:00:00', 
            'https://images-na.ssl-images-amazon.com/images/M/MV5BODU4MjU4NjIwNl5BMl5BanBnXkFtZTgwMDU2MjEyMDE@._V1_SY1000_CR0,0,672,1000_AL_.jpg', 
            'A non well formed numeric value encountered in /var/www/public/start/index.php on line 1014930820001h 00min', 
            'kadArP88pTE');*/

include "config.php"; 

function formatTime($time) {
    $timestamp = strtotime($time); // 
    return date('G\h i\m\i\n', $timestamp); // 36min
}

function getFinalPageNumber($limit) {
    $pdo = createConnection(); 
    $query = $pdo->query('SELECT COUNT(*) FROM movies'); // SELECT * FROM movies LIMIT 3 OFFSET 0 
    $totalRows = $query->fetchColumn();

    return ceil($totalRows / $limit); 
}

function searchMovies($movieName) {
    $pdo = createConnection();
    $query = $pdo->query('SELECT * FROM movies WHERE title LIKE "%'
                         . $movieName . '%"'); // SELECT * FROM movies LIMIT 3 OFFSET 0 

    return $query->fetchAll();   
}

// Gauname visus filmus iš duomenų bazės
function getMovies($pageNumber, $limit){
 
    $pageNumber = $pageNumber - 1; // Puslapio indeksas nuo 0
    $offset = $pageNumber * $limit; // Nuo kokios eilutės rodome filmus DB

    $pdo = createConnection();

    $query = $pdo->prepare('SELECT * FROM movies LIMIT ' . 
                            $limit . ' OFFSET ' . $offset); // SELECT * FROM movies LIMIT 3 OFFSET 0 
    $query->execute();  

    return $query->fetchAll();

}

function deleteMovie($id) {
    $pdo = createConnection();
    $query = $pdo->prepare('DELETE FROM movies WHERE id = :id LIMIT 1'); 
    $query->execute(['id' => $id]); 
}
 
// Gauname vieną filmą pagal nurodytą $id
function getMovie($id){ 

    $pdo = createConnection();
    $query = $pdo->prepare('SELECT * FROM movies WHERE id = :id LIMIT 1'); 
    $query->execute(['id' => $id]); 

    $movie = $query->fetch();

    return $movie;
}

function createMovie($title, $year, $length, $image_url, $description, $movie_url) {
    $pdo = createConnection();

    //$length = '02:00';
    $timestamp = strtotime($length); // 02:00
    $length = date('Y-m-d H:i:s', $timestamp); // 02:00:00

    // INSERT INTO movies SET title = :title
    $query = $pdo->prepare("INSERT INTO movies SET title = :title, year = :year, length = :length, image_url = :image_url, description = :description, movie_url = :movie_url"); 
    $query->execute([
        'title' => $title,
        'year' => $year, 
        'length' => $length, 
        'image_url' => $image_url,
        'description' => $description,
        'movie_url' => $movie_url 
    ]);
    
    return $pdo->lastInsertId();
}
 
function updateMovie($id, $title, $year, $length, $image_url, $description, $movie_url) {
    $pdo = createConnection();

    //$length = '02:00';
    $timestamp = strtotime($length); // 02:00
    $length = date('Y-m-d H:i:s', $timestamp); // 02:00:00

    // UPDATE movies SET title = :title WHERE id = :id
    $query = $pdo->prepare("UPDATE movies SET title = :title, year = :year, length = :length, image_url = :image_url, description = :description, movie_url = :movie_url WHERE id = :id"); 
    $query->execute([
        'id'    => $id,
        'title' => $title,
        'year' => $year, 
        'length' => $length,
        'image_url' => $image_url,
        'description' => $description,
        'movie_url' => $movie_url 
    ]); 
}


?>