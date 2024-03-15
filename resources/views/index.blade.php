<x-layout>
    <div class="w-full mb-10" style="background-color: #0035E7">
        <a href="/produtos/tv">
            <img src="{{asset("imagens/svg/bannerIndex.svg")}}" alt="banner"
            class="mx-auto">
        </a>
    </div>
    <main class="container bg-gray-100">
        <div class="p3 bg-ds mb-3">
            <h2 class="text-xl text-white uppercase p-2 font-bold ml-8">
                Recomendado
            </h2>
        </div>

        <div class="recomendados flex items-center select-none">
            <x-seta-ant/>
            <div class="md:grid grid-cols-5 p-4 px-0">
                @foreach ($produtosRecomendados as $produto)
                    <x-produto-card :produto="$produto"/>
                @endforeach
            </div>
            <x-seta-prox/>
        </div>

        <a href="produtos/tv">
            <img src="{{asset("imagens/svg/bannerRecomend.svg")}}" alt="Banner"
            class="mx-auto rounded my-3" width="1320">
        </a>

        <x-section-topic :titulo="'Marcas Recomendadas'" :icone="'thumb_up'" />
        <div class="marcas flex items-center select-none justify-between">
            <x-seta-ant/>
            <div class="md:grid grid-cols-6 p-4 px-0">
                @foreach ($marcas as $marca)
                    <x-marca-card :marca="$marca"/>
                @endforeach
            </div>
            <x-seta-prox/>
        </div>

        <x-section-topic :titulo="'Departamentos'" :icone="'lists'" />
        <div class="flex items-center select-none justify-between">
            <x-seta-ant/>
            <div class="md:grid grid-cols-6 p-4 px-0">
                @foreach ($departamentos as $departamento)
                <div class="marca mx-3 bg-white p-3 pb-6 rounded">
                    <a href="{{"/produtos" . "/" . str_replace(" ", "-", $departamento->nome)}}">
                        <h2 class="text-center text-dsText font-bold">
                            {{$departamento->nome}}
                        </h2>
                        <img src="{{asset("imagens/departamentos/$departamento->foto")}}" 
                        alt="{{$departamento->nome}}" class="mx-auto my-6 w-28 h-12">
                    </a>
                </div>
                @endforeach
            </div>
            <x-seta-prox/>
        </div>

        {{-- @if ($termo ?? "" == "Busca")
            <div class="container mb-10">
                {{$produtosRecomendados->links("pagination::tailwind")}}
            </div>
        @endif --}}
    </main>
    <script src="{{asset("js/sliderRec.js")}}"></script>
    <script src="{{asset("js/sliderMarcas.js")}}"></script>
</x-layout>