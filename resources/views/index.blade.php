<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <script>
        document.querySelector("body").classList.add("bg-slate-200");
    </script>
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
            <div class="md:grid grid-cols-5 p-4 px-0 justify-between mx-auto gap-5">
                @foreach ($departamentos as $departamento)
                    <x-departamento-card :departamento="$departamento"/>
                @endforeach
            </div>
        </div>

        <a href="produtos/Acer">
            <img src="{{asset("imagens/svg/bannerAcer.svg")}}" alt="Banner Acer"
            class="mx-auto rounded my-3" width="1320">
        </a>

        <x-section-topic :titulo="'Produtos Mais Acessados'" :icone="'ads_click'" />
        <div class="maisAcessados flex items-center select-none">
            <x-seta-ant/>
            <div class="md:grid grid-cols-5 p-4 px-0">
                @foreach ($produtosMaisAcessados as $produto)
                    <x-produto-card :produto="$produto"/>
                @endforeach
            </div>
            <x-seta-prox/>
        </div>

        @auth
            @if (count($produtosVistoRecentemente) > 0)

            <x-section-topic :titulo="'Produtos Vistos Recentemente'" :icone="'history'" />
            <div class="vistosRecentemente flex items-center select-none">
                <x-seta-ant/>
                <div class="md:grid grid-cols-5 p-4 px-0">
                    @foreach ($produtosVistoRecentemente as $produto)
                        <x-produto-card :produto="$produto"/>
                    @endforeach
                </div>
                <x-seta-prox/>
            </div>
            
            @endif
        @endauth
    </main>
</x-layout>

<script src="{{asset("js/sliderRec.js")}}"></script>
<script src="{{asset("js/sliderMarcas.js")}}"></script>
<script src="{{asset("js/sliderMA.js")}}"></script>
@auth
<script src="{{asset("js/sliderVR.js")}}"></script>
@endauth
