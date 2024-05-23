@props(["menuDepartamentos", "menuCategorias"])
<div class="fixed w-full h-screen overflow-hidden top-0 hidden menuLateral z-50">
    <div class="bg-ds w-1/5 h-screen p-8 pr-6 text-white font-bold ml"
    style="width: 360px">
        @auth
            <div class="flex justify-between items-center text-white font-bold
            text-xl mt-5">
                <div class="flex line-clamp-1">
                    <h2 class="mr-1 line-clamp-1">
                        Olá. {{auth()->user()->nome_usuario}}
                    </h2>
                </div>
                <span style="font-size:40px;" 
                class="material-symbols-outlined hover:cursor-pointer fechar">
                    close
                </span>
            </div>
        @else
            <div class="flex justify-between items-center text-xl mt-5">
                <div class="flex">
                    <h2 class="mr-1">
                        Olá.
                    </h2>
                    <a href="/login" class="hover:underline">
                        Faça seu login
                    </a>
                </div>
                <span style="font-size:40px;" 
                class="material-symbols-outlined hover:cursor-pointer fechar">
                    close
                </span>
            </div>
        @endauth

        <div class="ml-2 mt-2 select-none">
            <h3 class=" text-lg mb-2">
                Departamentos
            </h3>
            <div class="">
                @foreach ($menuDepartamentos as $menuDep)
                    <h3 class="">
                        {{$menuDep->departamento}}
                    </h3>
                    <div class="flex flex-col ml-2">
                        @foreach ($menuCategorias as $menuCat)
                            @if ($menuCat->departamento_id == $menuDep->id)

                            <a href="/produtos/{{str_replace(" ", "-", $menuCat->categoria)}}"
                            class="text-sm opacity-80 font-semibold hover:font-bold 
                            hover:opacity-100 py-0.5">
                                {{$menuCat->categoria}}
                            </a>

                            @endif
                        @endforeach
                    </div>
                @endforeach
                
            </div>
        </div>
        @auth
            <a href="/sair" class="bg-dsBlue text-center py-2 flex justify-center
            mt-4 rounded hover:bg-blue-500">
                Sair
            </a>
        @else
            <a href="/login" class="bg-dsBlue text-center py-2 flex justify-center
            mt-4 rounded hover:bg-blue-500">
                Entrar
            </a>
        @endauth
    </div>
    <div class="bg-black opacity-60 w-4/5 h-screen hover:cursor-pointer overlay">
    </div>
</div>
<script src="{{asset("js/menuLateral.js")}}"></script>