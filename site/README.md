Jour 1: jai créer la barre de navigation pour les differentes page du site, et je m'apprète à commencer le header donc je ne sais pas quoi mèttre dans mon header.


require ('../data/database.php');
global $db;


if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo'] AND !empty($_POST['mdp']))){ 
        $q = $db->prepare("INSERT INTO users(pseudo,mdp) VALUES(:pseudo,:mdp)");
        $q->execute([
            'pseudo' => $_POST['pseudo'],
            'mdp' => $_POST['mdp']
        ]);

    }else{
        echo "Veiller remplire tout les champ....";
    }
}