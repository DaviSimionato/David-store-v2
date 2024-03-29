<x-layout>
    <div class="login container mx-auto flex justify-center mt-14">
        <div class="w-1/3 px-8">
            <h2 class="uppercase text-ds font-bold text-2xl after:bg-dsBlue
            after:block after:content-'' after:h-1 after:w-16 ">
                Fazer login
            </h2>
            <form action="/entrar" method="post" class="flex flex-col">
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
                <label for="senha" class="mt-5 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Senha
                </label>
                <input type="password" placeholder="Insira sua senha" name="senha"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">
                @error("senha")
                    <p class="text-red-700 text-xs mt-1 ml-2 font-semibold">{{$message}}</p>
                @enderror
                <button type="submit" class="flex items-center justify-center mt-4
                p-2 bg-ds font-bold uppercase text-white rounded">
                    <span class="material-symbols-outlined">login</span>
                    Entrar
                </button>
            </form>
            <div class="flex justify-between text-sm mt-1.5">
                <div class="flex text-gray-500">
                    <p>Não tem uma conta?</p>
                    <a href="/registrar" class="text-ds font-bold underline ml-1">
                        cadastre-se
                    </a>
                </div>
                <div class="">
                    <a href="/recuperarSenha" class="text-gray-500 underline font-bold">
                        Esqueci a senha
                    </a>
                </div>
            </div>    
        </div> 
    </div>
</x-layout>
<script>
    document.title = "Entrar";
    document.querySelector("body").style.background = "white";
    document.querySelector("footer").classList.add("absolute","bottom-0");
</script>