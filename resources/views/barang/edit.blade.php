@extends('layouts.main')

@section('title')
	Barang
@endsection

@section('desc')
	Edit {{ $barang->nama }}
@endsection

@section('dir')
	Edit
@endsection


@section('content')
	<div class="box box-primary">
		<div class="box-header">
		</div>
		<div class="box-body">
			<form action="{{ route('barang.update',[
			'id' => $barang->id]) }}" method="POST" enctype="multipart/form-data">
				@csrf()
				@method('PUT')
				@include('barang.form')
			</form>
		</div>
	</div>
@endsection