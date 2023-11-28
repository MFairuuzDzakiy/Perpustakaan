@extends ('layout.app')

@section ('title', 'Buku')

@section ('content')
<section class="section">
        <div class="section-header">
            <h4>Buku</h4>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Buku</h4>

                    <div class="card-header-form">
                        <a href="{{route('buku.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Jumlah-Halaman</th>
                                <th>Foto</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($buku as $bk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                {{-- <td>
                                    <img src="data:image/png,' . {{DNS1D::getBarcodePNG($bk->kode, 'C39+')}} . '" alt="barcode" style="width: 100px; height: 50px"/>
                                </td> --}}
                                <td> {!! DNS1D::getBarcodeHTML('$'.$bk->kode,'C39+',1,25)!!}</td>
                                <td>{{$bk->judul}}</td>
                                <td>{{$bk->pengarang}}</td>
                                <td>{{$bk->jumlah_halaman}}</td>
                                <td><img src="{{asset('/storage/buku/' .$bk->gambar)}}" class="rounded" style="width: 50px"></td>
                                <td>
                                    <form action="/buku/{{$bk->id}}" method="POST" id="delete-form{{$bk->id}}">
                                        @method('delete')
                                        @csrf
                                        <a href="/buku/{{$bk->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="/buku/{{$bk->id}}/edit" class="btn btn-sm btn-info mr-1"><i class="fa fa-print"></i></a>
                                        <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete('delete-form{{$bk->id}}')"></button>
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
@endsection

@push('script')

<script>
    $(document).ready( function () {
      $('#table').DataTable();
   } );
</script>

<script>
    function confirmDelete(deleteID)
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
                document.getElementById(deleteID).submit();
            }
        });
    }
</script>
@endpush