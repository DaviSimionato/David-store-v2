
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
    <title>David'store</title>
</head>
<body class="bg-slate-200">
    <x-header/>
    <div class="font-bold text-dsText text-4xl absolute top-1/4 w-full text-center">
        <h1>Página não encontrada!</h1>
        <h2 class="text-2xl my-4">
            A página que você está tentando acessar não está disponível
        </h2>
        <a href="/"
        class="px-6 py-2 bg-ds text-white uppercase text-lg rounded">
            Retornar à página inicial
        </a>
    </div>
    <x-footer class="absolute bottom-0"/>
</body>
</html>