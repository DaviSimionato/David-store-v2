<x-layout>
    <main class="container bg-white p-5 mt-3 rounded">
        <div class="flex items-center">
            <p class="font-bold text-dsText">
                Você está em: 
            </p>
            <a href="{{"/produtos/$produto->departamento"}}" class="ml-1 text-sm">
                {{$produto->departamento}}
            </a>
            <span class="ml-1 text-xl mt-0.5 font-thin">
                >
            </span>
            <a href="{{"/produtos/$produto->categoria"}}" class="ml-1 text-sm">
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
                <div class="flex justify-around p-6 pt-4" style="max-width: 600px">
                    <img src="{{asset("imagens/marcas/$produto->imagem_marca")}}" 
                    alt="{{$produto->marca}}" class="w-20">
                    <div class="border "></div>

                    <div class="select-none flex items-center">
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
                    </div>

                    <div class="border "></div>
                    <a href="favoritar/{{$produto->id}}/{{str_replace(" ", "-", $produto->nome)}}"
                    class="flex items-center">
                        <span class="material-symbols-outlined fav font-light" 
                        title="Adicionar aos favoritos" style="font-size:30px;color:#7F858D">
                            favorite
                        </span>
                    </a>
                </div>
                <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" alt="{{$produto->nome}}"
                class="w-1/2 ml-20">
            </div>

            <div class="flex justify-center flex-col">
                <div class="flex mb-12">
                    <div class="">
                        <p class="text-ds text-4xl font-bold">
                            {{$produto->precoAvista}}
                        </p>
                        <p class="text-sm text-dsText text-nowrap">
                            À vista no PIX com <strong class="text-base">10% OFF</strong>
                        </p>
                    </div>
                    <div class="border border-gray-300 h-10"></div>
                    <div class="">
                        <p style="color: #1fa342" class="font-bold mt-2 ml-2 pt-0.5">
                            Em estoque
                        </p>
                    </div>
                </div>
                
                <div class="">
                    <p class="text-dsText font-bold">
                        {{$produto->precoParcel}}
                    </p>
                    <p class="text-dsText">
                        Em até <strong>12x</strong> de 
                        <strong>
                            {{number_format(floatval($produto->precoOriginal) / 12,2,",",".")}}
                        </strong>
                        sem juros no cartão
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script>document.querySelector("body").style.background = "#F2F2F2"</script>
</x-layout>