<x-layout>
    <div class="container bg-white rounded p-6 mt-3 relative -top-16">
        <div class="py-6">
            <h2 class="text-dsText font-bold text-2xl">
                {{$mensagem}}
            </h2>
            <div class="flex my-3">
                <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                alt="{{$produto->nome}}"
                width='220'>
                <div class="mt-12">
                    <p class="pl-6 text-dsText">
                        {{$produto->marca}}
                    </p>
                    <p class="pl-6 pt-2 mb-4 text-dsText font-bold">
                        {{$produto->nome}}
                    </p>
                </div>
            </div>
            <div>

            </div>
        </div>
        
    </div>
</x-layout>
<script>
    document.title = "Pré carrinho";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>