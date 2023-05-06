@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('kasirs.update', $kasirs) }}" method="POST">
            @csrf
            @method('PUT')
            <<div class="mb-3">
                <label>Code<span class="text-danger"></span></label>
                <input class="form-control" type="text" name="code" value="{{ old('code') }}" />
            </div>
            <div class="mb-3">
                <label>Nama Barang<span class="text-danger"></span></label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input class="form-control" type="text" name="price" value="{{ old('price') }}" />
            </div>
            <div class="mb-3">
                <label>Stok <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="stock" value="{{ old('stock') }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('kasirs.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection