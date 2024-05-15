<x-layout>
    <main class="container bg-white p-5 mt-3 rounded">
        <div class="flex items-center">
            <p class="font-bold text-dsText">
                Você está em: 
            </p>
            <a href="{{"/produtos/$produto->departamento"}}" class="ml-1 text-sm hover:underline">
                {{$produto->departamento}}
            </a>
            <span class="ml-1 text-xl mt-0.5 font-thin">
                >
            </span>
            <a href="{{"/produtos/$produto->categoria"}}" class="ml-1 text-sm hover:underline">
                {{$produto->categoria}}
            </a>
            <span class="ml-1 text-xl mt-0.5 font-thin">
                >
            </span>
            <p class="font-bold text-ds mt-0.5 ml-1">
                Código: {{$produto->id}}
            </p>
        </div>
        <hr class="my-2 border-gray-400">
        <h1 class="text-2xl font-bold text-dsText mt-6 line-clamp-1">
            {{$produto->nome}}
        </h1>

        <div class="grid grid-cols-2">
            <div class="flex flex-col">
                <div class="flex justify-around p-6 pt-4" style="max-width: 500px">
                    <img src="{{asset("imagens/marcas/$produto->imagem_marca")}}" 
                    alt="{{$produto->marca}}" class="w-20 select-none pointer-events-none">
                    <div class="border"></div>

                    <div class="select-none">
                    <a href="#reviews" class="flex items-center">
                        @for ($i = 0; $i < 4; $i++)
                            @if (intval($produto->nota) > $i)
                                <span class="material-symbols-outlined ifill text-ds text-xl">
                                    star
                                </span>
                            @else 
                                <span class="material-symbols-outlined text-ds text-xl">
                                star
                                </span>
                            @endif
                        @endfor

                        @if (floatval($produto->nota) > 4.30 && floatval($produto->nota) < 5)
                            <span class="material-symbols-outlined text-ds text-xl">
                                star_half
                            </span>
                        @elseif (floatval($produto->nota) == 5)
                            <span class="material-symbols-outlined text-ds ifill text-xl">
                                star
                            </span>
                        @else
                            <span class="material-symbols-outlined text-ds text-xl">
                                star
                            </span>
                        @endif
                        <p class="text-sm text-dsTextLight">
                            - {{$produto->nota}} ({{$produto->qtd_reviews}} Reviews)
                        </p>
                    </a>
                    </div>

                    <div class="border"></div>
                    <a href="/favoritar/{{$produto->id}}/{{str_replace(" ", "-", $produto->nome)}}"
                    class="flex items-center">
                        @if ($favorito)
                            <span class="material-symbols-outlined fav font-light text-ds ifill" 
                            title="Remover dos favoritos" style="font-size:30px">
                                favorite
                            </span>
                        @else
                            <span class="material-symbols-outlined fav font-light" 
                            title="Adicionar aos favoritos" style="font-size:30px;color:#7F858D">
                                favorite
                            </span>
                        @endif
                    </a>
                </div>
                <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" alt="{{$produto->nome}}"
                class="w-1/2 ml-20 mt-3 select-none">

                <div class="text-dsText mt-6 mb-3">
                    <div class="font-bold flex items-center">
                        <h2 class="text-base uppercase">
                            Produtos similares
                        </h2>
                        <span class="material-symbols-outlined ifill text-ds ml-1">
                            search
                        </span>
                    </div>
                    <div class="flex">
                        <p class="text-xs">
                            Categoria:
                        </p>
                        <a href="{{"/produtos/$produto->categoria"}}" 
                        class="text-xs font-bold ml-1 hover:underline">
                            {{$produto->categoria}}
                        </a>
                    </div>
                </div>
                <div class="produtosSimilares flex items-center">
                    <x-seta-ant/>
                    <div class="grid grid-cols-4 gap-1">
                        @foreach ($produtosSimilares as $produtoSim)
                            <x-produto-similar-card 
                            :produto="$produtoSim" 
                            :id="$produto->id"/>
                        @endforeach
                    </div>
                    <x-seta-prox/>
                </div>

            </div>

            <div class="flex flex-col ml-12">
                <div class="flex mt-32 mb-12">
                    <div class="">
                        <p class="text-ds font-bold" style="font-size: 40px">
                            {{$produto->precoAvista}}
                        </p>
                        <p class="text-sm text-dsText text-nowrap w-0">
                            À vista no PIX com <strong class="text-base">10% OFF</strong>
                        </p>
                    </div>
                    <div class="border border-gray-300 h-10 ml-2 mt-2"></div>
                    <div class="">
                        <p style="color: #1fa342" class="font-bold mt-4 ml-2 pt-0.5">
                            Em estoque
                        </p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <p class="text-dsText font-bold">
                        {{$produto->precoParcel}}
                    </p>
                    <p class="text-dsText">
                        Em até <strong>12x</strong> de 
                        <strong>
                            R${{number_format(floatval($produto->precoOriginal) / 12,2,",",".")}}
                        </strong>
                        sem juros no cartão
                    </p>
                </div>

                <div class="flex">
                    <a href="/comprar/{{"$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                    class="bg-ds px-12 py-2 rounded uppercase flex items-center justify-center
                    text-white font-bold text-lg hover:bg-dsLight">
                        <span class="material-symbols-outlined ifill text-3xl mr-0.5
                        ">
                            shopping_cart
                        </span>
                        Comprar
                    </a>
                    <a href="/addCarrinho/{{"$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                    class="bg-ds rounded px-3 uppercase flex items-center justify-center ml-1.5
                    text-white hover:bg-dsLight">
                        <span class="material-symbols-outlined ifill text-3xl">
                            add_shopping_cart
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </main>

    <section class="container bg-white p-5 mt-4 rounded">
        <div class="flex justify-between py-3 my-2 hover:cursor-pointer select-none desc">
            <x-section-topic :titulo="'Descrição do produto'" :icone="'description'"
            style="margin: 0px" class=""/>
            <div class="flex items-center">
                <p class="font-bold text-ds opacity-95 mr-2 uppercase text-sm mostrar">
                    Mostrar menos
                </p>
                <span style="font-size: 35px;margin-right: 45px" 
                class="material-symbols-outlined text-ds seta">
                    expand_less
                </span>
            </div>
        </div>

        <div class="descText ml-2 text-dsText text-sm descritivo">
            {!! $produto->descritivo !!}
        </div>
    </section>

    <section class="container bg-white p-5 mt-4 rounded">
        <div class="flex justify-between py-3 my-2 hover:cursor-pointer select-none infoTec">
            <x-section-topic :titulo="'Informações Técnicas'" :icone="'info'"
            style="margin: 0px" class=""/>
            <div class="flex items-center">
                <p class="font-bold text-ds opacity-95 mr-2 uppercase text-sm mostrar">
                    Mostrar menos
                </p>
                <span style="font-size: 35px;margin-right: 45px" 
                class="material-symbols-outlined text-ds seta">
                    expand_less
                </span>
            </div>
        </div>

        <div class="descText ml-2 text-dsText text-sm infoTecnica">
            {!! $produto->info_tecnica !!}
        </div>
    </section>

    <section class="container bg-white p-5 mt-4 rounded" id="reviews">
        <x-section-topic :titulo="'Avaliações'" :icone="'reviews'"
        style="margin-left: 0px"/>
        @if (intval($produto->qtd_reviews == 0))
            <p class="text-lg text-dsText text-center opacity-50 font-bold my-8">
                Nenhuma avaliação até agora!
            </p>
        @endif
        @foreach ($reviews as $review)
            <x-review :review="$review"/>
        @endforeach
        <div class="flex items-center justify-center text-white uppercase font-bold
        text-sm">
            @if (intval($produto->qtd_reviews > 5))
                <a href="{{"/reviews/$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                class="bg-ds p-1.5 rounded mx-2">
                    Ver mais avaliações
                </a>
            @endif

            @if ($fezReview == false)
                <a href="{{"/escreverReview/$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                class="bg-ds p-1.5 rounded mx-2">
                    Escrever review
                </a>
            @endif
        </div>
    </section>

    <section class="container bg-white p-5 mt-4 rounded">
        <x-section-topic :titulo="'Produtos Mais Acessados'" :icone="'ads_click'" 
        style="margin: 0px"/>
            <div class="maisAcessados flex items-center select-none">
                <x-seta-ant/>
                <div class="md:grid grid-cols-5 p-4 px-0">
                    @foreach ($produtosMaisAcessados as $prd)
                        <x-produto-card :produto="$prd"/>
                    @endforeach
                </div>
                <x-seta-prox/>
            </div>
    </section>

    @auth
    <section class="container bg-white p-5 mt-4 rounded">
        @if (count($produtosVistoRecentemente) > 0)

            <x-section-topic :titulo="'Produtos Vistos Recentemente'" :icone="'history'" />
            <div class="vistosRecentemente flex items-center select-none">
                <x-seta-ant/>
                <div class="md:grid grid-cols-5 p-4 px-0">
                    @foreach ($produtosVistoRecentemente as $prd)
                        <x-produto-card :produto="$prd"/>
                    @endforeach
                </div>
                <x-seta-prox/>
            </div>
            
            @endif
    </section>
    @endauth
</x-layout>

<script>
    document.querySelector("body").style.background = "#F2F2F2"
    document.title = "{{$produto->nome}}" 
</script>
<script src="{{asset("js/produto.js")}}"></script>
<script src="{{asset("js/sliderMA.js")}}"></script>
<script src="{{asset("js/sliderSim.js")}}"></script>
@auth
<script src="{{asset("js/sliderVR.js")}}"></script>
@endauth