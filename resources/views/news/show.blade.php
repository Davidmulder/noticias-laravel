@extends('layouts.app')

@section('title', $news->title)

@section('content')
  <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
    <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
      ← Voltar
    </a>

    
  </div>

  <div class="card shadow-sm">
    @if($news->image)
      <img
        src="{{ $news->image }}"
        class="card-img-top"
        alt="{{ $news->title }}"
        style="max-height: 360px; object-fit: cover;"
      >
    @endif

    <div class="card-body">
      <h1 class="h4 fw-bold mb-2">{{ $news->title }}</h1>

      @if($news->resumo)
        <p class="text-muted">{{ $news->resumo }}</p>
      @endif

      <hr>

      <div class="lh-lg">
        {!! nl2br(e($news->texto ?? '')) !!}
      </div>
    </div>
  </div>
@endsection
