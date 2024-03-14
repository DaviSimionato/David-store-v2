<x-layout>
    <div class="w-full mb-10" style="background-color: #0035E7">
        <a href="/produtos/tv">
            <img src="{{asset("imagens/svg/bannerIndex.svg")}}" alt="banner"
            class="mx-auto">
        </a>
    </div>
    <main class="container bg-gray-100">
        <div class="p3 bg-ds">
            <h2 class="text-xl text-white uppercase p-2 font-bold ml-8">
                Recomendado
            </h2>
        </div>

        <div class="md:grid grid-cols-5 p-4">
        @foreach ($produtosRecomendados as $produto)
            <div class="bg-white mx-2 rounded-md select-none">
                <a href="{{"/produto/$produto->id/$produto->nome"}}">
                    <img src="{{asset("imagens/produtos/{$produto->imagem_produto}")}}" 
                    alt="{{$produto->nome}}" class="w-44 mx-auto p-3 pt-4 pointer-events-none">
                    <p class="text-dsText font-semibold text-base line-clamp-3 px-2 mt-3 leading-tight
                    h-14">
                        {{$produto->nome}}
                    </p>
                    <p class="text-xl text-ds font-bold px-2 mt-2">
                        {{$produto->precoAvista}}
                    </p>
                    <span class="text-sm px-2 text-dsText ">
                        À vista no PIX
                    </span>
                </a>
                <a href="{{"/addcart/$produto->id/$produto->nome"}}" 
                class="bg-ds uppercase block rounded text-white text-center 
                font-bold p-1.5 m-2 mt-5 hover:bg-dsLight">
                    Comprar
                </a>
            </div>
        @endforeach
        </div>

        @if ($termo ?? "" == "Busca")
            <div class="container mb-10">
                {{$produtosRecomendados->links("pagination::tailwind")}}
            </div>
        @endif
    </main>
    
</x-layout>