@php
    $relations = [
        'publisher' => 'publishers',
        'author' => 'authors',
        'category' => 'categories',
    ];
@endphp

<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title ?? '') }}" required>
</div>

@if($useSelects)
    @foreach($relations as $relation => $plural)
        <div class="mb-3">
            <label for="{{ $relation }}_id" class="form-label">{{ ucfirst($relation) }}</label>
            <select class="form-select" id="{{ $relation }}_id" name="{{ $relation }}_id" required>
                <option value="" disabled selected>Selecione uma opção</option>
                @foreach($$plural as $entity)
                    <option value="{{ $entity->id }}" {{ old($relation.'_id', $book->{$relation.'_id'} ?? '') == $entity->id ? 'selected' : '' }}>
                        {{ $entity->name }}
                    </option>
                @endforeach
            </select>
        </div>
    @endforeach
@else
    @foreach(['publisher', 'author', 'category'] as $relation)
        <div class="mb-3">
            <label for="{{ $relation }}_id" class="form-label">ID {{ ucfirst($relation) }}</label>
            <input type="number" class="form-control" id="{{ $relation }}_id" name="{{ $relation }}_id" value="{{ old($relation.'_id', $book->{$relation.'_id'} ?? '') }}" required>
        </div>
    @endforeach
@endif

<div class="mb-3">
    <label for="cover_image" class="form-label">Imagem de Capa</label>
    <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
    @if(isset($book) && $book->cover_image)
        <div class="mt-2">
            <p>Imagem Atual:</p>
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Capa Atual" class="img-thumbnail" width="150">
        </div>
    @endif
</div>
