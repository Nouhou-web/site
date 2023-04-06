<?php
require('../_config/database.php');
session_start();
if (!$_SESSION['mdp']) {
    header('location: login.php');
}
$err = false;

if (isset($_POST['submit']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['link']))
    {
        $auteur = nl2br(htmlspecialchars($_POST['pseudo']));
        $link = htmlspecialchars($_POST['link']);

        $inser = $db->prepare('INSERT INTO doc(auteur, link)VALUES(?, ?)');
        $inser->execute(array($auteur, $link));
        
        header('location: profil.php');
    }else
    {
        $err = true;
        $err = "error";
    }
}
    




?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../_includes/head.php"); ?>
    <title>Ajouter</title>
    <style>
        h4 {
            text-align: center;
            padding: 10px 10px;
            background-color: brown;
        }
    </style>
</head>

<body>
    <form method="post">
        <div class="container mt-5 bg-secondary border border-primary rounded" style="margin-top: 7%;">
            <h1 class="title" style="text-align: center;">Ajouter</h1>
            <h4><?= $err; ?></h4>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter author</label>
                <input type="text" name="pseudo" class="form-control" id="exampleFormControlInput1" placeholder="enter pseudo" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter link</label>
                <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="enter password" autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>




    <?php include("../_includes/head.php"); ?>
</body>

</html>