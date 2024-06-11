@php
    $economia = number_format(($produtos->sum("precoOriginal") - $produtos->sum("precoAvistaVlr")),2,",",".");
@endphp
<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <section class="container flex justify-between">
        <div class="bg-white rounded p-6 mt-3 min-h-[70vh] w-[74%]">
            <div class="">
                <x-section-topic style="margin-left: 0;padding: 0" 
                :titulo="'Informações do seu pedido'" :icone="'shopping_bag'"/>
                <h2 class="text-lg font-bold flex items-center text-dsText mt-4">
                    Número do pedido: #{{$pedido->numero_pedido}}
                </h2>
                <h2 class="text-base font-semibold flex items-center text-dsText">
                    Método de pagamento: {{$pedido->metodo_pagamento}}
                </h2>
                <div class="text-dsText text-sm mt-4 mb-5">
                    <h2 class="text-lg font-bold flex items-center">
                        Dados pessoais
                        <span class="material-symbols-outlined mb-1 ml-0.5 text-ds ifill">
                            person
                        </span>
                    </h2>
                    <p class="my-1.5">
                        <b>{{auth()->user()->nome . " " . auth()->user()->sobrenome}}</b>
                    </p>
                    <p class="my-1.5">
                        <b>CPF:</b>
                        {{auth()->user()->cpf}}
                    </p>
                    <p class="my-1.5">
                        <b>Telefone:</b>
                        {{auth()->user()->telefone}}
                    </p>
                    <p class="my-1.5">
                        <b>Email:</b>
                        {{auth()->user()->email}}
                    </p>
                    <p class="my-1.5">
                        <b>Nome de usuário:</b>
                        {{auth()->user()->nome_usuario}}
                    </p>
                </div>
                <h2 class="text-lg font-bold flex items-center text-dsText">
                    Lista de produtos
                    <span class="material-symbols-outlined mb-1 ml-0.5 text-ds ifill">
                        shopping_basket
                    </span>
                </h2>
                @foreach ($produtos as $produto)
                <div class="flex justify-between items-center my-6 mb-10 group 
                rounded">
                    <div class="flex text-xs items-center py-1.5 select-none">
                        <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                        alt="{{$produto->nome}}"
                        width='120'>
                        <div class="pl-6 py-1">
                            <p class="text-dsText text-xs font-medium mb-1">
                                {{$produto->marca}}
                            </p>
                            <p class="text-dsText font-bold text-sm pb-1 w-[550px] 
                            line-clamp-1 text-ellipsis" 
                            title="{{$produto->nome}}">
                                {{$produto->nome}}
                            </p>
                            <p class="text-dsText opacity-85 text-xs py-1">
                                Com desconto no PIX: <strong>{{$produto->precoAvista}}</strong>
                            </p>
                            <p class="text-dsText opacity-85 text-xs">
                                Parcelado no cartão em até 12x sem juros: 
                                <strong>{{$produto->precoParcel}}</strong>
                            </p>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs mb-1 text-dsText">
                            Preço à vista no PIX:
                        </p>
                        <p class="text-sm font-bold text-ds text-right">
                            {{$produto->precoAvista}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="flex w-[25%] bg-white rounded max-h-[520px] sticky top-3 
        p-6 mt-3 flex-col">
            <div>
                <x-section-topic style="margin-left: 0;padding: 0" 
                :titulo="'Valor da compra'" :icone="'local_atm'"/>
            </div>
            <div class="mt-2">
                <div class="flex justify-between items-center py-2">
                    <p class="text-[#666e8f] font-normal text-xs">
                        Valor dos Produtos:
                    </p>
                    @if ($metodoPag == "Pix")
                    <p class="text-dsText font-bold text-base">
                        R${{number_format($produtos->sum("precoAvistaVlr"),2,",",".")}}
                    </p>
                    @else
                    <p class="text-dsText font-bold text-base">
                        R${{number_format($produtos->sum("precoOriginal"),2,",",".")}}
                    </p>
                    @endif

                </div>
                <div class="flex justify-between items-center pb-2">
                    <p class="text-[#666e8f] font-normal text-xs">
                        Frete:
                    </p>
                    <p class="text-dsText font-bold text-base">
                        R${{number_format(($produtos->count() * 12.3),2,",",".")}}
                    </p>
                </div>
                @if ($metodoPag == "Pix")
                <div class="flex justify-between items-center pb-2">
                    <p class="text-[#666e8f] font-normal text-xs">
                        Desconto:
                    </p>
                    <p class="text-[#1f9050] font-bold text-base">
                       - R${{$economia}}
                    </p>
                </div>  
                @endif
                <div class="border border-gray-300 rounded"></div>
                <div class="flex items-center justify-center font-bold text-white
                flex-col uppercase text-center mt-6">
                    <a href="/nota/{{$pedido->numero_pedido}}" target="_blank"
                    class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%] mt-4">
                        Ver nota de compra
                    </a>
                    <a href="{{url()->previous()}}"
                    class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%] mt-4">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
<script>
    document.title = "Pedido #{{$pedido->numero_pedido}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>
