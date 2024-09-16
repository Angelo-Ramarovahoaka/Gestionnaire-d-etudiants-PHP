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
            <div class="w-screen flex items-center justify-center pr-4 ">
                <div id="etudiant-detail" class="bg-white p-6 rounded-lg shadow-md w-screen">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-bold text-grenat-600 mb-4">Détails de l'étudiant</h2>
                        <a href="../../controllers/etudiantController.php?action=read" class="text-2xl font-bold text-grenat-600 mb-4"><i class="fas fa-arrow fa-arrow-right"></i></a>
                    </div>
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">Label</th>
                                <th class="py-3 px-6 text-left">Valeur</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            <tr>
                                <td class="py-3 px-6 text-left" >Prénom</td>
                                <td class="py-3 px-6 text-left" ><?= $etudiantDetails["firstname"] ?></td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 text-left" >Nom</td>
                                <td class="py-3 px-6 text-left" ><?= $etudiantDetails["lastname"] ?></td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 text-left">parcours</td>
                                <td class="py-3 px-6 text-left"><?= $etudiantDetails["parcours"] ?></td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 text-left" >date de naissances</td>
                                <td class="py-3 px-6 text-left" ><?= $etudiantDetails["date_of_birth"] ?></td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 text-left">adresse</td>
                                <td class="py-3 px-6 text-left" ><?= $etudiantDetails["adresse"] ?></td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 text-left" >sex</td>
                                <td class="py-3 px-6 text-left" ><?= $etudiantDetails["sex"] ?></td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 text-left" >date de creation</td>
                                <td class="py-3 px-6 text-left" ><?= $etudiantDetails["created_at"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="../../script.js"></script>
</body>
</html>
