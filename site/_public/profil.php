<?php
session_start();
require('../_config/database.php');
if (!$_SESSION['mdp']) {
    header('location: login.php');
}

$all_livre = $db->query('SELECT * FROM doc ORDER BY id DESC');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $all_livre = $db->query('SELECT auteur FROM doc WHERE auteur LIKE "%' . $recherche . '%" ORDER BY id DESC');
}


?>
<link rel="stylesheet" href="style.">
<style>
    div.bt {
        display: flex;
        align-items: center;
        margin-top: 5%;
    }

    div.bt ul {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    div.bt ul {
        margin-left: 20%;
    }

    a {
        padding-right: 50px;
    }

    .none {
        margin-top: 5%;
        text-align: center;
        margin-bottom: 3%;
    }

    div.supp {
        display: flex;
    }

    div.supp ul {
        justify-content: center;
        align-items: center;
    }

    div.supp a {
        text-decoration: none;
        color: red;
        margin-left: 2 0px;
        padding: 2px;
        background-color: #212E53;
        border: none;
        border-radius: 5px;
    }

    div.supp .co {
        color: yellow;
    }

    .ty h1 {
        text-align: center;
        margin-bottom: 30px;
    }
</style>
<?php include("../_includes/head.php"); ?>
<title>Admin</title>
<!-- body -->
<?php include("../_includes/nav.php"); ?>
<div class="container mt-5">
    <div class="bt">
        <h1></h1>
        <ul>
            <h1 class="none"><a href="ajouter.php"><button type="button" class="btn btn-primary">Ajouter un auteur</button></a></h1>
        </ul>
        <ul>
            <a href="disconect.php"><button>Se déconnecter</button></a>
        </ul>
    </div>
    <hr>
    <div class="container ty">
        <h1>Liste des Romans</h1>
    </div>
    <section class="container">
        <?php
        if ($all_livre->rowCount() > 0) {

            while ($roman = $all_livre->fetch()) {
        ?>
                <div class="supp">
                    <ul class="pp">
                        <p><?= $roman['auteur']; ?></p>
                    </ul>
                    <ul class="lin">
                        <a href="supp.php?id=<?= $roman['id']; ?>">Supprimer</a>
                    </ul>
                    <ul class="lin">
                        <a href="modif.php?id=<?= $roman['id']; ?>" class="co">Modifier</a>
                    </ul>
                </div>
            <?php
            }
        } else {
            ?>
            <p>Aucun roman trouver...</p>
        <?php
        }
        ?>
    </section>
</div>
<!-- fin body -->
<?php include("../_includes/footer.php"); ?>