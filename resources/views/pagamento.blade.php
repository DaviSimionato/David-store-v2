<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <section class="container flex justify-between">
        <div class="bg-white rounded p-6 mt-3 min-h-[70vh] w-[74%]">
            <div class="">
                <x-section-topic style="margin-left: 0;padding: 0" 
                :titulo="'Forma de pagamento'" :icone="'shopping_basket'"/>
                <div class="fPag mt-6">
                    <div class="p-5 w-56 border-[3px] border-[#42464D] rounded
                    font-bold uppercase text-[#42464D] pix hover:bg-[#42464d18]
                    cursor-pointer select-none">
                        <span>
                            Pix
                        </span>
                    </div>
                    <div class="p-5 w-56 border-[3px] mt-6 border-[#42464D] rounded
                    font-bold uppercase text-[#42464D] cartao hover:bg-[#42464d18]
                    cursor-pointer select-none">
                        <span>
                            Cartão de crédito
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-[25%] bg-white rounded max-h-[520px] sticky top-3 
        p-6 mt-3 flex-col">
            <div>
                <x-section-topic style="margin-left: 0;padding: 0" 
                :titulo="'Resumo'" :icone="'local_atm'"/>
            </div>
            <div class="mt-2">
                <div class="flex justify-between items-center py-2">
                    <p class="text-[#666e8f] font-normal text-xs">
                        Valor dos Produtos:
                    </p>
                    <p class="text-dsText font-bold text-base">
                        R${{number_format($produtos->sum("precoOriginal"),2,",",".")}}
                    </p>
                </div>
                <div class="border border-gray-300 rounded"></div>
                <div class="flex justify-between items-center py-2">
                    <p class="text-[#666e8f] font-normal text-xs">
                        Frete:
                    </p>
                    <p class="text-dsText font-bold text-base">
                        R${{number_format(($produtos->count() * 12.3),2,",",".")}}
                    </p>
                </div>
                <div class="prazo">
                    <div class="flex justify-between items-center mt-8">
                        <p class="text-[#666e8f] font-normal text-xs">
                            Total a prazo:
                        </p>
                        <p class="text-dsText font-bold text-base">
                            R${{number_format(($produtos->sum("precoOriginal") + ($produtos->count() * 12.3)),2,",",".")}}
                        </p>
                    </div>
                    <div class="text-center text-[#666e8f] font-normal text-xs mt-1.5">
                        <p>
                            (Em até 
                            <strong class="text-dsText"> 12x de 
                            R${{number_format((($produtos->sum("precoOriginal") + 
                            ($produtos->count() * 12.3)) / 12),2,",",".")}}
                            sem juros
                            </strong>
                            )
                        </p>
                    </div>
                </div>
                <div class="vista">
                        <div class="flex flex-col mt-5 items-center text-[#1f9050] 
                    bg-[#E5FFF1] rounded py-1">
                        <p style="margin-top:10px;font-size:12px">
                            Total à vista no <b>Pix:</b>
                        </p>
                        <p style="font-size:30px">
                            <b>
                                R${{number_format(($produtos->sum("precoAvistaVlr") 
                                + ($produtos->count() * 12.3)),2,",",".")}}
                            </b>
                        </p>
                        @php
                            $economia = $produtos->sum("precoOriginal") - $produtos->sum("precoAvistaVlr");
                        @endphp
                        <p style="font-size:14px;margin-bottom:10px">
                            (Economize <b>R${{number_format($economia,2,",",".")}}</b>)
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-center font-bold text-white
                flex-col uppercase text-center mt-6">
                    <a href="/confirmarCompra/-"
                    class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%] continuar">
                        Continuar
                    </a>
                    <a href="{{url()->previous()}}"
                    class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%] mt-4">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
<script>
    document.title = "Pagamento";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>
<script src="{{asset("js/pagamento.js")}}"></script>
