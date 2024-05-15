<x-layout>
    <div class="container bg-white rounded p-6 mt-3">
        <div class="">
            <h2 class="text-dsText font-bold text-2xl">
                Avaliações do produto
            </h2>
            <a href="/produto/{{"$produto->id/" . str_replace(" ", "-", $produto->nome)}}" 
            class="flex my-3 group">
                <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                alt="{{$produto->nome}}"
                width='180'>
                <div>
                    <p class="p-6 text-dsText">
                        {{$produto->nome}}
                    </p>
                    <span class="p-6 text-dsText uppercase opacity-0 text-xl font-bold
                    ml-6 group-hover:opacity-40">
                        Ver produto
                    </span>
                </div>
            </a>
        </div>
        <div class="container bg-white p-5 mt-4 rounded" id="reviews">
            @if (intval($produto->qtd_reviews == 0))
                <p class="text-lg text-dsText text-center opacity-50 font-bold my-8">
                    Nenhuma avaliação até agora!
                </p>
            @endif
            @foreach ($reviews as $review)
                <x-review :review="$review"/>
            @endforeach
        </div>
    </div>
</x-layout>
<script>
    document.title = "Avaliações - {{$produto->nome}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("footer").classList.add("sticky","bottom-0");
</script>
@if (intval($produto->qtd_reviews < 3))
    <script>
        
    </script>
@endif