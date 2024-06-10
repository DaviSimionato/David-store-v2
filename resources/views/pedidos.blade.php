<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container min-h-[70vh] mt-4">
        <x-section-topic :titulo="'Meus pedidos'" :icone="'shopping_basket'" 
        style="margin:0;padding:0"/>
        @foreach ($pedidos as $pedido)
            <div class="bg-white mt-6 rounded p-6 py-8 flex justify-between items-center
            text-dsText text-base">
                <div>
                    <p class="font-bold uppercase mb-4">
                        Número do pedido
                    </p>
                    <p class="font-medium">
                        #{{$pedido->numero_pedido}}
                    </p>
                </div>
                <div class="font-bold">
                    <p class="uppercase mb-4 text-center">
                        Status
                    </p>
                    <p class="text-[#2dc26e]">
                        Concluído
                    </p>
                </div>
                <div>
                    <p class="font-bold uppercase mb-4 text-center">
                        Data
                    </p>
                    <p class="font-medium">
                        {{$pedido->data_pedido}}
                    </p>
                </div>
                <div>
                    <p class="font-bold uppercase mb-4 text-center">
                        Valor
                    </p>
                    <p class="font-medium">
                        {{$pedido->total_pedido}}
                    </p>
                </div>
                <a href="/pedido/{{$pedido->numero_pedido}}" 
                class="text-ds mr-12">
                    Detalhes do pedido
                    <span class="font-bold">
                        +
                    </span>
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
<script>
    document.title = "Pedidos - {{auth()->user()->nome_usuario}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>