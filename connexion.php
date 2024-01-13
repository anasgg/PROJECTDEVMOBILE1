<?php
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$mot_de_passe = "admin"; // Mot de passe MySQL
$nom_base_de_donnees = "identifiant_client"; // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}
?>
