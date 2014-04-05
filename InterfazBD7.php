<?php
require_once('ConexionP7.php');

class InterfazBD7 extends ConexionP7
{

	public function consulta($consulta)
	{
		try
        {
			$resultado = array();
			$this->ConexionP7();
            if ($result = $this->mysqli->query($consulta))
            {
                if ($result->num_rows > 0) 
                {
                     while($row = $result->fetch_assoc())
                     {
                         $resultado[] = $row;
                     }
                }
            }
            $this->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return array();
        } 
	}
	
	
	
    public function insertar($query)
    {
        try
        {
            if(!$this->ConexionP7())
            {
                throw new Exception($this->getError());
            }
            
            $resultado = $this->mysqli->query($query);
            $this->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return false;
        } 
    }

}
 ?>
