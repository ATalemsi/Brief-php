<?php
$host = 'localhost';
$dataname = 'personnel';
$user = 'root';
$pass = 'root';

$dbh = mysqli_connect($host, $user, $pass, $dataname);

if (!$dbh) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT m.Id_M, m.nom, m.prenom, m.email, m.tel, m.rolee, m.statut, e.Id_E, e.nom_E, e.date_creation
FROM membre m
INNER JOIN Equipe e ON m.Equipe_ID = e.Id_E";
$stmt = mysqli_query($dbh, $query);
//--------------------------------------------
    $query2 = "SELECT * FROM membre ";
    $stmt2 = mysqli_query($dbh, $query2);
//----------------------------------------
    $query3 = "SELECT * FROM equipe ";
    $stmt3 = mysqli_query($dbh, $query3);
//---------affichage les donnee de deux table dans un seul table-------------------------------------------------
    if (mysqli_num_rows($stmt) > 0) {
        echo "<div class ='container mx-auto p-4'>";
        echo "<h2 class='text-2xl font-bold mb-4'>List of Members with Equipe Information</h2>";
        echo "<table class='w-full border-collapse'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='bg-gray-200 border'>ID-Membre</th>";
        echo "<th class='bg-gray-200 border'>nom</th>";
        echo "<th class='bg-gray-200 border'>prenom</th>";
        echo "<th class='bg-gray-200 border'>email</th>";
        echo "<th class='bg-gray-200 border'>Telephone</th>";
        echo "<th class='bg-gray-200 border'>Role</th>";
        echo "<th class='bg-gray-200 border'>statut</th>";
        echo "<th class='bg-gray-200 border'>ID-Equipe</th>";
        echo "<th class='bg-gray-200 border'>Equipe</th>";
        echo "<th class='bg-gray-200 border'>Date Creation</th>";
       
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($stmt)) {
            echo "<tr>";
            echo "<td class='border'>" . $row['Id_M'] . "</td>";
            echo "<td class='border'>" . $row['nom'] . "</td>";
            echo "<td class='border'>" . $row['prenom'] . "</td>";
            echo "<td class='border'>" . $row['email'] . "</td>";
            echo "<td class='border'>" . $row['tel'] . "</td>";
            echo "<td class='border'>" . $row['rolee'] . "</td>";
            echo "<td class='border'>" . $row['statut'] . "</td>";
            echo "<td class='border'>" . $row['Id_E'] . "</td>";
            echo "<td class='border'>" . $row['nom_E'] . "</td>";
            echo "<td class='border'>" . $row['date_creation'] . "</td>";
            echo "<td class='border'>";
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Aucun résultat trouvé.";
    }
//------------------affichage des donnees de la table membre---------------------------
    if (mysqli_num_rows($stmt2) > 0) {
        echo "<div class ='container mx-auto p-4'>";
        echo "<h2 class='text-2xl font-bold mb-4'>List of Members </h2>";
        echo "<table class='w-full border-collapse'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='bg-gray-200 border'>ID-Membre</th>";
        echo "<th class='bg-gray-200 border'>nom</th>";
        echo "<th class='bg-gray-200 border'>prenom</th>";
        echo "<th class='bg-gray-200 border'>email</th>";
        echo "<th class='bg-gray-200 border'>Telephone</th>";
        echo "<th class='bg-gray-200 border'>Role</th>";
        echo "<th class='bg-gray-200 border'>statut</th>";
        echo "<th class='bg-gray-200 border'>ID-Equipe</th>";
        echo "<th class='bg-gray-200 border'>Option</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($stmt2)) {
            echo "<tr>";
            echo "<td class='border'>" . $row['Id_M'] . "</td>";
            echo "<td class='border'>" . $row['nom'] . "</td>";
            echo "<td class='border'>" . $row['prenom'] . "</td>";
            echo "<td class='border'>" . $row['email'] . "</td>";
            echo "<td class='border'>" . $row['tel'] . "</td>";
            echo "<td class='border'>" . $row['rolee'] . "</td>";
            echo "<td class='border'>" . $row['statut'] . "</td>";
            echo "<td class='border'>" . $row['Equipe_ID'] . "</td>";
            
            echo "<td class='border'>";
            echo "<a href='{$_SERVER['PHP_SELF']}?delete={$row['Id_M']}' class='text-red-500'>Supprimer</a>";
            echo "<a href='{$_SERVER['PHP_SELF']}?update={$row['Id_M']}' class='text-blue-500 ml-2'>Modifier</a>";
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Aucun résultat trouvé.";
    }
    //------------------affichage des donnees de la table equipe---------------------------
    if (mysqli_num_rows($stmt3) > 0) {
        echo "<div class ='container mx-auto p-4'>";
        echo "<h2 class='text-2xl font-bold mb-4'>List of Team</h2>";
        echo "<table class='w-full border-collapse'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='bg-gray-200 border'>ID-Membre</th>";
        echo "<th class='bg-gray-200 border'>Eom_Equipe</th>";
        echo "<th class='bg-gray-200 border'>Date Creation</th>";
        echo "<th class='bg-gray-200 border'>Option</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($stmt3)) {
            echo "<tr>";
            echo "<td class='border'>" . $row['Id_E'] . "</td>";
            echo "<td class='border'>" . $row['nom_E'] . "</td>";
            echo "<td class='border'>" . $row['date_creation'] . "</td>";
            echo "<td class='border'>";
            echo "<a href='{$_SERVER['PHP_SELF']}?deleteE={$row['Id_E']}' class='text-red-500'>Supprimer</a>";
            echo "<a href='{$_SERVER['PHP_SELF']}?updateE={$row['Id_E']}' class='text-blue-500 ml-2'>Modifier</a>";
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Aucun résultat trouvé.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addM'])) {
        addMember($dbh);
    }

    // Handle record deletion
    if (isset($_GET['delete'])) {
        deleteMember($dbh);
    }

    // Handle record update
    if (isset($_GET['update'])) {
        updateMemberForm($dbh);
    }

    // Handle form submission for updating a record
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        updateMember($dbh);
    }
    //-----for equipe-------------------
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addE'])) {
        addequipe($dbh);
    }

    // Handle record deletion
    if (isset($_GET['deleteE'])) {
        deleteEquipe($dbh);
    }

    // Handle record update
    if (isset($_GET['updateE'])) {
        updateEquipeForm($dbh);
    }

    // Handle form submission for updating a record
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateE'])) {
        updateEquipe($dbh);
    }
    mysqli_close($dbh);
