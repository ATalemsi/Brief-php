<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des données</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<button id="addEmployeeBtn" class="bg-blue-500 text-white px-4 py-2 mt-4 mr-4 float-right">Ajouter Employé</button>
<button id="addEquipeBtn" class="bg-blue-500 text-white px-4 py-2 mt-4 mr-4 float-right">Ajouter Equipe</button>
<?php include('script.php'); ?>

<div id="employeeModalTrigger" class="hidden"></div>
<div id="employeeModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-6 rounded shadow-lg w-1/2">
            <!-- Your employee addition form goes here -->
            <form action="" method="post" class="space-y-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                <input type="text" name="nom" required class="w-full p-2 border rounded-md">

                <label for="prenom" class="block text-sm font-medium text-gray-700">Prenom:</label>
                <input type="text" name="prenom" required class="w-full p-2 border rounded-md">

                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" required class="w-full p-2 border rounded-md">

                <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                <input type="text" name="tel" class="w-full p-2 border rounded-md">

                <label for="role" class="block text-sm font-medium text-gray-700">Role:</label>
                <input type="text" name="role" class="w-full p-2 border rounded-md">

                <label for="equipe_id" class="block text-sm font-medium text-gray-700">ID de l'équipe:</label>
                <input type="text" name="equipe_id" class="w-full p-2 border rounded-md">

                <label for="statut" class="block text-sm font-medium text-gray-700">Statut:</label>
                <input type="text" name="statut" class="w-full p-2 border rounded-md">

                <!-- Add more input fields for other columns as needed -->

                <button type="submit" name="addM" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-md">Ajouter</button>
            </form>
            <button id="closeModalBtn" class="text-red-500 mt-2 bg-red-500 text-white px-4 py-2 rounded-md">Fermer</button>
        </div>
    </div>
</div>

<div id="equipeModalTrigger" class="hidden"></div>
<div id="equipeModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-6 rounded shadow-lg w-1/2">
            <!-- Your employee addition form goes here -->
            <form action="" method="post" class="space-y-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom Equipe:</label>
                <input type="text" name="nomE" required class="w-full p-2 border rounded-md">

                <label for="prenom" class="block text-sm font-medium text-gray-700">date creation:</label>
                <input type="date" name="date_creation" required class="w-full p-2 border rounded-md">

                <!-- Add more input fields for other columns as needed -->

                <button type="submit" name="addE" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-md">Ajouter</button>
            </form>
            <button id="closeModalBtn" class="text-red-500 mt-2 bg-red-500 text-white px-4 py-2 rounded-md">Fermer</button>
        </div>
    </div>
</div>


<script>
     document.getElementById('addEmployeeBtn').addEventListener('click', function() {
        document.getElementById('employeeModalTrigger').classList.remove("hidden");
        document.getElementById('employeeModal').classList.remove("hidden");
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('employeeModalTrigger').classList.add("hidden");
        document.getElementById('employeeModal').classList.add("hidden");
    });

    document.getElementById('addEquipeBtn').addEventListener('click', function() {
        document.getElementById('equipeModalTrigger').classList.remove("hidden");
        document.getElementById('equipeModal').classList.remove("hidden");
    });

    document.getElementById('closeEquipeBtn').addEventListener('click', function() {
        document.getElementById('equipeModalTrigger').classList.add("hidden");
        document.getElementById('equipeModal').classList.add("hidden");
    });
</script>
</body>
</html>