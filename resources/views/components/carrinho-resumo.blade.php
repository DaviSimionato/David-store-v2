@props(['produtos'])
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
                <div class="flex flex-col mt-5 items-center text-[#1f9050] 
                bg-[#E5FFF1] rounded py-1">
                    <p style="margin-top:10px;font-size:12px">
                        Valor à vista no <b>Pix:</b>
                    </p>
                    <p style="font-size:30px">
                        <b>R${{number_format(($produtos->sum("precoAvistaVlr") + ($produtos->count() * 12.3)),2,",",".")}}</b>
                    </p>
                    @php
                        $economia = $produtos->sum("precoOriginal") - $produtos->sum("precoAvistaVlr");
                    @endphp
                    <p style="font-size:14px;margin-bottom:10px">
                        (Economize <b>R${{number_format($economia,2,",",".")}}</b>)
                    </p>
                </div>
                <div class="flex items-center justify-center font-bold text-white
                flex-col uppercase text-center mt-6">
                    <a href="/carrinho"
                    class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%]">
                        Ir para o pagamento
                    </a>
                    <a href="/"
                    class="p-[10px] bg-ds rounded hover:bg-dsLight w-[85%] mt-4">
                        Continuar comprando
                    </a>
                </div>
            </div>
        </div>