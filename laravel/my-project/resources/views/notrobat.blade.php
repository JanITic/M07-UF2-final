<!DOCTYPE html>
<html>
<head>
    <title>Producte No Trobat</title>
</head>
<body>
    <h1>Producte No Trobat</h1>
    <p>El producte {{ $product_name }} no està.</p>
    <h2>Llista de Productes:</h2>
    <ul>
        @foreach ($product_list as $product)
            <li>{{ $product }}</li>
        @endforeach
    </ul>
</body>
</html>
