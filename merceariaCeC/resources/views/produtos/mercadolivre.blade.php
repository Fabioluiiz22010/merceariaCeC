@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Produtos do Mercado Livre</h1>

    <form method="GET" action="/produtos-ml" style="margin-bottom: 20px;">
        <input 
            type="text" 
            name="q" 
            value="{{ $query }}" 
            placeholder="Buscar..."
            style="padding: 8px; width: 250px;"
        >
        <button class="btn btn-primary">Pesquisar</button>
    </form>

    <div class="row">
        @foreach ($produtos as $p)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $p['thumbnail'] }}" class="card-img-top">

                    <div class="card-body">
                        <h5 class="card-title">{{ $p['title'] }}</h5>
                        <p class="card-text">
                            Preço: R$ {{ number_format($p['price'], 2, ',', '.') }}
                        </p>
                        <a href="{{ $p['permalink'] }}" target="_blank" class="btn btn-success">
                            Ver no Mercado Livre
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        @if (count($produtos) == 0)
            <p>Nenhum produto encontrado.</p>
        @endif
    </div>

</div>
@endsection
