<?php
include('../config/db.php');

$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nom</th><th>Email</th><th>Téléphone</th><th>Date d'inscription</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['join_date']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun membre trouvé.";
}
?>
