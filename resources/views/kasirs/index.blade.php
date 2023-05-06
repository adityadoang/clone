@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <div class="card-header">
        <form class="row row-cols-auto g-1">
            <div class="col">
                <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="cari..." />
            </div>
            <div class="col">
                <button class="btn btn-success">Search</button>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="{{ route('kasirs.create') }}"> + Tambah</a>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($kasirs as $kasir)
            <tr>
                <td>{{ $kasir->code  }}</td>
                <td>{{ $kasir->name }}</td>
                <td>{{ $kasir->price }}</td>
                <td>{{ $kasir->stock }}</td>
                <td>
                    <a class="btn btn-sm btn-danger" href="{{ route('kasirs.edit', $kasir) }}">Edit</a>
                    <form method="POST" action="{{ route('kasirs.destroy', $kasir) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-warning" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection