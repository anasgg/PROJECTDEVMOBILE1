<?php
include("connexion.php");

// Récupérez les données du formulaire
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$password = isset($_POST['pwd']) ? $_POST['pwd'] : null;

// Recherchez l'utilisateur dans la base de données
$requete = $connexion->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
$requete->bind_param("ss", $phone, $phone);
$requete->execute();
$resultat = $requete->get_result();
$utilisateur = $resultat->fetch_assoc();

// Vérifiez le mot de passe
if ($utilisateur && password_verify($password, $utilisateur['pwd'])) {
    // L'utilisateur est authentifié
    header("Location: index.html");
    exit;
} else {
    // Identifiants invalides
    header("Location: index.html");
}

$requete->close();
$connexion->close();
?>
