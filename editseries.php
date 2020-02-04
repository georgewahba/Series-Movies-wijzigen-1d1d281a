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
$rating=$_POST['rating'];
$description=$_POST['description'];
$has_won_awards=$_POST['has_won_awards'];
$seasons=$_POST['seasons'];
$country=$_POST['country'];
$language=$_POST['language'];


$sql="UPDATE series SET title=? , rating=?, description=?,has_won_awards=?, seasons=?, country=?, language=?  where id=?";
$stnt=$pdo->prepare($sql);
$stnt->execute([$title,$rating,$description,$has_won_awards,$seasons,$country,$language,$id]);

