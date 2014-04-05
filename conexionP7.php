<?php
class ConexionP7
{
    public $mysqli;
    private $error;

    public function ConexionP7()
    {
        try
        {
            $this->mysqli = new mysqli("localhost", "root", "", "prograIV");
            if ($this->mysqli->connect_errno) {
                throw new Exception("Problemas al conectar con la base de datos. Error " . $this->mysqli->connect_errno . " " . $this->mysqli->connect_error);
            }
            return true;
        }
        catch(Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function informacionDelHost()
    {
        echo $this->mysqli->host_info . "\n";
    }

    public function getError()
    {
        return $this->error;
    }

    public function cerrar()
    {
        $this->mysqli->close();
    }
}
?>
