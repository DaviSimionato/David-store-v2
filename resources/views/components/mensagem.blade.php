@if (session()->has("mensagem"))
    <div class="fixed bottom-2 tranform bg-dsBlue text-white px-48 py-3 right-0
     rounded select-none mensagem">
        <p class="text-center text-lg font-bold">
            {{session("mensagem")}} 
        </p>
    </div>
@endif