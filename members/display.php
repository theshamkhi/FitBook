<?php
include('../config/db.php');

$sql = "SELECT * FROM membres";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Prénom</th><th>Nom</th><th>Email</th><th>Téléphone</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Prenom']}</td>";
        echo "<td>{$row['Nom']}</td>";
        echo "<td>{$row['Email']}</td>";
        echo "<td>{$row['Telephone']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun membre trouvé.";
}
?>
