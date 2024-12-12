<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBook - Display Members and Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto mt-10 space-y-8">
        <!-- Display Members -->
        <section>
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Members List</h1>
            <?php
            include('../config/db.php');

            $sqlMembers = "SELECT * FROM membres";
            $resultMembers = $conn->query($sqlMembers);

            if ($resultMembers->num_rows > 0) {
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
                while ($row = $resultMembers->fetch_assoc()) {
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
                echo "<p class='text-center text-gray-700 mt-5'>No members found.</p>";
            }
            ?>
        </section>

        <!-- Display Reservations -->
        <section>
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Reservations</h1>
            <?php
            $sqlReservations = "
                SELECT r.ReservationID, m.Prenom, m.Nom, m.Email, a.Nom AS ActivityName, r.ReservationDate 
                FROM reservations r
                INNER JOIN membres m ON r.MembreID = m.MembreID
                INNER JOIN activites a ON r.ActiviteID = a.ActiviteID
                ORDER BY r.ReservationDate ASC
            ";
            $resultReservations = $conn->query($sqlReservations);

            if ($resultReservations->num_rows > 0) {
                echo "
                <div class='overflow-x-auto'>
                    <table class='min-w-full bg-white border border-gray-200 rounded-lg shadow-lg'>
                        <thead>
                            <tr class='bg-gray-100 border-b'>
                                <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Member Name</th>
                                <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Email</th>
                                <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Activity</th>
                                <th class='px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase'>Reservation Date</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $resultReservations->fetch_assoc()) {
                    echo "
                            <tr class='border-b hover:bg-gray-50'>
                                <td class='px-6 py-4 text-sm text-gray-900'>{$row['Prenom']} {$row['Nom']}</td>
                                <td class='px-6 py-4 text-sm text-gray-900'>{$row['Email']}</td>
                                <td class='px-6 py-4 text-sm text-gray-900'>{$row['ActivityName']}</td>
                                <td class='px-6 py-4 text-sm text-gray-900'>" . date('d M Y, H:i', strtotime($row['ReservationDate'])) . "</td>
                            </tr>";
                }
                echo "
                        </tbody>
                    </table>
                </div>";
            } else {
                echo "<p class='text-center text-gray-700 mt-5'>No reservations found.</p>";
            }
            ?>
        </section>

        <div class="max-w-xs mx-auto mt-4">
            <a href="add.php" 
                class="w-full block text-center py-3 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add New
            </a>
        </div>
    </main>
</body>
</html>
