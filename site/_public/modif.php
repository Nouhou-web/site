<?php
session_start();
require('../_config/database.php');
$err = false;
if (!$_SESSION['mdp']) {
    header('location: login.php');
}

if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];

    $recuproman = $db->prepare('SELECT * FROM doc WHERE id = ?');
    $recuproman->execute(array($getid));

    if ($recuproman->rowCount() > 0) {
        $stockroman = $recuproman->fetch();

        $auteur = $stockroman['auteur'];
        $link = str_replace('<br />', '', $stockroman['link']);
        if(isset($_POST['submit'])){

            $auteur_saisi = htmlspecialchars($_POST['pseudo']);
            $link_saisi = nl2br(htmlspecialchars($_POST['link']));
    
            $updateroman = $db->prepare('UPDATE doc SET auteur = ?, link = ? WHERE id = ?');
            $updateroman->execute(array($auteur_saisi, $link_saisi, $getid));

            header('location: profil.php');
        }

    } else {
        $err = true;
        $err =  "Aucun Roman trouver";
    }
} else {
    $err = true;
    $err =  "Aucun identifiant trouver";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../_includes/head.php"); ?>
    <title>Mofidier</title>
    <style>
        h4 {
            text-align: center;
            margin-top: 20%;
            font-size: 20px;
            color: red;
        }
    </style>

</head>

<body>
    <h4><?= $err; ?></h4>

    <form method="post">
        <div class="container mt-5 bg-secondary border border-primary rounded" style="margin-top: 7%;">
            <h1 class="title" style="text-align: center;">Modifier</h1>
            <h4><?= $err; ?></h4>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter author</label>
                <input type="text" name="pseudo" class="form-control" id="exampleFormControlInput1" placeholder="enter pseudo" autocomplete="off" value="<?= $auteur; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter link</label>
                <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="enter password" autocomplete="off" value="<?= $link; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>


    <?php include("../_includes/head.php"); ?>
</body>

</html>