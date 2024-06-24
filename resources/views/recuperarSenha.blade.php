<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="login container mx-auto flex justify-center mt-14">
        <div class="w-1/3 px-8">
            <h2 class="uppercase text-ds font-bold text-2xl after:bg-dsBlue
            after:block after:content-'' after:h-1 after:w-16 ">
                Recuperar Senha
            </h2>
            <form action="/mudarSenha" method="post" class="flex flex-col">
                @csrf
                @method("POST")
                <label for="email" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Email
                </label>
                <input type="email" placeholder="Insira seu e-mail" 
                value="{{old("email")}}" name="email"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">
                @error("email")
                    <p class="text-red-700 text-xs mt-1 ml-2 font-semibold">{{$message}}</p>
                @enderror

                <label for="novaSenha" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Nova senha
                </label>
                <input type="password" placeholder="Insira sua nova senha" name="novaSenha"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">
                @error("novaSenha")
                    <p class="text-red-700 text-xs mt-1 ml-2 font-semibold">{{$message}}</p>
                @enderror

                <label for="password" class="mt-5 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Confirmar senha
                </label>
                <input type="password" placeholder="Insira sua senha novamente" name="novaSenha_confirmation"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">
                @error("novaSenha_confirmation")
                    <p class="text-red-700 text-xs mt-1 ml-2 font-semibold">{{$message}}</p>
                @enderror

                <label for="respostaSecreta" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Resposta da sua pergunta secreta
                </label>
                <input type="text" placeholder="Responda sua pergunta secreta" 
                value="{{old("respostaSecreta")}}" name="respostaSecreta"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">
                @error("respostaSecreta")
                    <p class="text-red-700 text-xs mt-1 ml-2 font-semibold">{{$message}}</p>
                @enderror
                <button type="submit" class="flex items-center justify-center mt-4
                p-2 bg-ds font-bold uppercase text-white rounded hover:bg-dsLight">
                    <span class="material-symbols-outlined">edit</span>
                    Mudar senha
                </button>
            </form>
            <div class="flex justify-between text-sm mt-1.5">
                <div class="flex text-gray-500">
                    <p>Lembrou sua senha?</p>
                    <a href="/login" class="text-ds font-bold underline ml-2">
                        Entrar
                    </a>
                </div>
                <div class="">
                    <a href="/registrar" class="text-gray-500 underline font-bold">
                        cadastre-se
                    </a>
                </div>
            </div>    
        </div> 
    </div>
</x-layout>
<script>
    document.title = "Recuperar senha";
    document.querySelector("body").style.background = "white";
    document.querySelector("footer").classList.add("absolute","bottom-0", "-z-50");
</script>