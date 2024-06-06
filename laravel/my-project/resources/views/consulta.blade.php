<!DOCTYPE html>
<html>
<head>
    <title>Consulta Producte</title>
</head>
<body>
    <h1>Consulta Producte</h1>
    <form action="{{ route('productes.consulta') }}" method="POST">
        @csrf
        <label for="product_name">Nom del Producte:</label>
        <input type="text" id="product_name" name="product_name">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
