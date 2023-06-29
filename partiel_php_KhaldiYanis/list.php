<?php
require_once 'connexion.php';

$requete = "SELECT * FROM Employee";
$resultat = mysqli_query($con, $requete);

if(mysqli_num_rows($resultat) > 0){
    
    //Liste des employés
    while($ligne = mysqli_fetch_assoc($resultat)){
        echo "<tr>";
        echo "<td>".$ligne['id']."</td>";
        echo "<td>".$ligne['name']."</td>";
        echo "<td>".$ligne['email']."</td>";
        echo "<td>".$ligne['age']."</td>";
        echo "<td>".$ligne['designation']."</td>";
        echo "<td>".$ligne['created']."</td>";
        echo "</tr>";
    }
    
} else {

    echo "Aucun employé trouvé";
}

mysqli_close($con);

?>







