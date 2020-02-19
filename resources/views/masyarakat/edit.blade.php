@extends('layouts.main')

@section('title')
	Masyarakat
@endsection

@section('desc')
	Edit {{ $masyarakat->nama }}
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
			<form action="{{ route('masyarakat.update',[
			'id' => $masyarakat->id]) }}" method="POST" enctype="multipart/form-data">
				@csrf()
				@method('PUT')
				@include('masyarakat.form')
			</form>
		</div>
	</div>
@endsection