//-----------------add option of membre--------------------------------    
function addMember($conn)
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $role = $_POST['role'];
    $equipe_id = $_POST['equipe_id'];
    $statut = $_POST['statut'];

    $query = "INSERT INTO membre (nom, prenom, email, tel, rolee, Equipe_ID, statut) 
          VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Assuming $nom, $prenom, $email, $telephone, $role, $equipe_id, $statut are your variables
        mysqli_stmt_bind_param($stmt, 'sssssis', $nom, $prenom, $email, $telephone, $role, $equipe_id, $statut);

        // Check if the statement is executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement
            mysqli_stmt_close($stmt);

            // Redirect to the same page after adding to prevent form resubmission
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            // Handle execution error
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        // Handle preparation error
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}

function deleteMember($conn)
{
    
    // Assuming $conn is your MySQLi connection object
    $idToDelete = $_GET['delete'];

    $query = "DELETE FROM membre WHERE Id_M = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Assuming $idToDelete is an integer (change the 'i' if it's a different type)
        mysqli_stmt_bind_param($stmt, 'i', $idToDelete);

        // Check if the statement is executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement
            mysqli_stmt_close($stmt);    
            
           
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            // Handle execution error
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        // Handle preparation error
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}


function updateMemberForm($conn)
{
    $idToUpdate = $_GET['update'];

    // Assuming $conn is your MySQLi connection object
    $query = "SELECT * FROM membre WHERE Id_M= ?";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Assuming $idToUpdate is an integer (change the 'i' if it's a different type)
        mysqli_stmt_bind_param($stmt, 'i', $idToUpdate);

        // Check if the statement is executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt,$id, $nom, $prenom, $email, $telephone, $role, $equipe_id, $statut); // Add more variables as needed

            // Fetch the data
            mysqli_stmt_fetch($stmt);
            echo "<div class='container mx-auto p-4'>";
            echo "<h2 class='text-2xl font-bold mb-4'>Modifier le membre</h2>";
            echo "<form action='' method='post' class='max-w-md mx-auto'>";
            echo "<input type='hidden' name='updateId' value='{$idToUpdate}' class='hidden'>";
            
            echo "<label for='nom' class='block text-sm font-medium text-gray-700'>Nom:</label>";
            echo "<input type='text' name='nom' value='{$nom}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='prenom' class='block text-sm font-medium text-gray-700'>Prenom:</label>";
            echo "<input type='text' name='prenom' value='{$prenom}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='email' class='block text-sm font-medium text-gray-700'>Email:</label>";
            echo "<input type='email' name='email' value='{$email}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='telephone' class='block text-sm font-medium text-gray-700'>Téléphone:</label>";
            echo "<input type='text' name='telephone' value='{$telephone}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='role' class='block text-sm font-medium text-gray-700'>Role:</label>";
            echo "<input type='text' name='role' value='{$role}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='equipe_id' class='block text-sm font-medium text-gray-700'>ID de l'équipe:</label>";
            echo "<input type='text' name='equipe_id' value='{$equipe_id}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='statut' class='block text-sm font-medium text-gray-700'>Statut:</label>";
            echo "<input type='text' name='statut' value='{$statut}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            // Add more input fields for other columns as needed
            
            echo "<button type='submit' name='update' class='mt-4 bg-blue-500 text-white px-4 py-2 rounded-md'>Mettre à jour</button>";
            echo "</form>";
            echo "</div>";
            
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Handle execution error
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        // Handle preparation error
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}


function updateMember($conn)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $updateId = $_POST['updateId'];
        $updatedNom = $_POST['nom'];
        $updatedPrenom = $_POST['prenom'];
        $updatedEmail = $_POST['email'];
        $updatedTelephone = $_POST['telephone'];
        $updatedRole = $_POST['role'];
        $updatedEquipeId = $_POST['equipe_id'];
        $updatedStatut = $_POST['statut'];

        $query = "UPDATE membre SET nom = ?, prenom = ?, email = ?, tel = ?, rolee = ?, Equipe_ID = ?, statut = ? WHERE Id_M = ?";
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'sssssssi', $updatedNom, $updatedPrenom, $updatedEmail, $updatedTelephone, $updatedRole, $updatedEquipeId, $updatedStatut, $updateId);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
//----------------------add option of equipe--------------------
function addequipe($conn)
{
    $nomE = $_POST['nomE'];
    $date = $_POST['date_creation'];

    $query = "INSERT INTO equipe (nom_E, date_creation) 
          VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Assuming $nom, $prenom, $email, $telephone, $role, $equipe_id, $statut are your variables
        mysqli_stmt_bind_param($stmt, 'ss', $nomE, $date);

        // Check if the statement is executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement
            mysqli_stmt_close($stmt);
            // Redirect to the same page after adding to prevent form resubmission
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            // Handle execution error
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        // Handle preparation error
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}
function deleteEquipe($conn)
{
    ob_start();
    // Assuming $conn is your MySQLi connection object
    $idToDelete = $_GET['deleteE'];

    $query = "DELETE FROM equipe WHERE Id_E = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Assuming $idToDelete is an integer (change the 'i' if it's a different type)
        mysqli_stmt_bind_param($stmt, 'i', $idToDelete);

        // Check if the statement is executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement
            mysqli_stmt_close($stmt);    
            ob_end_flush();
           
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            // Handle execution error
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        // Handle preparation error
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}


