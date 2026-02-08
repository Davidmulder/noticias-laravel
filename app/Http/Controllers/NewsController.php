<?php

namespace App\Http\Controllers;
use App\Models\News;


use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()  // todas as noticias colocarei uma paginação
    {
      $news = News::query()
            ->where('publicar', true) // somente que foram publicada
            ->orderByDesc('id')
            ->paginate(9);

        return view('news.index', compact('news'));
    }


    public function show(News $news)
    {
        abort_unless($news->publicar, 404);

        return view('news.show', compact('news'));
    }
}
