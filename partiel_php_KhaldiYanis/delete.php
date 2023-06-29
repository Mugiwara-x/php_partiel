<?php
require_once 'connexion.php';

// Verification du type de la requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['id'])) {

        echo "ID de l'employé manquant.";
        exit;

    }

    $employee_id = $_POST['id'];

    $requete = "DELETE FROM Employee WHERE id = ?";

    $statement = mysqli_prepare($con, $requete);

    mysqli_stmt_bind_param($statement, "i", $employee_id);

    if (mysqli_stmt_execute($statement)) {

        echo "Employé supprimé avec succès.";

    } else {

        echo "Erreur lors de la suppression de l'employé : " . mysqli_error($con);

    }

    mysqli_stmt_close($statement);

} else {
    echo "La requête utilisée doit être POST";
}

mysqli_close($con);
?>

