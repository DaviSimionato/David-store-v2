@props(['marca'])
<div class="marca mx-3 bg-white p-3 pb-6 rounded">
    <a href="{{"/produtos" . "/" . str_replace(" ", "-", $marca->nome)}}">
        <h2 class="text-center text-dsText font-bold">
            {{$marca->nome}}
        </h2>
        <img src="{{asset("imagens/marcas/$marca->foto")}}" 
        alt="{{$marca->nome}}" class="mx-auto my-6 w-28 h-12">
        <a href="{{"/produtos" . "/" . str_replace(" ", "-", $marca->nome)}}"
        class="bg-ds py-2 px-8 text-white rounded font-bold 
        uppercase text-sm hover:bg-dsLight">
            Ver Produtos
        </a>
    </a>
</div>