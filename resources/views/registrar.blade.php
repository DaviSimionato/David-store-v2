<x-layout>
    <div class="login container mx-auto flex justify-center mt-6">
        <div class="w-1/3 px-8">
            <h2 class="uppercase text-ds font-bold text-2xl after:bg-dsBlue
            after:block after:content-'' after:h-1 after:w-16 ">
                Criar conta
            </h2>
            <form action="/cadastrar" method="post" class="flex flex-col">
                @csrf
                @method("POST")

                <label for="nome" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Nome
                </label>
                <input type="text" placeholder="Insira seu nome" 
                name="nome"
                value="{{old("nome")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="sobrenome" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Sobrenome
                </label>
                <input type="text" placeholder="Insira seu sobrenome" 
                name="sobrenome"
                value="{{old("sobrenome")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="nome_usuario" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Nome de usuário
                </label>
                <input type="text" placeholder="Insira seu nome" 
                name="nome_usuario"
                value="{{old("nome_usuario")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">
                
                <label for="email" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Email
                </label>
                <input type="email" placeholder="Insira seu e-mail" 
                value="{{old("email")}}" name="email"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="telefone" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Telefone
                </label>
                <input type="text" placeholder="Insira seu telefone (somente números)" 
                name="telefone"
                value="{{old("telefone")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="cpf" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Cpf
                </label>
                <input type="text" placeholder="Insira seu cpf (somente números)" 
                name="cpf"
                value="{{old("cpf")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="senha" class="mt-5 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Senha
                </label>
                <input type="password" placeholder="Insira sua senha"
                name="senha" 
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="senha_confirmation" class="mt-5 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Confirme sua senha
                </label>
                <input type="password" placeholder="Confirme sua senha" 
                name="senha_confirmation" 
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="pergunta_secreta" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Crie uma pergunta secreta
                </label>
                <input type="text" placeholder="Será utilizada para recuperar a senha" 
                name="pergunta_secreta"
                value="{{old("pergunta_secreta")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <label for="resposta_secreta" class="mt-4 font-semibold text-dsText w-fit z-10
                bg-white ml-2 -mb-3 px-1" style="color:#63686e">
                    Resposta da pergunta secreta
                </label>
                <input type="text" placeholder="Crie uma resposa para sua pergunta" 
                name="resposta_secreta"
                value="{{old("resposta_secreta")}}"
                class="border border-gray-500 rounded py-2.5 pl-3 outline-none">

                <button type="submit" class="flex items-center justify-center mt-4
                p-2 bg-ds font-bold uppercase text-white rounded">
                    <span class="material-symbols-outlined">login</span>
                    Criar conta
                </button>
            </form>
            <div class="flex justify-between text-sm mt-1.5">
                <div class="flex text-gray-500">
                    <p>Já tem uma conta?</p>
                    <a href="/login" class="text-ds font-bold underline ml-1">
                        Entrar
                    </a>
                </div>
            </div>    
        </div> 
    </div>
</x-layout>
<script>
    document.querySelector("body").style.background = "white";
    document.title = "Cadastre-se";
</script>