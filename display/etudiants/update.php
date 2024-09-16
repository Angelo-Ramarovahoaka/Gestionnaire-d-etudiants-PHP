<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 font-sans h-screen">

    <!-- Header -->
    <header class="bg-red-600 text-white p-4 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg flex space-x-16">
               <p>Bienvenue !</p>
               <span class="font-semibold"><?php echo $_SESSION["username"]?></span> 
            </div>
            <div>
                <a href="../../controllers/userController.php?action=logout" class="text-white hover:text-gray-300">Déconnexion?</a>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 py-3 h-full">
        <div class="flex h-full">
            <div class="w-screen overflow-y-auto max-h-screen pr-4">
                <!-- Formulaire de modification -->
                <div id="form-modification" class="bg-white p-6 rounded-lg shadow-md h-auto flex flex-col justify-center items-center">
                    <div class="flex justify-between w-1/2">
                        <h2 class="text-2xl font-bold text-grenat-600 mb-4">Formulaire de modification</h2>
                        <a href="../../controllers/etudiantController.php?action=read" class="text-2xl font-bold text-grenat-600 mb-4"><i class="fas fa-arrow fa-arrow-right"></i></a>
                    </div>
                    <form action="../../controllers/etudiantController.php?action=update&id=<?= $etudiantDetails['id'] ?>"  method="post" class="w-1/2">
                        <div class="mb-4">
                            <label for="firstname" class="block text-grenat-600">Prénom :</label>
                            <input type="text" name="firstname" class="w-full p-2 border border-gray-300 rounded-lg" value="<?= htmlspecialchars($etudiantDetails['firstname']) ?>" required><br>
                        </div>
                        <div class="mb-4">
                            <label for="lastname" class="block text-grenat-600">Nom :</label>
                            <input type="text" name="lastname" class="w-full p-2 border border-gray-300 rounded-lg" value="<?= htmlspecialchars($etudiantDetails['lastname']) ?>" required><br>
                        </div>
                        <div class="mb-4">
                            <label for="parcours" class="block text-grenat-600">Parcours :</label>
                            <select name="parcours" required>
                                <option value="informatique" <?= $etudiantDetails['parcours'] == 'informatique' ? 'selected' : '' ?>>informatique</option>
                                <option value="mathematiques" <?= $etudiantDetails['parcours'] == 'mathematiques' ? 'selected' : '' ?>>mathematiques</option>
                                <option value="statistiques" <?= $etudiantDetails['parcours'] == 'statistiques' ? 'selected' : '' ?>>statistiques</option>
                                <option value="biologie" <?= $etudiantDetails['parcours'] == 'biologie' ? 'selected' : '' ?>>biologie</option>
                            </select><br>
                        </div>
                        <div class="mb-4" class="block text-grenat-600">
                            <label for="date_of_birth">Date de naissance :</label>
                            <input type="date" name="date_of_birth" class="w-full p-2 border border-gray-300 rounded-lg" value="<?= htmlspecialchars($etudiantDetails['date_of_birth']) ?>" required><br>
                        </div>
                        <div class="mb-4" class="block text-grenat-600">
                            <label for="adresse">Adresse :</label>
                            <input type="text" name="adresse" class="w-full p-2 border border-gray-300 rounded-lg" value="<?= htmlspecialchars($etudiantDetails['adresse']) ?>" required><br>
                        </div>
                        <div class="mb-4">
                            <label for="sex" class="block text-grenat-600">Sexe :</label>
                            <select name="sex" required>
                                <option value="male" <?= $etudiantDetails['sex'] == 'male' ? 'selected' : '' ?>>Masculin</option>
                                <option value="female" <?= $etudiantDetails['sex'] == 'female' ? 'selected' : '' ?>>Féminin</option>
                            </select><br>
                        </div>
                        <button type="submit" class="bg-red-600 text-white p-2 rounded-lg w-full">Mettre à jour </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="../../script.js"></script>
</body>
</html>
