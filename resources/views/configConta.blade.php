<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container min-h-[70vh]">
        <div class="flex justify-center p-3 bg-white rounded 
        text-dsText mt-5 w-20 hover:bg-slate-50 cursor-pointer">
            <a href="{{url()->previous()}}" class="flex items-center">
                <span style="font-size: 30px;margin: 0 20px" 
                class="material-symbols-outlined text-ds ifill">
                    arrow_back
                </span>
            </a>
        </div>
        <div class="flex justify-between w-1/2 p-3 py-6 bg-white rounded 
        text-dsText mt-5">
            <div class="flex items-center w-[70%] rounded">
                <span style="font-size: 60px;margin: 0 20px" 
                class="material-symbols-outlined text-ds ifill">
                    account_circle
                </span>
                <div class="overflow-hidden">
                    <h1 class="font-bold text-2xl line-clamp-2">
                        Configurar conta - {{auth()->user()->nome_usuario}}
                    </h1>
                </div>
            </div>
            <div class="flex items-center">
                <span style="font-size: 50px;margin-right:30px;" 
                class="material-symbols-outlined config text-ds ifill rounded-full" 
                title="Configurações da conta">
                    settings
                </span>
            </div>
        </div>
        <form action="/configurarConta/alterarDados" method="post"
        class="bg-white rounded text-dsText mt-5 w-1/2 p-8">
            @csrf
            @method("POST")
            <div class="flex justify-between items-center">
                <div class="flex">
                    <p class="font-bold">
                        Nome:
                    </p>
                    <p class="ml-4">
                        {{auth()->user()->nome}}
                    </p>
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex">
                    <p class="font-bold">
                        Sobrenome:
                    </p>
                    <p class="ml-4">
                        {{auth()->user()->sobrenome}}
                    </p>
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex">
                    <p class="font-bold">
                        Nome de usuário:
                    </p>
                    <p class="ml-4">
                        {{auth()->user()->nome_usuario}}
                    </p>
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex">
                    <p class="font-bold">
                        Email:
                    </p>
                    <p class="ml-4">
                        {{auth()->user()->email}}
                    </p>
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;">Editar</p>
                </div>
            </div>
        </form>

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
