<?php
require_once 'connexion.php';

// Verification du type de la requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Vérification des paramètres
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['designation'])) {

        echo "Les paramètres : ID, name, email, age et designation sont requis.";
        exit;
    }

    // Récupération des paramètres
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $designation = $_POST['designation'];

    $requete = "UPDATE Employee SET name = ?, email = ?, age = ?, designation = ? WHERE id = ?";

    $statement = mysqli_prepare($con, $requete);

    mysqli_stmt_bind_param($statement, "ssisi", $name, $email, $age, $designation, $id);

    if (mysqli_stmt_execute($statement)) {

        echo "Mise à jour des informations de l'employé avec succès.";

    } else {

        echo "Erreur lors de la mise à jour des informations de l'employé : " . mysqli_error($con);

    }

    mysqli_stmt_close($statement);

} 

mysqli_close($con);
?>
