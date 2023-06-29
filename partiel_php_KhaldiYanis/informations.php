    <?php
    require_once 'connexion.php';

    // Verification du type de la requête
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST['id'])) {
            echo "L'ID de l'employé est requis.";
            exit;
        }

        $id = $_POST['id'];

        $requete = "SELECT * FROM Employee WHERE id = ?";

        $statement = mysqli_prepare($con, $requete);

        mysqli_stmt_bind_param($statement, "i", $id);

        if (mysqli_stmt_execute($statement)) {
            $result = mysqli_stmt_get_result($statement);

            // Vérification
            if (mysqli_num_rows($result) > 0) {

                $employee = mysqli_fetch_assoc($result);
                echo "ID : " . $employee['id'] . "<br>";
                echo "Nom : " . $employee['name'] . "<br>";
                echo "Email : " . $employee['email'] . "<br>";
                echo "Âge : " . $employee['age'] . "<br>";
                echo "Designation : " . $employee['designation'] . "<br>";
                echo "Date de création : " . $employee['created'] . "<br>";

            } else {

                echo "Aucun employé trouvé avec cet ID.";

            }
        } else {

            echo "Erreur lors de la récupération de l'employé : " . mysqli_error($con);

        }

        mysqli_stmt_close($statement);

    } else {

        echo "La requête utilisée doit être POST";

    }

    mysqli_close($con);
    ?>
