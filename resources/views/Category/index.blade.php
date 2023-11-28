@extends('layout.app')

@section('title', 'category')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>

                    <div class="card-header-form">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-form"><i class="fa fa-plus"></i>Tambah Data</button>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-hover" id="table">
                        <thead>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </thead>

                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                <form action="/category/{{$item->id}}" method="GET" id="delete-form{{$item->id}}">
                                    @method('delete')
                                    <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete('delete-form{{$item->id}}')"></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('Category.form')
@endsection

@push('script')

<script>
    $(document).ready( function () {
      $('#table').DataTable();
   } );
</script>

<script>
    function confirmDelete(formId)
    {
        event.preventDefault();
        swal({
            title: 'Apakah Anda yakin?',
            text: 'Setelah dihapus, Anda tidak dapat memulihkannya!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(formId ).submit();
            }
        });
    }
</script>
@endpush