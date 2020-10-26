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

function getRealSnow($id)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM snows INNER JOIN snowtypes on snowtype_id = snowtypes.id WHERE snows.id=:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getSnowsOfType($id)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM snows WHERE snowtype_id=:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateSnow($snowData)
{
    if(isset($snowData['available']))
    {
        $snowData['available'] = 1;
    } else {
        $snowData['available'] = 0;
    }
    try {
        $dbh = getPDO();
        $query = 'UPDATE snows SET code=:code, length=:length, state=:state, available=:available  WHERE id=:id';
        $statment = $dbh->prepare($query);
        $statment->execute($snowData);
        $dbh = null;
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
