<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $join_date = $_POST['join_date'];

    $sql = "INSERT INTO members (name, email, phone, join_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $join_date);

    if ($stmt->execute()) {
        echo "Membre ajouté avec succès.";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Téléphone" required>
    <input type="date" name="join_date" required>
    <button type="submit">Ajouter</button>
</form>
