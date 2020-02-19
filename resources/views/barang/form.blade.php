
@if(isset($barang))
	<div class="form-group">
		<label for="nama">Nama Barang</label>
		<input type="text" name="nama" class="form-control" value="{{ $barang->nama }}">
	</div>
	<div class="form-group">
		<label for="deskripsi_barang">Deskripsi Barang</label>
		<textarea name="deskripsi_barang"  class="form-control">{{ $barang->deskripsi_barang }}</textarea>
	</div>
	<div class="form-group">
		<label for="harga_awal">Harga Awal</label>
		<input type="number" name="harga_awal" class="form-control" value="{{ $barang->harga_awal }}">
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal</label>
		<input type="date" name="tanggal" class="form-control" value="{{ $barang->tanggal }}">
	</div>
	<div class="form-group">
		<label for="photo">photo</label>
		<input type="file" name="photo" class="form-control">
	</div>
@else
	<div class="form-group">
		<label for="nama">Nama Barang</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label for="deskripsi_barang">Deskripsi Barang</label>
		<textarea name="deskripsi_barang"  class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="harga_awal">Harga Awal</label>
		<input type="number" name="harga_awal" class="form-control">
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal</label>
		<input type="date" name="tanggal" class="form-control">
	</div>
	<div class="form-group">
		<label for="photo">photo</label>
		<input type="file" name="photo" class="form-control">
	</div>
@endif

<div class="form-group">
	<button class="btn btn-success">Submit</button>
	<a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
</div>