<x-layout>
    <div class="container bg-white rounded p-6 mt-3 relative -top-16">
        <div class="pt-6">
            <h2 class="text-dsText font-bold text-2xl">
                {{$mensagem}}
            </h2>
            <div class="flex justify-between">
                <div class="flex mt-12 max-w-[800px]">
                    <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                    alt="{{$produto->nome}}"
                    width='220'>
                    <div class="mt-12">
                        <p class="pl-6 text-dsText">
                            {{$produto->marca}}
                        </p>
                        <p class="pl-6 pt-2 mb-4 text-dsText font-bold">
                            {{$produto->nome}}
                        </p>
                    </div>
                </div>
                <div class="w-[25%] flex items-center text-center text-2xl mr-12 justify-between">
                    <div class="text-dsText">
                        <p>
                            12x R${{number_format(floatval($produto->precoOriginal) / 12,2,",",".")}}
                        </p>
                        <p class="text-base">
                            (A prazo: R${{number_format(floatval($produto->precoOriginal),2,",",".")}})
                        </p>
                    </div>
                    <div class="border w-px h-20 border-gray-300"></div>
                    <div class="text-ds font-bold">
                        <p>
                            {{$produto->precoAvista}}
                        </p>
                        <p class="text-base">
                            (A vista no PIX)
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center font-bold text-white">
                <a href="/carrinho"
                class="uppercase px-5 py-2 bg-ds rounded mr-4 hover:bg-dsLight">
                    Ir para o carrinho
                </a>
                <a href="{{"/produto/$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
                class="uppercase px-5 py-2 bg-ds rounded hover:bg-dsLight">
                    Continuar comprando
                </a>
            </div>
        </div>
    </div>
</x-layout>
<script>
    document.title = "Pré carrinho";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>