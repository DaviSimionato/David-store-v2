@if (session()->has("mensagem"))
    <div class="fixed top-2 tranform bg-ds text-white px-48 py-3 left-1/2
    translate-x-1/2">
        <p>
            {{session("message")}}
        </p>
    </div>
@endif