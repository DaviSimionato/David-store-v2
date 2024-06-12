<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container min-h-[70vh] mt-4">
        <x-section-topic :titulo="'Minhas avaliações'" :icone="'star'" 
        style="margin:0;padding:0"/>
        @foreach ($reviews as $review)
            <div class="bg-white mt-6 rounded p-6 py-8 flex justify-between items-center
            text-dsText text-base">
                <div class="flex w-[60%]">
                    <img src="{{asset("imagens/produtos/{$review->imagem_produto}")}}" 
                    alt="{{$review->nome}}" width="125" class="max-h-[125px]">
                    <div class="mt-4 ml-5">
                        <a href="{{"/produto/$review->id/" . str_replace(" ", "-", $review->nome)}}" 
                        class="text-lg font-bold line-clamp-1 hover:underline">
                            {{$review->nome}}
                        </a>
                        <p class="my-2 flex items-center">
                            <b class="mr-1">
                                Nota:
                            </b>
                            {{$review->nota_review}}
                            <span class="mx-2">
                                -
                            </span>
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < intval($review->nota_review))
                                    <span class="material-symbols-outlined 
                                    ifill text-xl text-ds mb-1">
                                        star
                                    </span>
                                @else
                                    <span class="material-symbols-outlined 
                                    text-xl text-ds mb-1">
                                        star
                                    </span>
                                @endif
                            @endfor
                        </p>
                        <p class="line-clamp-3 w-[100%]">
                            <b>Comentário:</b>
                            {{$review->comentario}}
                        </p>
                    </div>
                </div>
                <div class="verReview text-ds text-center rounded
                p-2 hover:bg-[#d8b75c1c] cursor-pointer" 
                title="Ver review">
                    <a href="/verReview/{{$review->id}}"
                    class="pointer-events-none select-none">
                        <span class="material-symbols-outlined">visibility</span>
                        <p style="font-size:10px;font-weight:700;">Ver review</p>
                    </a>
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer" 
                title="Editar review">
                    <a href="/editarReview/{{$review->id}}"
                    class="pointer-events-none select-none">
                        <span class="material-symbols-outlined">edit</span>
                        <p style="font-size:10px;font-weight:700;">Editar review</p>
                    </a>
                </div>
                <div class="excluir text-[#D50D0D] text-center rounded
                p-2 mr-16 hover:bg-[#d50d0d1a] cursor-pointer" 
                title="Remover review">
                    <div class="pointer-events-none select-none">
                        <span class="material-symbols-outlined">delete</span>
                        <p style="font-size:10px;font-weight:700;">Remover review</p>
                        <p class="hidden id">
                            {{$review->review_id}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="overlayDeletar bg-[#00000060] fixed w-screen h-screen 
    overflow-hidden items-center justify-center hidden">
        <div class="confirmarExcluir bg-zinc-100 rounded p-8 mb-16">
            <p class="text-dsText font-bold ">
                Tem certeza que deseja apagar esta review?
            </p>
            <div class="flex items-center justify-center font-bold text-white
            flex-col uppercase text-center mt-4 apagarRev">
                <a href="/removerReview/-" class="p-[10px] bg-ds rounded
                hover:bg-dsLight w-[85%] mt-4 hover:cursor-pointer excluir
                select-none">
                    Apagar review
                </a>
                <div class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%] mt-4
                hover:cursor-pointer voltar">
                    <p class="select-none">
                        Voltar
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<script src="{{asset("js/reviewBtns.js")}}"></script>
<script>
    document.title = "Reviews - {{auth()->user()->nome_usuario}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>