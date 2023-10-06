@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center flex-column my-5">
    <div class="fun-edit">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

            <h4>Categorie aanpassen</h4>

            <div class="form-group">
                <label for="title">Naam</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $category->name) }}">
            </div>

            <button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        </form>
        <div>
            <h4>Producten</h4>
            @foreach($products as $product)
                @if($product->category_id == $category->id)
                    <li>{{ $product->title }}</li>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
