<x-layout>
    <div class="container bg-white rounded p-6 mt-3">
        <div class="">
            <h2 class="text-dsText font-bold text-2xl">
                Escrever Avaliação
            </h2>
            <div class="flex mb-3">
                <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                alt="{{$produto->nome}}"
                width='180'>
                <p class="p-6 text-dsText">
                    {{$produto->nome}}
                </p>
            </div>
        </div>
    </div>
</x-layout>
<script>
    document.title = "Escrever review {{$produto->nome}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("footer").classList.add("absolute","bottom-0");
</script>