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
        $query = 'SELECT *, snows.id AS snowid FROM snows INNER JOIN snowtypes on snowtype_id = snowtypes.id WHERE snows.id=:id';
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

function withdrawSnow($id){
    try {
        $dbh = getPDO();
        $query = 'UPDATE snows SET available=false WHERE id=:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function createRent($userid) {
try {
        $dbh = getPDO();
        $query = 'INSERT INTO rents(status, start_on, user_id) VALUES(:status, :start_on, :userid)';
        $statment = $dbh->prepare($query);
        $statment->execute(["status" => 'open', "start_on" => '2020-02-02', "userid" => $userid]);
        return $dbh->lastInsertId();
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function addSnowToRent($snow, $rentid) {
    try {
        $dbh = getPDO();
        $query = 'INSERT INTO rentsdetails(snow_id, rent_id, nbDays, status) VALUES(:snowid, :rentid, :nbDays, :status)';
        $statment = $dbh->prepare($query);
        $statment->execute(["snowid" => $snow['snowid'], "rentid" => $rentid, "nbDays" => '30', "status" => 'open']);
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getRentsOfsnow($id){
    try {
        $dbh = getPDO();
        $query = 'SELECT firstname, lastname, start_on, nbDays, rents.status FROM snows INNER JOIN rentsdetails on snow_id = snows.id
INNER  JOIN rents on rent_id = rents.id
INNER JOIN users on user_id = users.id WHERE snows.id=:id';
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
