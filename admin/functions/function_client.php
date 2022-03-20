<?php

class Client
{
    private $id;
    private $bdd;
    const user = "root";
    const password = "";
    const dns = "mysql:host=localhost;dbname=neptune";

    public function __construct($id)
    {
        $this->id = $id;
        $this->bdd = new PDO(self::dns, self::user, self::password);
    }

    public function modify()
    {
        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $codePostal = $_POST['codePostal'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $this->bdd->query("UPDATE clients SET civilite = '$civilite', nom = '$nom', prenom = '$prenom', email = '$email', adresse = '$adresse', codePostal = '$codePostal', ville = '$ville', pays_id = '$pays' WHERE id = $this->id");
        header('Location: /');
    }

    public function add()
    {
        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $codePostal = $_POST['codePostal'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $this->bdd->query("INSERT INTO clients (civilite, email, nom, prenom, adresse, codePostal, ville, pays_id) VALUES ('$civilite', '$email', '$nom', '$prenom', '$adresse', '$codePostal', '$ville', '$pays')");
        header('Location: /');
    }

    public function addReservation()
    {

        $chambre_id = $_POST["chambre_id"];
        $jour = new DateTime($_POST["jour"]);
        $jour =  $jour->format('Y-m-d H:i:s');
        $acompte = $_POST['acompte'];
        $paye = $_POST['paye'];

        $sth = $this->bdd->query("SELECT * FROM planning WHERE chambre_id = $chambre_id AND jour = '$jour'");
        $check_exist = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($check_exist)) {
            return "Cette réservation est deja prise";
            return false;
        }
        $this->bdd->query("INSERT INTO planning (client_id, chambre_id, jour, acompte, paye) VALUES ('$this->id', '$chambre_id', '$jour', '$acompte', '$paye')");
        header("Location: /reservation.php/?client_id=$this->id");
    }

    public function delete()
    {
        $this->bdd->query("DELETE FROM planning WHERE client_id = $this->id");
        $this->bdd->query("DELETE FROM clients WHERE id = $this->id");
        header('Location: /');
    }

    public function deleteReservation()
    {
        $chambre_id = $_GET["chambre_id"];
        $jour = $_GET["jour"];
        $this->bdd->query("DELETE FROM planning WHERE client_id = $this->id AND chambre_id = $chambre_id AND jour = '$jour'");
        header("Location: /reservation.php/?client_id=$this->id");
    }


    public function reservation()
    {
        $sth = $this->bdd->query("SELECT * FROM planning WHERE client_id = $this->id");
        return $sth->fetchALl(PDO::FETCH_ASSOC);
    }

    function modifyPlaning()
    {
        $chambre_id = $_GET['chambre_id'];
        $jour = $_GET['jour'];
        $acompte = $_POST['acompte'];
        $paye = $_POST['paye'];
        $this->bdd->query("UPDATE planning SET acompte = '$acompte', paye = '$paye' WHERE chambre_id = '$chambre_id' AND jour = '$jour' AND client_id = '$this->id' ");
        header("Location: /reservation.php/?client_id=$this->id");
    }
}
