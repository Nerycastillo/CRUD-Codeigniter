<?php
class Model_alumnos extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtiene los registros de alumnos
     * @return [type] [arreglo de datos]
     */
    /*
    function getAlmnos()
    {
        return $this->db
            ->select('*')
            ->from('alumnos')
            ->get()
            ->result();
    }*/

    function getAlmnos()
    {
        $sql = "SELECT * FROM alumnos";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function create($datos) 
	{
		return $this->db->insert('alumnos', $datos);               
	}
    public function eliminar($id = NULL)
    {
        
    if($id!=NULL)
    {
    $this->Model_alumnos->delete($id);
    
    }
    else {
   
        redirect('');  
    }
}
public function delete($id)
{
    $this->db->where('alumno', $id);
    $this->db->delete('alumnos');
    redirect('alumnosController/index/');
           
}
public function update($id, $data)
{
    $this->db->where('alumno', $id);
    $this->db->set($data);
    return $this->db->update('alumnos');

}

function getAlmnos_id($id)
{
    $sql = "SELECT * FROM alumnos Where alumno = $id";
    $query = $this->db->query($sql);
    return $query->result();
}

}
