<h1>Ajout d'un nouveau Chirp</h1>

<form method ="POST" action="/chirposphere/public/index.php/chirps/new">
    <div style='display: block; margin-bottom: 12px;'>
        <label for='user'>Votre id utilisateur</label>
        <input type='text' id='user' name='user' value='1' disabled/>
        <input type='hidden' id='user' name='user' value='1'/>

    </div>

    <div style='display: block; margin-bottom: 12px;'>
        <label for='message'>Votre message</label>
        <input type='text' id='message' name='message' value=''/>
    </div>

    <input type='submit' value="Enregistrer"/>
</form>