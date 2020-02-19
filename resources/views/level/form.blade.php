
@if(isset($level))
	<div class="form-group">
		<label for="nama">Nama Level</label>
		<input type="text" name="nama" class="form-control" value="{{ $level->nama }}">
	</div>
@else
	<div class="form-group">
		<label for="nama">Nama Level</label>
		<input type="text" name="nama" class="form-control">
	</div>
@endif

<div class="form-group">
	<button class="btn btn-success">Submit</button>
</div>