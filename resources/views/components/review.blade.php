@props(["review"])
<div class="mb-7 mt-1">
    <div class="flex items-center">
        <span style="margin-right:2px" 
        class="material-symbols-outlined mb-1.5 text-ds ifill">
            person
        </span>
        <p class="font-semibold text-dsText">
            {{$review->nom_usuario}}
        </p>
        <p class="mx-1">
            -
        </p>

        @for ($i=0;$i<5;$i++)
          @if (intval($review->nota) > $i)
            <span class="material-symbols-outlined ifill text-xl text-ds">
                star
            </span>
          @else
            <span class="material-symbols-outlined text-xl text-ds">
                star
            </span>
          @endif  
        @endfor
        <p class="ml-2 text-dsText text-sm font-bold opacity-70">
            {{$review->data_review}}
        </p>
        @if (trim($review->data_edit) != "")
        <p class="ml-2 text-dsText text-sm font-bold opacity-70">
            -
        </p>
        <p class="ml-2 text-dsText text-sm font-bold opacity-70">
            editada em:
        </p>
        <p class="ml-1.5 text-dsText text-sm font-bold opacity-70">
            {{$review->data_edit}}
        </p>
        @endif
    </div>

    <div class="text-dsText font-bold my-1 mx-1">
        @switch(intval($review->nota))
            @case(0)
                <p>Péssimo</p>
                @break
            @case(1)
                <p>Ruim</p>
                @break
            @case(2)
                <p>Insatisfatório</p>
                @break
            @case(3)
                <p>Regular</p>
                @break
            @case(4)
                <p>Bom</p>
                @break
            @case(5)
                <p>Ótimo</p>
                @break
            @default
                <p>Nota não definida</p>
        @endswitch
    </div>

    <div class="text-dsText my-1 text-sm mx-1">
        <p>
            {{$review->comentario}}
        </p>
    </div>
</div>