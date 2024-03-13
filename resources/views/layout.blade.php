<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset("imagens/icones/davidstore-icon.ico")}}" type="image/ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{asset("tailwind.config.js")}}"></script>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <title>{{$titulo ?? "David'store"}}</title>
</head>
<body>
    <x-header/>
    @foreach ($produtosRecomendados as $produto)
        <p>{{ $produto->nome }}</p>
        <img 
            src="{{asset("imagens/produtos/{$produto->imagem_produto}")}}" 
            alt="{{$produto->nome}}"
            class="w-52 inline"
        >
        <img src="{{asset("imagens/marcas/{$produto->imagem_marca}")}}" 
            alt="{$produto->marca}"
            class="w-24 inline ml-5"
        >

    @endforeach

    @if ($termo ?? "" == "Busca")
        {{$produtosRecomendados->links()}}
    @endif
</body>
</html>