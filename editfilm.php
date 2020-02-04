<?php

$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';   

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

$id= $_POST['id'];
$title=$_POST['title'];
$duur=$_POST['duur'];
$datum_van_uitkomst=$_POST['datum_van_uitkomst'];
$land_van_uitkomst=$_POST['land_van_uitkomst'];
$description=$_POST['description'];
$youtube_trailer_id=$_POST['youtube_trailer_id'];


$sql="UPDATE movies SET title=? , duur=?, datum_van_uitkomst=?, land_van_uitkomst=?, description=?, youtube_trailer_id=?  where id=?";
$stnt=$pdo->prepare($sql);
$stnt->execute([$title,$duur,$datum_van_uitkomst,$land_van_uitkomst,$description,$youtube_trailer_id,$id]);

