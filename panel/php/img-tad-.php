
<div id="img-box" class="animated bounceInRight">
<hr>
<p>Cargar y editar una nueva foto para TADDI <span class="desc" style="color: #f34248;">(Dimensiones recomendadas: 500 por 190 pixeles o superior)</span></p>
<div id="cropContainerModal" class="gradient"></div>
<script>
$(document).ready(function () {
var cropContainerModal = {
				uploadUrl:'../php/img_save_to_file.php',
				cropUrl:'../php/img_crop_to_file.php',
				modal:true,
				imgEyecandyOpacity:0.6,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ 
				
				 },
				onAfterImgUpload: function(){ },
				onImgDrag: function(){  },
				onImgZoom: function(){ },
				onBeforeImgCrop: function(){ 

				},
				onAfterImgCrop:function(){ 
					alertify.alert("<b>La nueva imagen se ha subido correctamente.</b>");
					//$('div#img-box').remove();
					location.reload();			
				},
				onReset:function(){  },
				onError:function(errormessage){ }
		}
		var cropContainerModal = new Croppic('cropContainerModal', cropContainerModal);		
});
</script>
</div>