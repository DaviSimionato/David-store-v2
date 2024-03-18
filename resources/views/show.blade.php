<x-layout>
    <div class="container bg-white p-5 mt-3 rounded">
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
        <hr class="my-2">
        <h1 class="text-2xl font-bold text-dsText mt-6">
            {{$produto->nome}}
        </h1>
    </div>
</x-layout>