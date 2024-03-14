<header class="bg-ds w-full text-white">
    <div class="container max-w-cds py-6 flex align-middle justify-between">
        <span 
        class="material-symbols-outlined menuLateral select-none 
        text-3xl hover:cursor-pointer">
            menu
        </span>
        <a href="/" class="flex align-middle mr-5">
            <img src="{{asset("imagens/svg/logo-no-background.svg")}}" alt="David'store"
            class="pointer-events-none w-40 ml-5">
        </a>
        <form action="/busca" method="GET" autocomplete="off"
        class="flex align-middle text-black w-3/5 shadow-lg mr-4">
        @csrf
            <input type="text" name="b" placeholder="Busque aqui"
            class="hidden md:block h-4 p-4 mt-1 pl-3 rounded-l outline-none w-full 
            placeholder:text-sm text-sm">
            <button type="submit" 
            class="bg-dsBlue mt-1 px-1 text-white rounded-r">
                <span title="Pesquisar"
                class="material-symbols-outlined flex align-middle justify-center">
                    search
                </span>
            </button>
        </form>

        @auth
        <div class='flex'>
            <span class='material-symbols-outlined'>account_circle</span>
            <div class='sessionInfo'>
                <p>
                    Olá, {$_SESSION['user']->nomeUsuario}
                </p>
                <p><strong><a href='minhaConta.php'>MINHA CONTA</a></strong> | <strong><a href='includes/sair.php'>SAIR</a></strong></p>
            </div>
        </div>
        @else
        <div class='flex align-middle text-sm'>
            <a href="/perfil">
                <span class='material-symbols-outlined flex align-middle text-3xl select-none'>
                    account_circle
                </span>
            </a>
            <p class="flex align-middle self-center select-none">
                <strong>
                    <a href='/login' class="flex align-middle mr-1 ml-2 hover:underline">
                        Entrar
                    </a>
                </strong> 
                <span class="mr-1">
                    ou
                </span>
                <strong>
                    <a href='/registrar' class="flex align-middle hover:underline">
                        Cadastre-se
                    </a>
                </strong>
            </p>
        </div>
        @endauth
        <div class='flex self-center ml-4'>
            <a href='/favoritos' class="flex">
                <span title='Favoritos' 
                class='material-symbols-outlined fav ifill text-2xl'>
                favorite
                </span>
            </a>
            <a href='/carrinho' class="flex">
                <span title='Carrinho'
                class='material-symbols-outlined fav ifill text-2xl ml-4
                {{$carrinhoAlert ?? ""}}'>
                shopping_cart
                </span>
            </a>
        </div>
    </div>
</header>