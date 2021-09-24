@if(Session::has("mensagem"))
    <div class="alert alert-{{Session::get("mensagem")['tipo']}}" role="alert">
        {{Session::get("mensagem")["mensagem"]}}
    </div>
@endif
