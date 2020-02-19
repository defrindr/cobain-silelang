@extends('layouts.main')

@section('title')
	Lelang
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
			<form action="{{ route('lelang.store') }}" method="POST" enctype="multipart/form-data">
				@csrf()
				@include('lelang.form')
			</form>
		</div>
	</div>
@endsection