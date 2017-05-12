$(function(){
		//para buscar
		$('#busca').on('keyup',function(){
			var dato = $('#busca').val();
			var url = '../buscar/b_area.php';
			$.ajax({
				type:'POST',
				url:url,
				data:'dato='+dato,
				success: function(datos){
					$('#agrega-registros').html(datos);
				}
			});
			return false;
		});
	});
