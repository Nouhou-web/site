<?php
session_start();
require('../_config/database.php');
$err = false;
if (!$_SESSION['mdp']) {
    header('location: login.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recuproman = $db->prepare('SELECT * FROM doc WHERE id = ?');
    $recuproman->execute(array($getid));

    if($recuproman->rowCount() > 0){

        $delecteroman = $db->prepare('DELETE FROM doc WHERE id = ?');
        $delecteroman->execute(array($getid));
        header('location: profil.php');

    }else{
        $err = true;
        $err = 'Aucun roman trouver';
    }

}else{
    $err = true;
    $err =  "Aucun identifiant trouver";
}


?>

<style>
    h4{
        text-align: center;
        margin-top: 20%;
        font-size: 20px;
        color: red;
    }
</style>

    <h4><?= $err; ?></h4>