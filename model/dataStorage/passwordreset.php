<?php
/*
    Projet:
    Auteur: Altin Zili
    Date: 
    Version:
    Description
*/

$users = getUsers();

foreach ($users as $user)
{
    $hash = password_hash($user['firstname'],PASSWORD_DEFAULT);
    echo $user['firstname']." => $hash \n";
    // TODO Ecrire le code pour mettre à jour le mot de passe dans la base de données avec $hash
function updateFilmMaker($item){
    try {
        $dbh = getPDO();
        $query = "UPDATE users SET email=:email,
    password=:password,
    type=:type,
    firstname=:firstname,
    lastname=:lastname
    phonenumber=:phonenumber WHERE id =:id";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute($item);//execute query
        $dbh = null;
        return true;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

$user['password'] = $hash;

updateFilmMaker($user);



?>




