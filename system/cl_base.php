<?php
class BaseDatos
{
   private $servidor="localhost";
   private $database="id15259947_msgg";
   private $usuario="id15259947_mssgg";
   private $password="MMS%8Q1T0)m#4?Yr";
   
   private $cnx = null;
   
    public function __contructor()
   	{
   		//parent::__contructor($this->servidor, $this->usuario,$this->password,$this->database);
   	}
    public function conectar()
	{
		$this->cnx=mysqli_connect($this->servidor, $this->usuario,$this->password,$this->database);
//		if(!$cnx){
//			$cnx=mysqli_connect_error();
//		}
		return $this->cnx;
	}
	public function sentencia($query)
	{
		$con=$this->conectar();
		$resultado=mysqli_query($con,$query);
		$this->cerrar($con);
		return $resultado;		
	}
    public function numfilas($resultado)
	{
		  $con=$this->conectar();
		  $n=mysqli_num_rows($resultado);
		  $this->cerrar($con);
		  return $n;
	}
	public function filas($resultado)
	{
	   $con=$this->conectar();
	   $campo=mysqli_fetch_assoc($resultado);
	   $this->cerrar($con);
	   return $campo;
	}
	public function afectadas()
	{
		$con=$this->conectar();
		$camp=mysqli_affected_rows($con);
		$this->cerrar($con);
		return $camp;
	}
	public function cerrar($con)
	{
	mysqli_close($con);
	}
}
?>