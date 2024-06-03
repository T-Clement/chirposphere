<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chirosphere</title>
</head>
<body>
    <h1>
        <?php
        require_once '../config/database.php';

        use Repository\ChirpRepository;

        $chirpRepository = new ChirpRepository($dbCo);

        // var_dump($chirpRepository->getAllChirps());

        var_dump($chirpRepository->getChirp(1));

        
        ?>
    </h1>
</body>
</html>