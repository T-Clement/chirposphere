

<h1>Je suis dans la vue des Chirps !!!!</h1>

<?php 
// var_dump($chirps);

use Models\Chirp;

?>

<section>
    <a href="/chirposphere/public/index.php/chirps/new">Ajouter un Chirp</a>
</section>


<section style='display: flex; flex-direction: row; gap: 36px;'>
    
    <?php if (empty($chirps)) : ?>
    <p>Il n'y a aucun Chirp de disponible.</p>
    <?php else : ?>
    
    <?php foreach($chirps as $chirp) : ?>

    <article style="border: 1px solid black; padding: 20px; ">
    
        <p>Message : <?= $chirp->get_message() ?></p>
        <p>Auteur : <?= $chirp->get_author() ?></p>
        <p>Le : <?= Chirp::formatDate($chirp->get_date()) ?> </p>
    
        <a href='/chirposphere/public/index.php/chirps/<?= $chirp->get_id()?>'>Voir le chirp en détails</a>
    </article>        

    <?php endforeach ?>
    <?php endif ?>
    
</section>