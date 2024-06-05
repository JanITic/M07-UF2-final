<h1>Benvingut alumne!</h1>
<form action="/prof/pujar" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="document">
    <button type="submit">Pujar imatge (.jpg o .png)</button>
</form>

@if(isset($fitxer))
    <a href="{{ $fitxer }}" target="_blank">Ver Documento</a>
@endif
<br>
@if(isset($fitxer) && (pathinfo($fitxer, PATHINFO_EXTENSION) === 'jpg' || pathinfo($fitxer, PATHINFO_EXTENSION) === 'png' || pathinfo($fitxer, PATHINFO_EXTENSION) === 'jpeg'))
    <img src="{{ $fitxer }}" alt="Documento">
@endif
<br>
<a href="/signin">Desconnectar-se</a>
