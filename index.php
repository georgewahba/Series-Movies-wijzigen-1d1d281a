<?php
$host = '127.0.0.1';
$db = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
echo $pdo->query('select version()')->fetchColumn();

echo "<br/> <br/> <br/>" . "series" . "<br/>";

$stmt = $pdo->query('SELECT * FROM netland.series ORDER BY rating;');
while ($row = $stmt->fetch()) {
    echo "<br/>" . $row['title'] . " rating " . $row['rating'] . "<a href='series.php?id=" . $row['id'] . "'>Meer informatie</a>";
}

echo "<br/> <br/> <br/>" . "movies" . "<br/>";

$stmt = $pdo->query('SELECT * FROM netland.movies  ORDER BY title;');
while ($row = $stmt->fetch()) {
    echo "<br/>" . $row['title'] . " duur " . $row['duur'] . "<a href='films.php?id=" . $row['id'] . "'>Meer informatie</a>";
}
?>
<html>
<br>
<a href='index.php?order=title'>Title</a>
<a href='index.php?order=rating'>rating</a>

</html>