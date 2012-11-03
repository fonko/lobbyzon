<?php 

class ExtFinderComponent extends Component {

/**
 * 
 * funcion busca extension imagen
 * 
 */
	public function get_file_extension($file_name)
	{
		return substr(strrchr($file_name,'.'),1);
	}
	
	public function move($origen, $destino)
	{
		move_uploaded_file($origen, $destino);
	}
}
	
?>
	