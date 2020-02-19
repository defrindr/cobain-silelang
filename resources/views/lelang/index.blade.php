@php
use App\Helpers\RoleHelper;

@endphp

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
			@if(Rolehelper::admin())
				<a href="{{ route('lelang.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
			@endif
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<thead>
					<th>Nama</th>
					<th>Tanggal Lelang</th>
					<th>Harga Awal</th>
					<th>Jumlah Penawaran</th>
					<th>Masyarakat</th>
					<th>Penawaran Tertinggi</th>
					<th colspan="3">Action</th>
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
							$ {{ $row->barang->harga_awal }}
						</td>
						<td>
							{{ count($row->historyLelang) }}
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
							<a href="{{ route('lelang.show',['id' => $row->id]) }}" class="text-primary">
								<i class="fa fa-eye"></i> Show
							</a>
						</td>
						@if(RoleHelper::admin() || RoleHelper::op())
						<td>
							<form action="{{ route('lelang.tutup',['id' => $row->id]) }}" method="POST" class="d-inline-block">
								@csrf()
								<button class="btn btn-action text-muted">
									<i class="fa fa-map-marker"></i> Tutup
								</button>
							</form>
						</td>
						<td>
							<form action="{{ route('lelang.destroy',['id' => $row->id]) }}" method="POST" class="text-danger">
								@csrf()
								@method('DELETE')
								<button class="btn btn-action">
									<i class="fa fa-trash"></i> Hapus
								</button>
							</form>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection