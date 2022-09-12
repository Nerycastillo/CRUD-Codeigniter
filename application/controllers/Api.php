<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
       // error_reporting(0);
        //$this->load->library("session");
       // $this->load->helper('url');
        $this->load->model('Model2_alumnos','alum');
        //$this->load->model('MD_Alumnos','student');
    }

    public function index_get(){
        $datos = $this->alum->getAlumno();
        $this->response($datos); 
        /*$datos = $this->alum->getAlumno();
        $this->response($datos); 
        if($datos) {
            $res['error'] = false;
            $res['message'] = 'susccess get data by id';
            $res['data'] = $datos; 
        }
        $this->response($res, 200);   */     
    }




    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[mt_rand(0, $max-1)];
        }

        return $token;
    }

    public function index_post(){
       
        //$t = getToken(8);
		$Nombre = $this->input->post("Nombre");
		$Apellido = $this->input->post("Apellido");
		$Correo = $this->input->post("Correo");
        $Codigo = $this->input->post("Codigo");
		$Carrera = $this->input->post("Carrera");
		$Anio = $this->input->post("Anio");
		$Correlativo = $this->input->post("Correlativo");
		


			$data = array(
				"Nombre"=>$Nombre,
				"Apellido"=>$Apellido,
				"Correo"=>$Correo,
				"Codigo"=> $Codigo,
				"Carrera"=>$Carrera,
				"Anio"=>$Anio,
				"Correlativo"=>$Correlativo

			);
			
			$datos = $this->alum->save($data);

            if($datos) {
                $res['status'] = 201;
                $res['message'] = 'Registro Insertado';
                
            } else {
                $res['status'] = 400;
                $res['message'] = 'insert failed';
               
            }
            $this-> response($res,200);
		
    }
	

    /*public function index_post(){

        $cog = $this->getToken();

       $data = array('Nombre' => $this->input->post("Nombre"),
		'Apellido' => $this->input->post("Apellido"),
		'Correo' => $this->input->post("Correo"),
        'Codigo' => $this->input->post("Codigo"),
        'Carrera' => $this->input->post("Carrera"),
		'Anio' => $this->input->post("Anio"),
		'Correlativo' => $this->input->post("Correlativo")
    );
    $datos = $this->Model2_alumnos->save($data);
    $this-> response($datos);


    }*/

    public function index_put()
    {
        $id = $this->input->get('IdCodigo');
        //$data2=$this->Model2_alumnos->getAlumnos($id);

        $Nombre = $this->input->post("Nombre");
		$Apellido = $this->input->post("Apellido");
		$Correo = $this->input->post("Correo");
        $Codigo = $this->input->post("Codigo");
		$Carrera = $this->input->post("Carrera");
		$Anio = $this->input->post("Anio");
		$Correlativo = $this->input->post("Correlativo");
        


        $data = array(
        'Nombre' => $this->input->post("Nombre"),
		'Apellido' => $this->input->post("Apellido"),
		'Correo' => $this->input->post("Correo"),
        'Codigo' => $this->input->post("Codigo"),
        'Carrera' => $this->input->post("Carrera"),
		'Anio' => $this->input->post("Anio"),
		'Correlativo' => $this->input->post("Correlativo")
    );    

     if(!empty($id)) {
           $update = $this->alum->update($id, $data);

           if($update) {
                $res['status'] = 201;
                $res['message'] = 'update success';
                $res['data'] = $data;
           } else {
                $res['error'] = true;
                $res['message'] = 'update failed';
                $res['data'] = null;
           }
        } else {
            $st['error'] = true;
            $res['message'] = 'update failed22';
            $res['data'] = null;
        }

        $this->response($res, 200); 


    }

    public function index_delete()
    {
        $id = $this->input->get('IdCodigo');

        //$datos = $this->Model2_alumnos->delete($id);
        //$this-> response($datos);
        if(!empty($id)) {

            $delete = $this->alum->delete($id);

            if($delete) {
                $res['error'] = false;
                $res['message'] = 'delete success';
                
           } else {
                $res['error'] = true;
                $res['message'] = 'delete failed';
                
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'delete failed';
        }

        $this->response($res, 200); 
    }
    


}









