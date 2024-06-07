<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container min-h-[70vh]">
        <div class="flex justify-between w-1/2 p-3 py-6 bg-white rounded 
        text-dsText mt-5">
            <div class="flex items-center w-[70%] rounded">
                <span style="font-size: 60px;margin: 0 20px" 
                class="material-symbols-outlined text-ds ifill">
                    account_circle
                </span>
                <div class="overflow-hidden">
                    <h1 class="font-bold text-2xl line-clamp-2">
                        Bem vindo, {{auth()->user()->nome_usuario}}
                    </h1>
                    <div class="flex items-center">
                        <span style="font-size: 16px;margin-right:5px" 
                        class="material-symbols-outlined text-ds ifill">
                            mail
                        </span>
                        <p class="text-base">
                            {{auth()->user()->email}}
                        </p>
                    </div>
                </div>
            </div>
            <a href="/config/conta" class="flex items-center">
                <span style="font-size: 50px;margin-right:30px;margin-top:10px" 
                class="material-symbols-outlined config text-ds ifill rounded-full
                hover:bg-orange-100" title="Configurações da conta">
                    settings
                </span>
            </a>
        </div>
        <div class="flex mt-8 justify-between text-base text-[#7f858d] uppercase
        font-bold">
            <a href="/pedidos"class="flex bg-white p-8 justify-center items-center 
            w-[32%] rounded hover:bg-gray-50">
                <span style="margin-bottom: 7px;margin-right: 5px" 
                class="material-symbols-outlined text-ds ifill">
                    shopping_basket
                </span>
                <p>
                    Meus pedidos
                </p>
            </a>
            <a href="/favoritos"class="flex bg-white p-8 justify-center items-center 
            w-[32%] rounded hover:bg-gray-50">
                <span style="margin-right: 5px" 
                class="material-symbols-outlined text-ds ifill">
                    favorite
                </span>
                <p>
                    Favoritos
                </p>
            </a>
            <a href="/reviews/user"class="flex bg-white p-8 justify-center items-center 
            w-[32%] rounded hover:bg-gray-50">
                <span style="margin-bottom: 7px;margin-right: 5px" 
                class="material-symbols-outlined text-ds ifill">
                    thumb_up
                </span>
                <p>
                    Avaliações
                </p>
            </a>
        </div>
        <div class="bg-white p-5 mt-8 rounded">
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
        </div>
    </div>
</x-layout>
<script>
    document.title = "Perfil - {{auth()->user()->nome_usuario}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>
<script src="{{asset("js/sliderVR.js")}}"></script>