@extends('template')

@section('content')
    <form action="{{ route('nilai.update', $nilai['id'])}}" method="POST">
        @csrf
        @method('PATCH')

        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed')}}</div>
        @endif

        <div class="form-group">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" id="name" name="name" value="{{ $nilai['name'] }}" class="form-control">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nis" class="form-label">Nis :</label>
            <input type="number" id="nis" name="nis" value="{{ $nilai['nis'] }}" class="form-control">
            @error('nis')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="jurusan" class="form-label">Jurusan :</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ $nilai['jurusan'] }}" class="form-control">
            @error('jurusan')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nilai" class="form-label">Nilai :</label>
            <input type="number" id="nilai" name="nilai" value="{{ $nilai['nilai'] }}" class="form-control">
            @error('nilai')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Ubah Data Nilai :</button>
        </div>
    </form>
@endsection

