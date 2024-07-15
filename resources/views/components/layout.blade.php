@props(["menuDepartamentos","menuCategorias","qtdCarrinho"])
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
    @if ($qtdCarrinho > 0) 
        <style>
            .carrinho::after {
                float: right;
                content: "{{$qtdCarrinho}}";
                font-size: 14px;
                height: 12px;
                border-radius: 50%;
                position: relative;
                top: -16px;
                font-weight: bold;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 
                'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 
                'Open Sans', 'Helvetica Neue', sans-serif;
            }
        </style>
    @endif
</head>
<body>
    <x-header :qtdCarrinho="$qtdCarrinho"/>
    <x-menu-lateral :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias"/>
        {{$slot}}
    <x-mensagem/>
    <x-footer/>
    @if (session()->has("mensagem"))
    <script>
        setTimeout(() => {
            let mensagem = document.querySelector(".mensagem");
            mensagem.classList.add("fadeOut");
            mensagem.addEventListener("animationend",()=> {
                mensagem.remove();
            });
        }, 3500);
    </script>
    @endif
    <script src="{{ asset("js/previewBusca.js") }}"></script>
</body>
</html>
