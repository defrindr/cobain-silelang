@extends('layouts.main')

@section('title')
	barang
@endsection

@section('desc')
	Management barang
@endsection

@section('dir')
	barang
@endsection

@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
			<a href="{{ route('barang.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<thead>
					<th>Nama</th>
					<th>Harga Awal</th>
					<th>tanggal</th>
					<th>Photo</th>
					<th colspan="3">Action</th>
				</thead>
				<tbody>
					@foreach($barang as $row)
					<tr>
						<td>{{ $row->nama }}</td>
						<td>$ {{ $row->harga_awal }}</td>
						<td>{{ $row->tanggal }}</td>
						<td><img src="/images/{{ $row->photo }}" class="img img-responsive" style="width: 80px"></td>
						<td>
							<a href="{{ route('barang.show',['id' => $row->id]) }}" class="text-success">
								<i class="fa fa-eye"></i> Show
							</a>
						</td>
						<td>
							<a href="{{ route('barang.edit',['id' => $row->id]) }}" class="text-primary">
								<i class="fa fa-pencil"></i> Edit
							</a>
						</td>
						<td>
							<form action="{{ route('barang.destroy',['id' => $row->id]) }}" method="POST" class="text-danger">
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