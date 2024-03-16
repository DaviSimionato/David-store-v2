@props(['departamento'])
<div class="bg-white p-3 pb-6 rounded">
    <a href="{{"/produtos" . "/" . str_replace(" ", "-", $departamento->departamento)}}">
        <h2 class="text-center text-dsText font-bold text-lg my-2">
            {{$departamento->departamento}}
        </h2>
        <img src="{{asset("imagens/departamentos/$departamento->foto")}}" 
        alt="{{$departamento->departamento}}" class="mx-auto" width="210">
    </a>
</div>