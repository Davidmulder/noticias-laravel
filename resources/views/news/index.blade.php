@extends('layouts.app')

@section('title', 'Notícias - Listagem')

@section('content')
  <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-1">Notícias</h1>
      <p class="text-muted mb-0">Listagem paginada e responsiva.</p>
    </div>

    <a class="btn btn-outline-success" href="{{ route('news.index') }}">
      Atualizar
    </a>
  </div>

  @if($news->count() === 0)
    <div class="alert alert-warning">
      Nenhuma notícia publicada.
    </div>
  @else
    <div class="row g-3">
      @foreach($news as $item)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            @if($item->image)
              <img
                src="{{ $item->image }}"
                class="card-img-top"
                alt="{{ $item->title }}"
                style="height: 180px; object-fit: cover;"
              >
            @else
              <div class="bg-secondary-subtle d-flex align-items-center justify-content-center" style="height: 180px;">
                <span class="text-muted small">Sem imagem</span>
              </div>
            @endif

            <div class="card-body d-flex flex-column">
              <h2 class="h6 fw-bold">{{ $item->title }}</h2>

              @if($item->resumo)
                <p class="text-muted small mb-3">{{ $item->resumo }}</p>
              @endif

              <div class="mt-auto d-flex gap-2">
                <a href="{{ route('news.show', $item) }}" class="btn btn-success btn-sm">
                  Ver detalhes
                </a>

                
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $news->links() }}
    </div>
  @endif
@endsection
