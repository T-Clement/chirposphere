<?php use Models\Chirp; ?>

<a href="/chirposphere/public/index.php/chirps">Voir tous les chirps</a>

<p>Vue du chirp id : <?= $chirp->get_id() ?></p>

<article style="border: 1px solid black; padding: 20px; ">
    
    <p>Message : <?= $chirp->get_message() ?></p>
    <p>Auteur : <?= $chirp->get_author() ?></p>
    <p>Le : <?= Chirp::formatDate($chirp->get_date()) ?> </p>

    <form method='POST' action="/chirposphere/public/index.php/chirps/<?= $chirp->get_id() ?>">
        <input name="_method" value='DELETE' type='hidden'/>
        <input type="submit" value="Supprimer" />
    </form>

    <a href='/chirposphere/public/index.php/chirps/<?= $chirp->get_id()?>/edit'>Modifier</a>
</article>        



