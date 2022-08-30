<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Product Create</title>
</head>
<body>
    <h1>New Product Created!</h1>
    <h3>Product Name - {{ $name }}</h3>
    @if($photo)
        <img style="width: 100px; height:100px;" src="{{ public_path() . 'uploads/product/'.$photo }}" alt="Product Photo">
    @endif
    <p>{{ $description }}</p>
</body>
</html>