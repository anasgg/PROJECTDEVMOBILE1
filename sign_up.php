<?php
include("connexion.php");

// Récupérez les données du formulaire
$username = isset($_POST['username']) ? $_POST['username'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$password = isset($_POST['pwd']) ? password_hash($_POST['pwd'], PASSWORD_DEFAULT) : null;


// Insérez les données dans la base de données
$requete = $connexion->prepare("INSERT IGNORE  INTO users (full_name, email, phone, password) VALUES (?, ?, ?, ?)");
$requete->bind_param("ssss", $username, $email, $phone, $password);

if ($requete->execute()) {
    echo "Félicitation Monsieur " . ucfirst($username) . ", votre inscription a réussi.";
    echo 'Veuillez <a href="sign_in.html">cliquer ici</a> pour vous diriger vers la page de connexion.';
      

} else {
    echo "Erreur lors de l'inscription : " . $requete->error;
}

$requete->close();
$connexion->close();
?>
