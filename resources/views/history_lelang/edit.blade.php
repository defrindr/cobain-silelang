@extends('layouts.main')

@section('title')
	Lelang
@endsection

@section('desc')
	Edit {{ $lelang->nama }}
@endsection

@section('dir')
	Edit
@endsection


@section('content')
	<div class="box box-primary">
		<div class="box-header">
		</div>
		<div class="box-body">
			<form action="{{ route('lelang.update',[
			'id' => $lelang->id]) }}" method="POST" enctype="multipart/form-data">
				@csrf()
				@method('PUT')
				@include('lelang.form')
			</form>
		</div>
	</div>
@endsection