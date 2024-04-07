<x-layout>
    <div class="container rounded mt-4">
        <h2 class="text-dsText text-xl font-bold">
            Mostrando resultados para: {{$busca}}
        </h2>
        <hr class="my-2 border-gray-400">
    </div>
    <div class="container flex mt-4 gap-6 select-none">
        <div class="w-1/5 bg-white p-4 rounded h-screen text-dsText">
            <div class="min">
                <p>Preço mínimo:</p>
                <p class="pm font-bold">
                    R${{intval($produtos->min("precoAvistaVlr"))}},00
                </p>
                <input type="range" 
                max="{{intval($produtos->max("precoAvistaVlr")) - 1}}" 
                min="{{intval($produtos->min("precoAvistaVlr")) - 1}}" 
                value="{{intval($produtos->min("precoAvistaVlr")) - 1}}"
                class="w-full hover:cursor-grab active:cursor-grabbing bg-ds">
            </div>
            <div class="max">
                <p>Preço máximo:</p>
                <p class="pm font-bold">
                    R${{intval($produtos->max("precoAvistaVlr"))}},00
                </p>
                <input type="range" 
                max="{{intval($produtos->max("precoAvistaVlr")) + 2}}" 
                min="{{intval($produtos->min("precoAvistaVlr")) + 2}}" 
                value="{{intval($produtos->max("precoAvistaVlr")) + 2}}"
                class="w-full hover:cursor-grab active:cursor-grabbing bg-ds">
            </div>
            <button class="hidden bg-dsBlue text-white font-bold uppercase text-center
            w-full py-2 mt-5 rounded hover:bg-blue-500 active:bg-blue-600 aplicar">
                Aplicar
            </button>
        </div>
        <div class="w-4/5">
            <div class="bg-white p-4 rounded text-dsText mb-3">
                <div class="flex">
                    <span class="material-symbols-outlined text-ds ml-2">swap_vert</span>
                    <p><strong>Ordenar por: </strong></p>
                    <div class="flex items-center text-sm font-semibold select-none
                    hover:cursor-pointer">
                        <a href="/produtos/{{$busca}}"
                        class="mx-1 hover:text-dsLight Nada">
                            Nada
                        </a> |
                        <a href="/produtos/{{$busca}}/Menor-Preço"
                        class="mx-1 hover:text-dsLight Menor-Preço">
                            Menor preço
                        </a> |
                        <a href="/produtos/{{$busca}}/Maior-Preço"
                        class="mx-1 hover:text-dsLight Maior-Preço">
                            Maior preço
                        </a> |
                        <a href="/produtos/{{$busca}}/Acessos"
                        class="mx-1 hover:text-dsLight Acessos">
                            Acessos
                        </a>
                    </div>
                </div>
            </div>
            @if (count($produtos) > 0)
                <div class="grid grid-cols-4 justify-between gap-3">
                    @foreach ($produtos as $produto)
                        <x-produto-card :produto="$produto"
                        style="margin: 0"/>
                    @endforeach
                </div>
                <div class="container self-start">
                    {{$produtos->links("pagination::tailwind")}}
                </div>
            @else
                <p class="text-lg text-dsText text-center opacity-50 font-bold my-8">
                    Nenhum produto encontrado
                </p>
            @endif
        </div>
    </div>
</x-layout>
<script>
    document.querySelector("body").style.background = "#F2F2F2"
    document.title = "Busca por {{$busca}}"
    document.querySelector(".{{$ordenador}}").classList.add("text-dsLight")
</script>
<script src="{{asset("js/pesquisa.js")}}"></script>