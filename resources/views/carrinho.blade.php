<x-layout>
    {{-- {{$produtos->sum("precoAvistaVlr")}} --}}
    <div class="container flex justify-between">
        <div class="bg-white rounded p-6 mt-3 min-h-[70vh] w-[74%]">
            <div class="">
                <h2 class="text-dsText font-bold text-xl uppercase">
                    PRODUTOS SELECIONADOS
                </h2>
                @if($produtos->isEmpty())
                    <h2 class="text-dsText text-xl text-center p-32 font-bold uppercase
                    opacity-80">
                        Nenhum produto no carrinho
                    </h2>
                @else
                @foreach ($produtos as $produto)
                <div class="flex justify-between items-center my-6 mb-10 group 
                rounded">
                    <div class="flex text-xs items-center py-1.5">
                        <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                        alt="{{$produto->nome}}"
                        width='120'>
                        <div class="pl-6 py-1">
                            <p class="text-dsText text-xs font-medium mb-1">
                                {{$produto->marca}}
                            </p>
                            <a href="/produto/{{"$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                            class="text-dsText font-bold text-sm pb-1 w-[550px] 
                            line-clamp-1 text-ellipsis hover:underline" 
                            title="{{$produto->nome}}">
                                {{$produto->nome}}
                            </a>
                            <p class="text-dsText opacity-85 text-xs py-1">
                                Com desconto no PIX: <strong>{{$produto->precoAvista}}</strong>
                            </p>
                            <p class="text-dsText opacity-85 text-xs">
                                Parcelado no cartão em até 12x sem juros: 
                                <strong>{{$produto->precoParcel}}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="text-[#D50D0D] text-center">
                        <a href="/removerCarrinho/{{"$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                        title="Remover produto do carrinho">
                            <span class="material-symbols-outlined">delete</span>
                            <p style="font-size:10px;font-weight:700;">Remover</p>
                        </a>
                    </div>
                    <div>
                        <p class="text-xs mb-1 text-dsText">
                            Preço à vista no PIX:
                        </p>
                        <p class="text-sm font-bold text-ds text-right">
                            {{$produto->precoAvista}}
                        </p>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>

        <div class="flex w-[25%] bg-white rounded max-h-[485px] sticky top-3 
        p-6 mt-3">
            <p>aaaaaaaaaaaaaaaaaaaaaaa</p>
        </div>
    </div>
</x-layout>
<script>
    document.title = "Carrinho - {{$produtos->count()}} itens";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>
