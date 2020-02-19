@extends('layouts.main')

@section('title')
	Level
@endsection

@section('desc')
	Edit {{ $level->nama }}
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
			<form action="{{ route('level.update',[
			'id' => $level->id]) }}" method="POST">
				@csrf()
				@method('PUT')
				@include('level.form')
			</form>
		</div>
	</div>
@endsection