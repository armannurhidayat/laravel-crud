@extends('layouts.app')

@section('content')
<div class="container">
	
	<a href="{{ route('kelas.index') }}" class="btn btn-warning btn-sm my-2">Back</a>

	<div class="card">
	  <div class="card-header">
	    Update Data
	  </div>
	  <div class="card-body">
	  	<form action="{{ route('kelas.update', $kelas) }}" method="POST">
	  	{{ csrf_field() }}
	  	{{ method_field('PATCH') }}
		    <div class="form-group">
		    	<label for="nama">Nama Kelas</label>
		    	<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $kelas->nama }}">
		    	@error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
		    </div>
		    <button type="reset" class="btn btn-danger">Reset</button>
		    <button type="submit" class="btn btn-success">Simpan</button>
	    </form>
	  </div>
	</div>
</div>
@endsection