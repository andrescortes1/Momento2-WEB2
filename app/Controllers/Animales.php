<?php

namespace App\Controllers;

use App\Models\AnimalModelo;

class Animales extends BaseController{
    
    public function index(){
        return view('registroAnimales');
    }

    public function registrar(){
       

        
        $nombre=$this->request->getPost("nombre");
        $foto=$this->request->getPost("foto");
        $edad=$this->request->getPost("edad");
        $descripcion=$this->request->getPost("descripcion");
        $tipoAnimal=$this->request->getPost("tipoAnimal");

      
        if($this->validate('formularioAnimales')){

           try{

         
            $modelo=new AnimalModelo();

            
            $datos=array(
                "nombre"=>$nombre,
                "foto"=>$foto,
                "edad"=>$edad,
                "descripcion"=>$descripcion,
                "tipo"=>$tipoAnimal
            );

            
            $modelo->insert($datos);

            $mensaje="exito agregando el animal..";
            return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);


           }catch(\Exception $error){

               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
               
           }

        }else{
            $mensaje="Revise por favor hay datos obligatorios";
    
            return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);

        }

    }

    public function buscar(){

        try{

            $modelo=new AnimalModelo();

            $resultado=$modelo->findAll();

            $animales=array("animales"=>$resultado);

            return view('listaAnimales',$animales);


           }catch(\Exception $error){

               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
               
           }

    }

    public function eliminar($id){

        try{
         $modelo=new AnimalModelo();
         $modelo->where('id',$id)->delete();
         $mensaje="exito eliminando el producto..";
         return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
 
 
        }catch(\Exception $error){
 
         $mensaje=$error->getMessage();
         return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
         
         }
 
     }

     public function editar($id){

  
        $edad=$this->request->getPost("edad");

        //aplico las validaciones
        if($this->validate('formularioEdicionAnimal')){

            try{
 
             //creo un objeto del modelo de productos
             $modelo=new AnimalModelo();
             
             $datos=array(
               
                "edad"=>$edad
                 
             );
 
             
             $modelo->update($id,$datos);
 
             $mensaje="exito editando el producto..";
             return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
 
 
            }catch(\Exception $error){
 
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
                
            }
 
         }else{
             $mensaje="Revise por favor hay datos obligatorios";
     
             return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
 
         }


    }
}
