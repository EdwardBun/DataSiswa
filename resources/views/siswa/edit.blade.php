@extends('template')

@section('content')
    <form action="{{ route('siswa.update', $siswa['id'])}}" method="POST">
        @csrf
        @method('PATCH')

        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed')}}</div>
        @endif

        <div class="form-group">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" id="name" name="name" value="{{ $siswa['name'] }}" class="form-control">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nis" class="form-label">Nis :</label>
            <input type="number" id="nis" name="nis" value="{{ $siswa['nis'] }}" class="form-control">
            @error('nis')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="jurusan" class="form-label">Jurusan :</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ $siswa['jurusan'] }}" class="form-control">
            @error('jurusan')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="class" class="form-label">Class :</label>
            <select class="form-select" name="class" id="class">
                <option value="X" {{ $siswa['class'] == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ $siswa['class'] == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ $siswa['class'] == 'XII   ' ? 'selected' : '' }}>XII </option>
            </select>
            @error('class')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Ubah Data :</button>
        </div>
    </form>
@endsection