function updateEquipeForm($conn)
{
    $idToUpdate = $_GET['updateE'];

    // Assuming $conn is your MySQLi connection object
    $query = "SELECT * FROM equipe WHERE Id_E = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Assuming $idToUpdate is an integer (change the 'i' if it's a different type)
        mysqli_stmt_bind_param($stmt, 'i', $idToUpdate);

        // Check if the statement is executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $nomE, $date); // Add more variables as needed

            // Fetch the data
            mysqli_stmt_fetch($stmt);

            echo "<div class='container mx-auto p-4'>";
            echo "<h2 class='text-2xl font-bold mb-4'>Modifier le membre</h2>";
            echo "<form action='' method='post' class='max-w-md mx-auto'>";
            echo "<input type='hidden' name='updateId' value='{$idToUpdate}' class='hidden'>";
            
            echo "<label for='nomE' class='block text-sm font-medium text-gray-700'>Nom:</label>";
            echo "<input type='text' name='nomE' value='{$nomE}' required class='mt-1 p-2 border rounded-md w-full'>";
            
            echo "<label for='date_creation' class='block text-sm font-medium text-gray-700'>Prenom:</label>";
            echo "<input type='date' name='date_creation' value='{$date}' required class='mt-1 p-2 border rounded-md w-full'>";

            // Add more input fields for other columns as needed

            echo "<button type='submit' name='updateE' class='mt-4 bg-blue-500 text-white px-4 py-2 rounded-md'>Mettre à jour</button>";
            echo "</form>";
            echo "</div>";
            

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Handle execution error
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        // Handle preparation error
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}


function updateEquipe($conn)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateE'])) {
        $updateId = $_POST['updateId'];
        $updatedNomE = $_POST['nomE'];
        $updateddate = $_POST['date_creation'];

        $query = "UPDATE equipe SET nom_E = ?, date_creation = ? WHERE Id_E = ?";
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'ssd', $updatedNomE, $updateddate,  $updateId);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
?>