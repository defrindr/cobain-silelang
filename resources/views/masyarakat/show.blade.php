@extends('layouts.main')

@section('title')
	{{ $masyarakat->nama }}
@endsection

@section('desc')
	Management Masyarakat
@endsection

@section('dir')
	masyarakat
@endsection

@section('content')
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				@include('layouts.alert')
				<a href="{{ route('masyarakat.index') }}" class="btn btn-danger"> Cancel</a>
				<a href="{{ route('masyarakat.edit',[
					'masyarakat' => $masyarakat
				]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
			</div>
			<div class="box-body">
				<table class="table table-responsive">
					<tbody>
						<tr>
							<th>
								Nama
							</th>
							<td>
								{{ $masyarakat->nama }}
							</td>
						</tr>
						<tr>
							<th>
								Alamat
							</th>
							<td>
								{{ $masyarakat->alamat }}
							</td>
						</tr>
						<tr>
							<th>
								Username
							</th>
							<td>
								{{ $masyarakat->user->username }}
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<img src="/images/{{ $masyarakat->photo }}" alt="{{ $masyarakat->nama }}" class="img-responsive img-thumbnail">
			</div>
		</div>
	</div>
@endsection