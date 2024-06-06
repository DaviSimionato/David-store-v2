<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota de compra</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            list-style: none;
        }
        p {
            margin: 0;
            line-height: 1.4rem;
        }
    </style>
</head>
<body>
    <div>
        <h2>Informações do pedido</h2>
        <h3 style="margin-bottom: .3rem">
            Número do pedido: #{{$pedido->numero_pedido}}
        </h3>
        <p>
            <b>Data do pedido:</b>
            {{$pedido->data_pedido}}
        </p>
        <h3 style="margin-bottom: .3rem">
            Dados pessoais:
        </h3>
        <p>
            <b>Nome:</b>
            {{auth()->user()->nome}}
            {{auth()->user()->sobrenome}}
        </p>
        <p>
            <b>Cpf:</b>
            {{auth()->user()->cpf}}
        </p>
        <p>
            <b>Telefone:</b>
            {{auth()->user()->telefone}}
        </p>
        <p style="text-decoration: underline">
            <b>Email:</b>
            {{auth()->user()->email}}
        </p>
        <h3 style="margin-bottom: .3rem">
            Informações de pagamento:
        </h3>
        <p>
            <b>Valor da compra:</b>
            {{$pedido->total_pedido}}
        </p>
        <p>
            <b>Método de pagamento:</b>
            {{$pedido->metodo_pagamento}}
        </p>
        <h3 style="margin-bottom: .3rem">
            Itens do pedido:
        </h3>
        @foreach ($itens as $item)
            <p>
                {{$item->nome}}
            </p>
            @if ($pedido->metodo_pagamento == "Pix")
                <p>
                    <b>Preço a vista:</b>
                    {{$item->precoAvista}}
                </p>
            @else
                <p>
                    <b>Preço a prazo:</b>
                    {{$item->precoParcel}}
                </p>
            @endif
            <br>
        @endforeach
    </div>
</body>
</html>