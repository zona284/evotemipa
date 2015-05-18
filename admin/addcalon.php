<div class="container kv-main">
            <div class="page-header">
            <h1>Upload Data Calon</h1>
            </div>
			<div class="col-md-1">
			</div>
<div class="col-md-6">
<form enctype="multipart/form-data" method ="POST" action="upload.php">

	<div class="form-group">
		<label for="namaketua"/>Nama Calon Ketua</label>
		<input type="text" class="form-control" id="namaketua" name="namaketua" placeholder="Nama Calon Ketua"/><br/>
	</div>
	<div class="form-group">
		<label for="namawakil"/>Nama Calon Wakil Ketua</label>
		<input type="text" class="form-control" id="namawakil" name="namawakil" placeholder="Nama Calon Ketua"/><br/>
	</div>
	<div class="form-group">
		<label for="namawakil"/>Profil</label>
		<input type="text" class="form-control" id="profil" name="profil" placeholder="profil"/><br/>
	</div>
	<div class="form-group">
		<label for="uploadPreview"/>Upload Gambar Pasangan</label>
		<img id="uploadPreview" src="upload/default.png" class="form-control" style="width: 150px; height: 150px;" alt="Preview">
		<input id="fileToUpload" class="btn btn-info" type="file" name="fileToUpload" onchange="PreviewImage();" />
	<br/>
	<div class="col-md-10"></div>
	<div class="col-md-2">
	<input type="submit" class="btn btn-primary" value="Tambah" onclick="return confirm(alert('Apa anda yakin?'))">
</div>
</div>
</div>	
<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>
<br/>

</form>