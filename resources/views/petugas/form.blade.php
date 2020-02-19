
@if(isset($petugas))
	<div class="form-group">
		<label for="nip">NIP</label>
		<input type="text" name="nip" class="form-control" readonly value="{{ $petugas->nip }}">
	</div>
	<div class="form-group">
		<label for="nama">Nama Petugas</label>
		<input type="text" name="nama" class="form-control" value="{{ $petugas->nama }}">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat"  class="form-control">{{ $petugas->alamat }}</textarea>
	</div>
	<div class="form-group">
		<label for="alamat">Level</label>
		<select name="id_level" id="id_level" class="form-control">
			<option value="">-- Pilih Level ---</option>
			@foreach($level as $row)
				<option value="{{ $row->id }}" @if($row->id == $petugas->user->id_level) selected @endif>{{ $row->nama }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" class="form-control" value="{{ $petugas->user->username }}">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	<div class="form-group">
		<label for="photo">photo</label>
		<input type="file" name="photo" class="form-control">
	</div>
@else
	<div class="form-group">
		<label for="nip">NIP</label>
		<input type="text" name="nip" class="form-control" readonly="" value="{{ $nip }}">
	</div>
	<div class="form-group">
		<label for="nama">Nama Petugas</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat"  class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="alamat">Level</label>
		<select name="id_level" id="id_level" class="form-control">
			<option value="">-- Pilih Level ---</option>
			@foreach($level as $row)
				<option value="{{ $row->id }}">{{ $row->nama }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="photo">photo</label>
		<input type="file" name="photo" class="form-control">
	</div>
@endif

<div class="form-group">
	<button class="btn btn-success">Submit</button>
</div>