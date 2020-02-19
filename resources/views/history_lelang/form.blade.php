
@if(isset($lelang))
@else
	<div class="form-group">
		<label for="id_barang">Nama Barang</label>
		<select name="id_barang" class="form-control">
			<option value="">-- Pilih Barang --</option>
			@foreach($barang as $row)
				<option value="{{ $row->id }}">{{ $row->nama }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal Lelang</label>
		<input type="text" readonly="" value="{{ Date('d F Y',time()) }}" class="form-control">
	</div>
@endif

<div class="form-group">
	<button class="btn btn-success">Submit</button>
	<a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
</div>