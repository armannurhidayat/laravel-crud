@extends('layouts.app')

@section('content')
<div class="container">
	<div class="text-right">
		<a href="{{ route('kelas.create') }}" class="btn btn-success my-3">Add Data</a>
	</div>

	<!-- Alert -->
	@if (session('add'))
	<div class="alert alert-success">
		{{ session('add') }}
	</div>
	@endif
	
	@if (session('update'))
	<div class="alert alert-success">
		{{ session('update') }}
	</div>
	@endif

	@if (session('delete'))
	<div class="alert alert-success">
		{{ session('delete') }}
	</div>
	@endif
	<!-- /Alert -->

	<div class="card">
	  <div class="card-header">
	    Daftar Kelas
	  </div>
	  <div class="card-body">
	    <table class="table table-hover">
	    	<thead align="center">
	    		<th>No</th>
	    		<th>Nama Kelas</th>
	    		<th>Aksi</th>
	    	</thead>

	    	<tbody align="center">
	    		@foreach ($kelas as $kls)
	    		<tr>
	    			<td>{{ $loop->iteration }}</td> {{-- Fungsi looping nomor pada laravel --}}
	    			<td>{{ strtoupper($kls->nama) }}</td>
	    			<td>
	    				<a href="{{ route('kelas.edit', $kls) }}" class="btn btn-info btn-sm">Update</a>
	    				<form action="{{ route('kelas.destroy', $kls) }}" class="destroy-form d-inline" method="POST">
	    					<button type="submit" class="btn btn-danger btn-sm btn-destroy" onclick="return confirm('Yakin dihapus nih?')">Delete</button>
	    					@csrf
	    					@method('DELETE')
	    				</form>
	    			</td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
	  </div>
	</div>
</div>
@endsection