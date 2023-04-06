<?php
session_start();
require("../_config/database.php");
$err = false;

if (isset($_POST['submit'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "1958";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if ($pseudo_saisi == $pseudo_par_defaut and $mdp_saisi == $mdp_par_defaut) {

            $_SESSION['mdp'] = $mdp_saisi;
            header('location: index.php');
        } else {
            $err = true;
            $err = "Veuillez saisir un pseudo ou mot de passe correcte";
        }
    } else {
        $err = true;
        $err = "Veuillez compléter tous les champs";
    }
}




?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../_includes/head.php"); ?>
    <title>Login</title>

    <style>
        h4 {
            text-align: center;
            padding: 10px 10px;
            background-color: brown;
        }
    </style>
</head>

<body class="bg-dark text-light">

    <form method="post">
        <div class="container mt-5 bg-secondary border border-primary rounded" style="margin-top: 7%;">
            <h1 class="title" style="text-align: center;">Login</h1>
            <h4><?php echo "$err"; ?></h4>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="exampleFormControlInput1" placeholder="enter pseudo" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter password</label>
                <input type="password" name="mdp" class="form-control" id="exampleFormControlInput1" placeholder="enter password" autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>




    <?php include("../_includes/footer.php"); ?>
</body>

</html>