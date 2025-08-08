<?php
 
const HOST = 'server39.webgo24.de';
const DB_NAME = 'web176_db10';
const DB_USER = 'web176_10';
const DB_PASSWORD = 'Fludestan204$';
 
// DSN Data-Source-Name: mysql:host=localhost;dbname=erstesDBProjekt
$dsn = 'mysql:host='.HOST.';dbname='.DB_NAME;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {  // PDP - PDO DATA OBJECT
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD); // Versucht eien DB-Verbindung aufzubauen
    // echo 'DB Verbindung aufgebaut!';
} catch(\PDOException $e) {
    echo 'Irgendetwas ist schief gelaufen!<br />';
    echo $e->getMessage(); // Zeigt die Fehlermeldung an
}