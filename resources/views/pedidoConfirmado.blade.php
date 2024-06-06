<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container bg-white rounded p-6 mt-3 relative -top-16">
        <div class="pt-6">
            <h2 class="text-dsText font-bold text-2xl">
                Compra realizada
            </h2>
            <h2 class="text-dsText font-bold text-2xl py-14">
                O número do seu pedido é #{{$numeroPedido}}
            </h2>
            <div class="flex items-center justify-center font-bold text-white">
                <a href="/nota/{{$numeroPedido}}" target="_blank"
                class="uppercase px-5 py-2 bg-ds rounded w-[250px] mr-4 
                text-center hover:bg-dsLight">
                    Ver nota de compra
                </a>
                <a href="/"
                class="uppercase px-5 py-2 bg-ds rounded w-[250px] 
                text-center hover:bg-dsLight">
                    Continuar comprando
                </a>
            </div>
        </div>
    </div>
</x-layout>
<script>
    document.title = "Compra realizada";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>