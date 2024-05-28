<x-layout>
    <div class="container bg-white rounded p-6 mt-3 min-h-[70vh]">
        <div class="">
            <h2 class="text-dsText font-bold text-xl uppercase">
                Produtos favoritos
            </h2>
            @if($produtos->isEmpty())
                <h2 class="text-dsText text-xl text-center p-32 font-bold uppercase
                opacity-80">
                    Nenhum produto favoritado
                </h2>
            @else
            @foreach ($produtos as $produto)
            <a href="/produto/{{"$produto->id/" . str_replace(" ", "-", $produto->nome)}}" 
            class="p-2 flex justify-between items-center my-8 group rounded hover:bg-gray-50">
                <div class="flex">
                    <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                    alt="{{$produto->nome}}"
                    width='120'>
                    <div>
                        <p class="p-6 text-dsText font-bold pb-1">
                            {{$produto->nome}}
                        </p>
                        <p class="text-dsText font-bold text-sm pl-6 opacity-80 pb-1">
                            {{$produto->marca}}
                        </p>
                        <p class="text-ds font-bold pl-6 opacity-85">
                            {{$produto->precoAvista}}
                        </p>
                    </div>
                </div>
                <span class="material-symbols-outlined fav font-light text-ds ifill mr-20" 
                style="font-size:32px">
                    favorite
                </span>
            </a>
            @endforeach
            @endif
            
        </div>
    </div>
</x-layout>
<script>
    document.title = "Favoritos - {{$produtos->count()}} itens";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>