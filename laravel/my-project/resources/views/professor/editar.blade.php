<h1>Editar un usuari</h1>
<form action={{'/prof/edit/'.$prof['id']}} method="post">
    @method('put')
    @csrf
    <label for="nom">Nom</label>
    <input type="text" name="nom" value={{$prof['nom']}} required/>
    <br>
    <label for="cognoms">Cognoms</label>
    <input type="text" name="cognoms" value={{$prof['cognoms']}} required/>
    <br>
    <label for="password">Contrasenya</label>
    <input type="password" name="password" required/>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" value={{$prof['email']}} required/>
    <br>
    <label for="rol">Rol</label>
        <select name="rol">
            <option value="Professor">Professor</option>
            <option value="Alumne">Alumne</option>
            <option value="Centre">Centre</option>
        </select>
    <br>
    <label for="actiu">Actiu</label>
        <select name="actiu">
            <option value="1">Si</option>
            <option value="2">No</option>
        <select>
    <br>
    <input type="submit" value="Modifica"/>
    <br>
</form>