<!DOCTYPE html>
<html>
<body> 


<?php
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$dsn = getenv('MYSQL_DSN');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');


try
{
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Succesfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();

    echo "Connection Failed ". $e->getMessage();
}

?>

 <h1>Suraj</h1>
</body>
</html>