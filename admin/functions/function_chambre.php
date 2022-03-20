<?php

class Chambre
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

    public function add()
    {
        $capicite = $_POST["capacite"];
        $exposition = $_POST["exposition"];
        $douche = $_POST["douche"];
        $etage = $_POST["etage"];
        $tarif_id = $_POST["tarif_id"];

        $this->bdd->query("INSERT INTO chambres (capacite, exposition, douche, etage, tarif_id) VALUES ('$capicite', '$exposition', '$douche', '$etage', '$tarif_id')");
        header("Location: /chambres.php");
    }

    public function modify()
    {
        $capicite = $_POST["capacite"];
        $exposition = $_POST["exposition"];
        $douche = $_POST["douche"];
        $etage = $_POST["etage"];
        $tarif_id = $_POST["tarif_id"];
        $this->bdd->query("UPDATE chambres SET capacite = '$capicite', exposition = '$exposition', douche = '$douche', etage = '$etage', tarif_id = '$tarif_id' WHERE id = $this->id");
        header("Location: /chambres.php");
    }

    public function delete()
    {
        $this->bdd->query("DELETE FROM planning WHERE chambre_id = $this->id");
        $this->bdd->query("DELETE FROM chambres WHERE id = $this->id");
        header("Location: /chambres.php");
    }
}
