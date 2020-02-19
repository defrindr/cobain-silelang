@extends('layouts.main')

@section('title')
	Petugas
@endsection

@section('desc')
	Edit {{ $petugas->nama }}
@endsection

@section('dir')
	Edit
@endsection


@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
		</div>
		<div class="box-body">
			<form action="{{ route('petugas.update',[
			'id' => $petugas->id]) }}" method="POST" enctype="multipart/form-data">
				@csrf()
				@method('PUT')
				@include('petugas.form')
			</form>
		</div>
	</div>
@endsection