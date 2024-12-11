<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBook</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
    include('../config/db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO membres (Prenom, Nom, Email, Telephone) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $phone);

        if ($stmt->execute()) {
            echo "Membre ajouté avec succès.";
        } else {
            echo "Erreur : " . $conn->error;
        }
    }
    ?>
    <main>
        <form method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
            <input type="text" name="firstname" placeholder="First name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="text" name="lastname" placeholder="Last name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="email" name="email" placeholder="Email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="text" name="phone" placeholder="Phone number" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <button type="submit" class="w-full py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 focus:outline-none">
                Register Now
            </button>
        </form>
    </main>
</body>
</html>



