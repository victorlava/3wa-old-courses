1. Susikursime failų struktūrą:
    server (direktorija)
        - config.php
        - utilities.php
    templates (direktorija)
        - footer.view.php
        - form.view.php
        - header.view.php
        - menu.view.php
    create.php
    delete.php
    index.php
    read.php
    update.php 



























2. Pradėsime darbą su HTML kodu:
    2.1 Apsirašysime <head> dalį templates/header.view.php faile. Įsiterpsime bootstrap stilius (v3.3.7)
    2.2 Apsirašysime templates/menu.view.php failą - čia bus mūsų meniu iš Bootstrapo
    2.3 Apsirašysime templates/footer.view.php failą - įsiterpsime jQuery ir Bootstrap ir uždarysime <body> ir <html> žymas
    2.4 Pradėsime darbą su index.php failu. Čia įsiterpsime heeader.view.php, menu.view.php ir footer.view.php failus.
    2.5 Pradėsime apsirašyti index.php failo HTML struktūrą. Panaudosime "Bootstrap grid" filmų išdėstymui. Filmo nuotraukas laikinai paimsime iš http://www.imdb.com.

3. Pradėsime darbą su duomenų baze:
    3.1 Prisijungsime prie phpMyAdmin. Prisijungimai turėtų būti tokie. Username: root, password: root
    3.2 Susikursime duomenų bazę pavadinimu imbdb_movies
    3.3 Susikursime lentelę movies, kuri turės šiuos laukus: id, title, year, length, image
    3.4 Įsikelsime testinių duomenų į duomenų bazę. Filmus imkite iš index.php failo arba imdb.com.
    3.5 Apsirašysime server/config.php failą. Šis failas turės createConnection() funkciją ir duomenų bazės prisijungimus. Ši funkciją turi grąžinti mūsų duomenų bazės objektą.

4. Pradėsime darbą su server/utilities.php failu. 
    4.1 Apsirašysime funkciją getMovies(). Ši funkcija pasiema mūsų duomenų bazės objektą su createConnection, įvykdo SQL užklausą ir grąžina duomenis.
    4.2 Funkciją getMovies() išsikviesime index.php faile ir gautus duomenis atvaizduosime panaudodami foreach ciklą.
    4.3 Apsirašysime funkciją getMovie($id). Ši funkcija įvykdo SQL užklausą ir grąžina tik vieno filmo duomenis. Reikės panaudoti prepare(), execute() ir fetch(). Taip pat SQL (WHERE).
    4.4 Apsirašysime minimalų HTML kodą read.php faile
    4.5 read.php faile išsikviesime getMovie($_GET["id"]) ir atvaizduosime gautus duomenis.


5. Pradėsime darbą su create.php failu. Šis failas atsakingas už filmų įkėlimą į duomenų bazę.
    1.1 Apsirašysime HTML templates/form.view.php failą. Šiame faile bus mūsų formos struktūra.
    1.2 Formai aprašyti naudosimes Bootstrap HTML struktūrą. Forma turės išsiųsti POST tipo užklausą/duomenis.
    1.3 Laukelių vardai: title, year, length, image, trailer, description.
    1.4 Įsiterpsime templates/form.view.php į create.php failą
    1.5 create.php faile prisidėsime puslapio antraštę (h1)
    1.6 Taip pat create.php faile įsiterpsime savo pagalbinę biblioteką server/utilities.php
    1.7 Apsirašysime filmo įkėlimą į duomenų bazę su "INSERT INTO". Prisijungimui prie duomenų bazės panaudosime createConnection(). Įkėlus failą turėsime pasiimti "lastInsertedId".
    1.8 Įkėlus filmą puslapis turės persikrauti ir grįšti į tą patį puslapį. Perkrovimui panaudosime header() funkciją.
    1.9 Išskaidysime kodą į funkcijas ir sutvarkysime create.php failą 

6. Pradėsime darbą su update.php failu. Šis failas atsakingas už filmo duomenų atnaujinimą/pakeitimą
    2.1 Įsiterpsime templates/form.view.php į create.php failą
    2.2 update.php faile prisidėsime puslapio antraštę (h1)
    2.3 Taip pat update.php faile įsiterpsime savo pagalbinę biblioteką server/utilities.php
    2.4 Apsirašysime filmo atnaujinimą/pakeitimą su "UPDATE". Prisijungimui prie duomenų bazės panaudosime createConnection().
    2.5 Atnaujinus/pakeitus filmą puslapis turės persikrauti ir grįšti į tą patį puslapį. Perkrovimui panaudosime header() funkciją.
    2.6 Išskaidysime kodą į funkcijas ir sutvarkysime update.php failą

7. Pradėsime darbą su delete.php failu. Šis failas atsakingas už filmo ištrinimą iš duomenų bazės.
    3.1 delete.php faile įsiterpsime savo pagalbinę biblioteką server/utilities.php
    3.2 Apsirašysime filmo ištrinimą iš duomenų bazės su "DELETE FROM". Prisijungimui prie duomenų bazės panaudosime createConnection().
    3.3 Kai ištrinsime filmą puslapis turės persikrauti į pagrindinį puslapį
    3.4 Išskaidysime kodą į funkcijas ir sutvarkysime delete.php failą
