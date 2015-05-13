<!DOCTYPE html>
<!-- release v4.2.0, copyright 2014 - 2015 Kartik Visweswaran -->
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/fileinput.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>    </head>
    <body>
        <div class="container kv-main">
            <div class="page-header">
            <h1>Upload Gambar</h1>
            </div>
            <form enctype="multipart/form-data">
                <br>
				<input id="input-21" name="fileToUpload" type="file" accept="image/*" >
<script>
/* Initialize your widget via javascript as follows */
$("#input-21").fileinput({
	previewFileType: "image",
	browseClass: "btn btn-success",
	browseLabel: "Pick Image",
	browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
	removeClass: "btn btn-danger",
	removeLabel: "Delete",
	removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
	uploadClass: "btn btn-info",
	uploadLabel: "Upload",
	uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
	uploadUrl: "upload.php", // server upload action
    uploadAsync: true,
    maxFileCount: 0
});
$('#input-21').on('fileuploaded', function(event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra, 
        response = data.response, reader = data.reader;
    console.log('File uploaded triggered');
});
</script>
            </form>
            <hr>

        </div>
    </body>
	
</html>