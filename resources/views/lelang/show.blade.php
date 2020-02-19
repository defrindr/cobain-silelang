@php
use App\Helpers\RoleHelper;

@endphp

@extends('layouts.main')

@section('title')
	{{ $lelang->barang->nama }}
@endsection

@section('desc')
	Info lelang
@endsection

@section('dir')
	{{ $lelang->barang->nama }}
@endsection

@section('content')
	<div class="container-fluid">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header">
					@include('layouts.alert')
					@if(RoleHelper::admin() || RoleHelper::op())
						<a href="{{ route('lelang.index') }}" class="btn btn-default">Cancel</a>
						<a href="{{ route('lelang.edit',['id' => $lelang->id]) }}" class="btn btn-primary">
							<i class="fa fa-pencil"></i> Edit
						</a>
						<form action="{{ route('lelang.destroy',['id' => $lelang->id]) }}" method="POST" class="d-inline-block">
							@csrf()
							@method('DELETE')
							<button class="btn btn-danger">
								<i class="fa fa-trash"></i> Hapus
							</button>
						</form>
					@elseif(RoleHelper::masy())
						<a href="{{ route('lelang.penawaran',['id' => $lelang->id]) }}" class="btn btn-primary">
							<i class="fa fa-balance-scale"></i> Ajukan Penawaran
						</a>
					@endif
				</div>
				<div class="box-body">
					<table class="table table-responsive">
						<tbody>
							<tr>
								<td>Deskripsi lelang</td>
								<td>{{ $lelang->barang->deskripsi_barang }}</td>
							</tr>
							<tr>
								<td>Harga Awal</td>
								<td>$ {{ $lelang->barang->harga_awal }}</td>
							</tr>
							<tr>
								<td>Tanggal Lelang</td>
								<td>{{ date('d F Y',strtotime($lelang->created_at)) }}</td>
							</tr>
							<tr>
								<td>Jumlah Penawaran</td>
								<td>{{ count($historyLelang) }} Penawaran</td>
							</tr>
							<tr>
								<td>Penawaran Tertinggi</td>
								@if($lelang->harga_akhir != null)
									<td>
										{{ $lelang->harga_akhir }}
									</td>
								@else
									<td>
										Belum ada penawaran
									</td>
								@endif
							</tr>
							<tr>
								<td>Nama Penawar</td>
								@if($lelang->id_masyarakat != null)
									<td>
										{{ $lelang->masyarakat->nama }}
									</td>
								@else
									<td>
										Belum ada penawar
									</td>
								@endif
							</tr>
						</tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<img src="/images/{{ $lelang->barang->photo }}" alt="{{ $lelang->barang->nama }}" style="max-height: 250px;margin: 0 auto;display: block;" class="img-responsive img-thumbnail">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header">
					<h4>Riwayat Penawaran</h4>
				</div>
				<div class="box-body">
					@if(count($historyLelang) > 0)
					<table class="table table-hover table-responsive table-condensed">
						<thead>
							<th>
								No
							</th>
							<th>
								Nama Penawar
							</th>
							<th>
								Jumlah Penawaran
							</th>
							<th>
								Tanggal Pengajuan
							</th>
						</thead>
						<tbody>
							@php
								$no = 0;
							@endphp
							@foreach($historyLelang as $row)
								<tr>
									<td>
										{{ $no+=1 }}
									</td>
									<td>
										{{ $row->masyarakat->nama }}
									</td>
									<td>
										{{ $row->penawaran_harga }}
									</td>
									<td>
										{{ Date('H:i:s \W\I\B, d F Y',strtotime($row->created_at)) }}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@else
							<span class="text-center d-block">
								Belum ada penawaran
							</span>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection