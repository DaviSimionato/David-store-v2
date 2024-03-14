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
            <x-produto-card :produto="$produto"/>
        @endforeach
        </div>

        @if ($termo ?? "" == "Busca")
            <div class="container mb-10">
                {{$produtosRecomendados->links("pagination::tailwind")}}
            </div>
        @endif
    </main>
    
</x-layout>