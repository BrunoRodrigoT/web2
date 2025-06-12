@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Livro (Com Select)</h1>
    <form action="{{ route('books.store.select') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('books.partials.form', ['method' => 'POST', 'useSelects' => true])
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
