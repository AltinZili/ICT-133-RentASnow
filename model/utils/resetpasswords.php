<?php


function getPDO()
{
    require "../.constant.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;
}

function getUsers()
{
    //return json_decode(file_get_contents("model/dataStorage/users.json"), true);

    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users';
        $statment = $dbh->prepare($query);
        $statment->execute();
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

$users = getUsers();
foreach ($users as $user) {
    $hash = password_hash($user['firstname'], PASSWORD_DEFAULT);
    echo $user['firstname'] . " => $hash \n";
    try {
        $dbh = getPDO();
        $query = 'UPDATE users SET password=:password WHERE id=:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $user['id'], 'password' => $hash]);
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

?>
