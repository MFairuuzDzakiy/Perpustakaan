@extends('layout.app')

@section('title', 'Edit Category')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Category</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>

            <div class="card-body">
                <form action="/category/{{$category->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" class="form-control" value="{{$category->kode}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{$category->nama}}">
                    </div>

                    <button class="btn btn-sm btn-warning"><i class="fa fa-save"></i>Update</button>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection
