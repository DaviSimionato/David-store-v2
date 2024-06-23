<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container min-h-[70vh]">
        <div class="flex justify-center p-3 bg-white rounded 
        text-dsText mt-5 w-[70px] hover:bg-slate-50 cursor-pointer">
            <a href="/perfil" class="flex items-center">
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
                <div class="flex items-center">
                    <p class="font-bold">
                        Nome:
                    </p>
                    <p class="ml-4 dado block">
                        {{auth()->user()->nome}}
                    </p>
                    <input type="text" placeholder="Insira seu nome" 
                    name="nome"
                    value="{{auth()->user()->nome}}"
                    class="border border-gray-500 rounded py-2.5 pl-3 ml-4
                    outline-none dado hidden">
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;user-select:none">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <p class="font-bold">
                        Sobrenome:
                    </p>
                    <p class="ml-4 dado block">
                        {{auth()->user()->sobrenome}}
                    </p>
                    <input type="text" placeholder="Insira seu sobrenome" 
                    name="sobrenome"
                    value="{{auth()->user()->sobrenome}}"
                    class="border border-gray-500 rounded py-2.5 pl-3 ml-4
                    outline-none dado hidden">
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;user-select:none">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <p class="font-bold">
                        Nome de usuário:
                    </p>
                    <p class="ml-4 dado block">
                        {{auth()->user()->nome_usuario}}
                    </p>
                    <input type="text" placeholder="Insira seu sobrenome" 
                    name="nome_usuario"
                    value="{{auth()->user()->nome_usuario}}"
                    class="border border-gray-500 rounded py-2.5 pl-3 ml-4
                    outline-none dado hidden">
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;user-select:none">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <p class="font-bold">
                        Email:
                    </p>
                    <p class="ml-4 dado block">
                        {{auth()->user()->email}}
                    </p>
                    <input type="text" placeholder="Insira seu sobrenome" 
                    name="email"
                    value="{{auth()->user()->email}}"
                    class="border border-gray-500 rounded py-2.5 pl-3 ml-4
                    outline-none dado hidden">
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;user-select:none">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <p class="font-bold">
                        Telefone:
                    </p>
                    <p class="ml-4 dado block">
                        {{auth()->user()->telefone}}
                    </p>
                    <input type="text" placeholder="Insira seu sobrenome" 
                    name="telefone"
                    value="{{auth()->user()->telefone}}"
                    class="border border-gray-500 rounded py-2.5 pl-3 ml-4
                    outline-none dado hidden cadTel">
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;user-select:none">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <p class="font-bold">
                        Cpf:
                    </p>
                    <p class="ml-4 dado block">
                        {{auth()->user()->cpf}}
                    </p>
                    <input type="text" placeholder="Insira seu sobrenome" 
                    name="cpf"
                    value="{{auth()->user()->cpf}}"
                    class="border border-gray-500 rounded py-2.5 pl-3 ml-4
                    outline-none dado hidden cadCPF">
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer w-[75px]" 
                title="Editar review">
                    <span class="material-symbols-outlined">edit</span>
                    <p style="font-size:10px;font-weight:700;user-select:none">Editar</p>
                </div>
            </div>
            <div class="border my-4"></div>
            <button type="submit" class="flex bg-ds font-bold uppercase text-white
            w-full p-2 rounded justify-center">
                Salvar dados
            </button>
        </form>
    </div>

    @if ($errors->any())
    <div class="fixed bottom-2 tranform bg-dsBlue text-white px-48 py-3 right-0
     rounded select-none mensagem">
        <p class="text-center text-lg font-bold">
            Alteração de dados não aceita!
        </p>
    </div>
    @endif

    <script src="{{asset("js/dadosRegistro.js")}}"></script>
    <script src="{{asset("js/editDados.js")}}"></script>
</x-layout>
<script>
    document.title = "Perfil - {{auth()->user()->nome_usuario}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>
@if ($errors->any())
    <script>
        setTimeout(() => {
            let mensagem = document.querySelector(".mensagem");
            mensagem.classList.add("fadeOut");
            mensagem.addEventListener("animationend",()=> {
                mensagem.remove();
            });
        }, 3500);
    </script>
@endif
