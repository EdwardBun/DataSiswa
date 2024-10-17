@extends('template')

@section('content')
<form action="{{ route('siswa.store') }}" method="post" class="card p-5">
    @csrf 

    @if(Session::get('success'))
        <div class="alert alert-success"> {{Session::get('success')}} </div>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
    </ul>
    @endif
    
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nis" class="col-sm-2 col-form-label">Nis :</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="nis" id="nis">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="jurusan" id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="class" class="col-sm-2 col-form-label">Kelas :</label>
        <div class="col-sm-10">
            <select class="form-select" name="class" id="class">
                <option selected disabled hidden>Pilih</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Akun</button>
</form>
@endsection

        