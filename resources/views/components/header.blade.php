<header class="bg-ds w-full text-white">
    <div class="container max-w-cds py-6 flex align-middle justify-between">
        <span 
        class="material-symbols-outlined menuLateral select-none 
        text-3xl hover:cursor-pointer">
            menu
        </span>
        <a href="/" class="flex align-middle mr-5">
            <img src="{{asset("imagens/svg/logo-no-background.svg")}}" alt="David'store"
            class="pointer-events-none w-40 ml-6">
        </a>
        <form action="/busca" method="GET" autocomplete="off"
        class="flex align-middle text-black w-3/5 shadow-lg">
            <input type="text" name="busca" placeholder="Busque aqui"
            class="hidden md:block h-4 p-4 mt-1 pl-3 rounded-l outline-none w-full">
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
        <div class='flex align-middle self-center'>
            <span class='material-symbols-outlined flex align-middle'>account_circle</span>
            <p class="h-5">
                <strong>
                    <a href='/login'>
                        Entrar
                    </a>
                </strong> 
                ou 
                <strong>
                    <a href='/registrar'>
                        Cadastre-se
                    </a>
                </strong>
            </p>
        </div>
        @endauth
        <div class='flex self-center mt-2 ml-4'>
            <a href='/favoritos'>
                <span title='Favoritos' 
                class='material-symbols-outlined fav'>
                favorite
                </span>
            </a>
            <a href='/carrinho'>
                <span title='Carrinho'
                class='material-symbols-outlined fav {{$carrinhoAlert ?? ""}} fill'>
                shopping_cart
                </span>
            </a>
        </div>
    </div>
</header>