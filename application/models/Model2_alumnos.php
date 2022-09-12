<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model2_Alumnos extends CI_Model {

    /*public function save($data){
        
        //$this->db->insert("alumnos",$data);
        if($this->db->insert("Tb_Codigos",$data,$this))
       {    
           return 'Registro Insertado con Exito';
       }
         else
       {
           return "Error al insertar el registro";
       }
    }*/
       public function save($data)
       {     
           return $this->db->insert('Tb_Codigos', $data);        
       }
    

    public function getAlumno(){
        $this->db->select("*");
        $this->db->from("Tb_Codigos");
        $results=$this->db->get();
        return $results->result();
        
    }



    public function getAlumnos($id){
        $this->db->select("u.IdCodigo, u.Nombre, u.Apellido,u.Correo,u.Carrera,u.Anio,u.Correlativo");
        $this->db->from("Tb_Codigos u");
        $this->db->where("u.IdCodigo",$id);
        $result=$this->db->get();
        return $result->row();
    }

    public function get_by_id($id)
    {        
        $q = $this->db->get_where("Tb_Codigos", ['iIdCodigod' => $id]);
        return $q;
    }

    public function update($id,$data){
        /*$this->db->where("IdCodigo",$id);
        $result = $this->db->update("Tb_Codigos",$data);

        if($result)
        {
            return "Registro Actualizado Correctamente";
        }
        else{
            return "Error al Actualizar Registro";
        }*/

        $this->db->where('IdCodigo', $id);
        return $this->db->update('Tb_Codigos', $data);        
    }

    public function delete($id){
        /*$this->db->where("IdCodigo",$id);
        $result = $this->db->delete("Tb_Codigos");
        //$result = $this->db->query("delete from `tb_codigos` where user_id = $id");

        if($result)
        {
            return "Registro Eliminado Correctamente";
        }
        else{
            return "Error al Eliminar el Registro";
        }*/
        $this->db->where('IdCodigo', $id);        
        return $this->db->delete('Tb_Codigos');        
    }
    
}
