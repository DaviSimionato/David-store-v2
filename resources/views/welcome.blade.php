<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teste</title>
</head>
<body>
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
</body>
</html>