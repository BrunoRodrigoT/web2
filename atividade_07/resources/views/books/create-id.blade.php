@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Livro (Com ID)</h1>
    <form action="{{ route('books.store.id') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('books.partials.form', ['method' => 'POST', 'useSelects' => false])
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
