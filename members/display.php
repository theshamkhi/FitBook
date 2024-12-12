<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBook</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto mt-10">
        <?php
        include('../config/db.php');

        $sql = "SELECT * FROM membres";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "
            <div class='overflow-x-auto'>
                <table class='min-w-full bg-white border border-gray-200 rounded-lg shadow-lg'>
                    <thead>
                        <tr class='bg-gray-100 border-b'>
                            <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>First name</th>
                            <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Last name</th>
                            <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Email</th>
                            <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Phone number</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "
                        <tr class='border-b hover:bg-gray-50'>
                            <td class='px-6 py-4 text-sm text-gray-900'>{$row['Prenom']}</td>
                            <td class='px-6 py-4 text-sm text-gray-900'>{$row['Nom']}</td>
                            <td class='px-6 py-4 text-sm text-gray-900'>{$row['Email']}</td>
                            <td class='px-6 py-4 text-sm text-gray-900'>{$row['Telephone']}</td>
                        </tr>";
            }
            echo "
                    </tbody>
                </table>
            </div>";
        } else {
            echo "<p class='text-center text-gray-700 mt-5'>Aucun membre trouvé.</p>";
        }
        ?>
    </main>
    <div class="max-w-xs mx-auto mt-4">
            <a href="add.php" 
                class="w-full block text-center py-3 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add New Members
            </a>
    </div>
</body>
</html>

