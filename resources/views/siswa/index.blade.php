@extends('template')

@section('content')
<div class="d-flex justify-content-end my-3">
<div class="d-flex">
    <a href="{{ route('siswa.create') }}" class="btn btn-success ms-2">Tambah Akun</a>
</div>
</div>

    <div class="container">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif
        @if (Session::get('deleted'))
            <div class="alert alert-danger">
                {{ Session::get('deleted')}}
            </div>
        @endif

        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Jurusan</th>
                    <th>Class</th>
                    <th colspan="2" >Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no=1; @endphp
                    @foreach ($siswas as $item)
                        <tr>
                            <!-- fix nomor -->
                            <td>{{ $no++ }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['nis'] }}</td>
                            <td>{{ $item['jurusan'] }}</td>
                            <td>{{ $item['class'] }}</td>
                            <td class="d-flex">
                                <a href="{{ route('siswa.edit', $item['id']) }}" class="btn btn-warning me-3">Edit</a> 
                                <form action="{{ route('siswa.delete', $item['id'])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
