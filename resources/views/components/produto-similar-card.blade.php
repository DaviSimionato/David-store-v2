@props(["produto","id"])
@if ($produto->id != $id)
    <a href="{{"/produto/$produto->id/" . str_replace(" ", "-", $produto->nome)}}"
    class="produto">
        <div title="{{$produto->nome}}" class="flex mx-4
        flex-col items-center">
            <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
            alt="{{$produto->nome}}" class="w-24 my-1">
            <p class="font-bold text-ds">
                {{$produto->precoAvista}}
            </p>
        </div>
    </a>
@endif