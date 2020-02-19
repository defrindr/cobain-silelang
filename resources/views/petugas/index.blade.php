@extends('layouts.main')

@section('title')
	Petugas
@endsection

@section('desc')
	Management petugas
@endsection

@section('dir')
	Petugas
@endsection

@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
			<a href="{{ route('petugas.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<thead>
					<th>Nama</th>
					<th>Nip</th>
					<th>Alamat</th>
					<th>Username</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					@foreach($petugas as $row)
					<tr>
						<td>{{ $row->nama }}</td>
						<td>{{ $row->nip }}</td>
						<td>{{ $row->alamat }}</td>
						<td>{{ $row->user->username }}</td>
						<td>
							<a href="{{ route('petugas.edit',['id' => $row->id]) }}" class="text-primary">
								<i class="fa fa-pencil"></i> Edit
							</a>
						</td>
						<td>
							<form action="{{ route('petugas.destroy',['id' => $row->id]) }}" method="POST" class="text-danger">
								@csrf()
								@method('DELETE')
								<button class="btn btn-action">
									<i class="fa fa-trash"></i> Hapus
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection