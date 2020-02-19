@extends('layouts.main')

@section('title')
	{{ $barang->nama }}
@endsection

@section('desc')
	Info barang
@endsection

@section('dir')
	{{ $barang->nama }}
@endsection

@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
			<a href="{{ route('barang.index') }}" class="btn btn-default">Cancel</a>
			<a href="{{ route('barang.edit',['id' => $barang->id]) }}" class="btn btn-primary">
				<i class="fa fa-pencil"></i> Edit
			</a>
			<form action="{{ route('barang.destroy',['id' => $barang->id]) }}" method="POST" class="d-inline-block">
				@csrf()
				@method('DELETE')
				<button class="btn btn-danger">
					<i class="fa fa-trash"></i> Hapus
				</button>
			</form>
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<tbody>
					<tr>
						<td>Deskripsi Barang</td>
						<td>{{ $barang->deskripsi_barang }}</td>
					</tr>
					<tr>
						<td>Harga Awal</td>
						<td>{{ $barang->harga_awal }}</td>
					</tr>
					<tr>
						<td>Tanggal Penambahan</td>
						<td>{{ $barang->tanggal }}</td>
					</tr>
					<tr>
						<td>Nama Petugas</td>
						<td>{{ $barang->petugas->nama }}</td>
					</tr>
					<tr>
						<td>Photo</td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<img src="/images/{{ $barang->photo }}" alt="{{ $barang->nama }}" style="max-width: 450px;" class="img-responsive img-thumbnail">
		</div>
	</div>
@endsection