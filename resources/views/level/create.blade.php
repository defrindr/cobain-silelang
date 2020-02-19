@extends('layouts.main')

@section('title')
	Level
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
		</div>
		<div class="box-body">
			<form action="{{ route('level.store') }}" method="POST">
				@csrf()
				@include('level.form')
			</form>
		</div>
	</div>
@endsection