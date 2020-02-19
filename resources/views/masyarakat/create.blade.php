@extends('layouts.main')

@section('title')
	Petugas
@endsection

@section('desc')
	Tambah
@endsection

@section('dir')
	Tambah
@endsection


@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
		</div>
		<div class="box-body">
			<form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
				@csrf()
				@include('masyarakat.form')
			</form>
		</div>
	</div>
@endsection