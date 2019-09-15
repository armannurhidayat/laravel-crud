@extends('layouts.app')

@section('content')
<div class="container">
	<div class="text-right">
		<a href="{{ route('student.create') }}" class="btn btn-success my-3">Add Data</a>
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
	    Daftar Mahasiswa
	  </div>
	  <div class="card-body">
	    <table class="table table-hover">
	    	<thead>
	    		<th>No</th>
	    		<th>Nama</th>
	    		<th>Kelas</th>
	    		<th>Alamat</th>
	    		<th>Aksi</th>
	    	</thead>

	    	<tbody>
	    		@foreach ($students as $student)
	    		<tr>
	    			<td>{{ $loop->iteration }}</td>
	    			<td>{{ ucwords($student->nama) }}</td>
	    			<td>{{ strtoupper($student->kelas->nama) }}</td>
	    			<td>{{ ucfirst($student->alamat) }}</td>
	    			<td>
	    				<a href="{{ route('student.edit', $student) }}" class="btn btn-info btn-sm">Update</a>
	    				<form action="{{ route('student.destroy', $student) }}" method="POST" class="d-inline">
		    				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin dihapus nih?')">Delete</button>
		    				{{ csrf_field() }}
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