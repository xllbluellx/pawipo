<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/croppic.js"></script>
    <link rel="stylesheet" href="../../css/croppic.css">
</head>
<body>
<div id="cropContainerModal"></div>
<script>
var cropContainerModal = {
				uploadUrl:'../php/img_save_to_file.php',
				cropUrl:'../php/img_crop_to_file.php',
				modal:false,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') }
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerModal = new Croppic('cropContainerModal', cropContainerModal);
</script>
</body>
</html>