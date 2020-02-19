@extends('layouts.main')

@section('title')
	Ajukan Penawaran
@endsection

@section('desc')
	Ajukan Penawaran
@endsection

@section('dir')
	Ajukan Penawaran
@endsection


@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
		</div>
		<div class="box-body">
			<form action="{{ route('lelang.penawaranStore',[
				'lelang' => $lelang
			]) }}" method="POST">
				<input type="text" name="id_lelang" value="{{ $lelang->id }}" class="d-none">
				@csrf()
				@method('POST')
				<div class="form-group">
					<label for="">Nama barang</label>
					<input type="text" value="{{ $lelang->barang->nama }}" readonly="" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Penawaran Terakhir</label>
					@if($lelang->harga_akhir != null)
						<input type="text" class="form-control" value="$ {{ $lelang->harga_akhir }}" readonly="">
					@else
						<input type="text" class="form-control" value="$ {{ $lelang->barang->harga_awal }}" readonly="">
					@endif
				</div>
				<div class="form-group">
					<label for="penawaran_harga">Penawaran Harga</label>
					@if($lelang->harga_akhir != null)
						<input type="number" name="penawaran_harga" class="form-control" min="{{ $lelang->harga_akhir }}" value="{{ $lelang->harga_akhir+1 }}" required="">
					@else
						<input type="number" name="penawaran_harga" class="form-control" min="{{ $lelang->barang->harga_awal }}" required="">
					@endif
				</div>
				<div class="form-group">
					<button class="btn btn-success">Subumit</button>
				</div>
			</form>
		</div>
	</div>
@endsection