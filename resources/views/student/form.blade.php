@extends('layouts.app')

@section('content')
<div class="container">
	
	<a href="{{ route('student.index') }}" class="btn btn-warning btn-sm my-2">Back</a>

	<div class="card">
	  <div class="card-header">
	    Tambah Data
	  </div>
	  <div class="card-body">
	  	<form action="{{ route('student.store') }}" method="POST">
	  	@csrf
		    <div class="form-group">
		    	<label for="nama">Nama</label>
		    	<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
		    	@error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
		    </div>
		    <div class="form-group">
		    	<label for="kelas_id">Kelas</label>
		    	<select name="kelas_id" id="kelas_id" class="form-control">
		    		@foreach ($kelas as $kls)
			    		<option value="{{ $kls->id }}">{{ strtoupper($kls->nama) }}</option>
		    		@endforeach
		    	</select>
		    </div>
		    <div class="form-group">
		    	<label for="alamat">Alamat</label>
		    	<textarea style="resize: vertical; min-height: 100px" name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
		    	@error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
		    </div>
		    <button type="reset" class="btn btn-danger">Reset</button>
		    <button type="submit" class="btn btn-success">Simpan</button>
	    </form>
	  </div>
	</div>
</div>
@endsection