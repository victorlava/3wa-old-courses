<?php

//Prisijungiame prie duomenų bazės ir grąžiname duomenų bazės objektą
function createConnection(){ 

    $db = "mysql:dbname=imdb_movies;host=localhost;charset=utf8";
    $user = 'root';
    $password = '';

    $pdo = new PDO($db, $user, $password);

    return $pdo;

}
 


?>