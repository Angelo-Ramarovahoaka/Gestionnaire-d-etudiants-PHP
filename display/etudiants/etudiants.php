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
            <div class="w-1/2 overflow-y-auto max-h-screen pr-4">
                <!-- Formulaire d'inscription -->
                <div id="form-inscription" class="bg-white p-6 rounded-lg shadow-md h-auto">
                    <h2 class="text-2xl font-bold text-grenat-600 mb-4">Formulaire d'inscription étudiant</h2>
                    <form action="../../controllers/etudiantController.php?action=create" method="POST">
                        <div class="mb-4">
                            <label for="firstname" class="block text-grenat-600">Prénom :</label>
                            <input type="text" id="firstname" name="firstname" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="lastname" class="block text-grenat-600">Nom :</label>
                            <input type="text" id="lastname" name="lastname" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="parcours" class="block text-grenat-600">Parcours :</label>
                            <select id="parcours" name="parcours" class="w-full p-2 border border-gray-300 rounded-lg" required>
                                <option value="">Sélectionner un parcours</option>
                                <option value="informatique">Informatique</option>
                                <option value="mathematiques">Mathématiques</option>
                                <option value="statistiques">Statistiques</option>
                                <option value="biologie">Biologie</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="date_of_birth" class="block text-grenat-600">Date de naissance :</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="adresse" class="block text-grenat-600">Adresse :</label>
                            <input type="text" id="adresse" name="adresse" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <span class="block text-grenat-600">Sexe :</span>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" id="male" name="sex" value="male" class="text-grenat-600" required>
                                    <span class="ml-2 text-gray-700">Homme</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" id="female" name="sex" value="female" class="text-grenat-600" required>
                                    <span class="ml-2 text-gray-700">Femme</span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="bg-red-600 text-white p-2 rounded-lg w-full">Envoyer</button>
                    </form>
                </div>
            </div>    
            <!-- Partie droite : liste des étudiants fixée -->
            <div class="w-1/2 sticky top-0 ml-6">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-2xl font-bold text-grenat-600">Liste des étudiants</h1>
                    <a href="../../controllers/etudiantController.php?action=read" class="text-blue-600 hover:text-blue-800">Tous</a>
                </div>
                <form class="mb-4 flex items-center border border-gray-300 rounded-lg p-2" action="../../controllers/etudiantController.php?action=search" method="post">
                    <i class="fas fa-search text-grenat-600 mr-2"></i>
                    <input type="text" id="search" name="search" placeholder="Rechercher un étudiant..." class="p-2 w-full border-none focus:outline-none">
                </form>
                
                <!-- Liste des étudiants -->
                <div class="overflow-y-auto max-h-96">
                    <table class="w-full bg-white rounded-lg shadow-md">
                        <thead class="bg-red-600 text-white sticky top-0 z-10">
                            <tr>
                                <th class="p-4 text-left">Prénom</th>
                                <th class="p-4 text-left">Nom</th>
                                <th class="p-4 text-left">Parcours</th>
                                <th class="p-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Boucle PHP pour afficher la liste des étudiants -->
                            <?php foreach ($etudiants as $etudiant): ?>
                            <tr>
                                <td class="p-4"><?= $etudiant['firstname'] ?></td>
                                <td class="p-4"><?= $etudiant['lastname'] ?></td>
                                <td class="p-4"><?= $etudiant['parcours'] ?></td>
                                <td class="p-4 flex space-x-3">
                                    <a href="../../controllers/etudiantController.php?action=detail&id=<?= $etudiant['id'] ?>" class="text-blue-600 hover:text-blue-800" method="post"><i class="fas fa-info-circle"></i></a>
                                    <a href="../../controllers/etudiantController.php?action=detailUpdate&id=<?= $etudiant['id'] ?>" class="text-blue-600 hover:text-blue-800" method="post"><i class="fas fa-edit"></i></a>
                                    <a href="../../controllers/etudiantController.php?action=delete&id=<?= $etudiant['id'] ?>" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../../script.js"></script>
</body>
</html>
