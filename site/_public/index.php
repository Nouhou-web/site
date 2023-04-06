<?php
session_start();
require('../_config/database.php');



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include '../_includes/head.php' ?>
    <style>
        hr {
            margin-bottom: 5%;
            border: 2px solid black;
        }

        /* affichage style */
        div.fl {
            text-align: center;
            margin-top: 3%;
            background-color: #212E53;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            overflow: hidden;
        }

        div.fl h5.aut {
            text-transform: uppercase;
        }

        a {
            text-decoration: none;
        }

        form {
            margin-bottom: 8%;
        }

        div.ty {
            margin-top: 7%;
            margin-bottom: 2%;
        }
    </style>
    <title>Roman</title>
</head>

<body>
    <?php include '../_includes/nav.php' ?>
    
    <hr>
    <div class="container mt-5">
        <?php
        $selectLivre = $db->query('SELECT * FROM doc ORDER BY id DESC');

        while ($livre = $selectLivre->fetch()) {
        ?>
            <div class="fl">
                <div class="name">
                    <h5 class="aut"><a href="<?= $livre['link']; ?>"><?= $livre['auteur']; ?></a></h5>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
    <?php include '../_includes/footer.php' ?>
</body>

</html>