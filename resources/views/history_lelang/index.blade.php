@extends('layouts.main')

@section('title')
	Lelang
@endsection

@section('desc')
	Management Lelang
@endsection

@section('dir')
	Lelang
@endsection

@section('content')
	<div class="box box-primary">
		<div class="box-header">
			@include('layouts.alert')
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<thead>
					<th>Nama</th>
					<th>Tanggal Lelang</th>
					<th>Petugas</th>
					<th>Masyarakat</th>
					<th>Penawaran Tertinggi</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($lelang as $row)
					<tr>
						<td>
							{{ $row->barang->nama }}
						</td>
						<td>
							{{ Date('d F Y',strtotime($row->created_at)) }}
						</td>
						<td>
							{{ $row->petugas->nama }}
						</td>
						@if($row->id_masyarakat != null)
							<td>
								{{ $row->masyarakat->nama }}
							</td>
						@else
							<td>
								Belum ada penawaran
							</td>
						@endif
						@if($row->harga_akhir != null)
							<td>
								{{ $row->harga_akhir }}
							</td>
						@else
							<td>
								Belum ada penawaran
							</td>
						@endif
						<td>
							<a href="{{ route('history-lelang.show',['id' => $row->id]) }}" class="text-primary">
								<i class="fa fa-eye"></i> Show
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection