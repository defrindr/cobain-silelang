@extends('layouts.main')

@section('title')
	Level
@endsection

@section('desc')
	Management Level
@endsection

@section('dir')
	Level
@endsection

@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
			<a href="{{ route('level.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<thead>
					<th>Nama</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					@foreach($level as $row)
					<tr>
						<td>{{ $row['nama'] }}</td>
						<td>
							<a href="{{ route('level.edit',['id' => $row->id]) }}" class="text-primary">
								<i class="fa fa-pencil"></i> Edit
							</a>
						</td>
						<td>
							<form action="{{ route('level.destroy',['id' => $row->id]) }}" method="POST" class="text-danger">
								@csrf()
								@method('DELETE')
								<button class="btn btn-action">
									<i class="fa fa-trash"></i> Hapus
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection