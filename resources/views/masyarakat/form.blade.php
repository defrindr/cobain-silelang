
@if(isset($masyarakat))
	<div class="form-group">
		<label for="nama">Nama Masyarakat</label>
		<input type="text" name="nama" class="form-control" value="{{ $masyarakat->nama }}">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat"  class="form-control">{{ $masyarakat->alamat }}</textarea>
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" class="form-control" value="{{ $masyarakat->user->username }}">
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
		<label for="nama">Nama Masyarakat</label>
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
		<label for="photo">photo</label>
		<input type="file" name="photo" class="form-control">
	</div>
@endif

<div class="form-group">
	<button class="btn btn-success">Submit</button>
</div>