@extends('layouts.main')

@section('title')
	{{ $petuga->nama }}
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
				<a href="{{ route('petugas.index') }}" class="btn btn-danger"> Cancel</a>
				<a href="{{ route('petugas.edit',[
					'masyarakat' => $petuga
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
								{{ $petuga->nama }}
							</td>
						</tr>
						<tr>
							<th>
								NIP
							</th>
							<td>
								{{ $petuga->nip }}
							</td>
						</tr>
						<tr>
							<th>
								Alamat
							</th>
							<td>
								{{ $petuga->alamat }}
							</td>
						</tr>
						<tr>
							<th>
								Username
							</th>
							<td>
								{{ $petuga->user->username }}
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
				<img src="/images/{{ $petuga->photo }}" alt="{{ $petuga->nama }}" class="img-responsive img-thumbnail">
			</div>
		</div>
	</div>
@endsection