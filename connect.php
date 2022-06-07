<?php
/*$event = array(

        array("id"=>101, "title"=>"Test1", "start"=>"2022-06-04 18:00:00", "end"=>"2022-06-04 19:00:00"),
);

echo json_encode($event);
*/

// Connexion à MySQL
$host='localhost';
$data='Calendrier';
$user='root';
$pass="";
$chrs='utf8mb4';
$attr="mysql:host=$host;dbname=$data;charset=$chrs";
$opts=
[
        PDO::ATTR_ERRMODE            =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   =>false,
];

try
{
$pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
        throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "SELECT * FROM Date";
$result = $pdo->query($query);
$result->execute();
$row = $result->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($row);

echo $json





?>
