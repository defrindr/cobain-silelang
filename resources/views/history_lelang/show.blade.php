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
										$ {{ $lelang->harga_akhir }}
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