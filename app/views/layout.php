<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Pokemon Battle' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>

<body class="h-screen flex flex-col justify-between items-center bg-sky-100 text-gray-800">

    <header class="flex flex-row p-3 bg-sky-300 w-screen gap-2">
        <a href="/pokemon/findAll" class="text-3xl text-white">Pokemon Battle</a>
        <img src="/assets/icon.png" alt="Pokemon-icon" class="w-10 h-10">
    </header>

    <main class="w-screen flex justify-center">
        <?= $content ?? '<p>Aucun contenu à afficher</p>' ?>
    </main>

    <footer class="bg-sky-300 p-3 text-white w-screen">
        <p>Tous droits réservés</p>
    </footer>
</body>

</html>