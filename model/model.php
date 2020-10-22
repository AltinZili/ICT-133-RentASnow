<?php

function getPDO()
{
    require ".constant.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;
}


function getNews()
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM news ORDER BY date desc';
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

function getSnows()
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM snowtypes ORDER BY brand,model desc';
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

function getSnow($id)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM snowtypes WHERE id=:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getUserByEmail($email)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users WHERE email=:email';
        $statment = $dbh->prepare($query);
        $statment->execute(['email' => $email]);
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}



?>
