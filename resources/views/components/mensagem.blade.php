@if (session()->has("menssagem"))
    <div class="fixed bottom-2 tranform bg-ds text-white px-48 py-3 left-1/2
    translate-x-1/2">
        <p>
            {{session("menssagem")}}
        </p>
    </div>
@endif