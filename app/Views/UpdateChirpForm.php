<?php use Models\Chirp; ?>

<h1>Mise à jour du Chirp ID : <?= $chirp->get_id() ?></h1>

<form method ="POST" action="/chirposphere/public/index.php/chirps/<?= $chirp->get_id() ?>/edit">
    <div style='display: block; margin-bottom: 12px;'>
        <label for='user'>Votre id utilisateur</label>
        <input type='text' id='user' name='user' value=<?= $chirp->get_author() ?> disabled />
        <input type='hidden' id='user' name='user' value=<?= $chirp->get_author() ?> />

    </div>

    <div style='display: block; margin-bottom: 12px;'>
        <label for='message'>Votre message</label>
        <input type='text' id='message' name='message' value='<?= $chirp->get_message() ?>' />
    </div>
    
    
    <div style='display: block; margin-bottom: 12px;'>
        <label for='date'>La date du Chirp <span style='font-style: italic;'>(elle sera mise à jour automatiquement)</span></label>
        <input type='date' id='date' name='date' value='<?= date_format($chirp->get_date(), 'Y-m-d') ?>' disabled/>
    </div>



    <input type='submit' value="Mettre à jour"/>
</form>