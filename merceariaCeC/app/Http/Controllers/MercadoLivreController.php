<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MercadoLivreController extends Controller
{
    public function buscarProdutos()
    {
        // Produto padrão para exemplo
        $query = request()->input('q', 'arroz');

        // Chamada à API do Mercado Livre
        $response = Http::get('https://api.mercadolibre.com/sites/MLB/search', [
            'q' => $query
        ]);

        $produtos = $response->json()['results'] ?? [];

        return view('produtos.mercadolivre', compact('produtos', 'query'));
    }
}
