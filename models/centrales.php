<?php

    //Clase  
    class Central{

      private $conexion;

      private $id;
      private $dir_divisional;
      private $zac;
      private $area;
      private $nombre_nodo;
      private $nombre_corto;
      private $jerarquia;
      private $tipo_equipo;
      private $emg;
      private $clli_sist;
      private $red_urbana;
      private $domicilio;
      private $edo;
      private $municipio;
      private $localidad;
      private $latitud;
      private $longitud;

      public function __CONSTRUCT{
        $conexion->$conexion = Conectar::conexion();

      }
      
      public function getId(){
        return $this->id;
      }

      public function setId($id){
        $this->id = $id;
      }

      public function getDir_divisional(){
        return $this->dir_divisional;
      }

      public function setDir_divisional($dir_divisional){
        $this->dir_divisional = $dir_divisional;
      }

      public function getZac(){
        return $this->zac;
      }

      public function setZac($zac){
        $this->zac = $zac;
      }

      public function getArea(){
        return $this->area;
      }

      public function setArea($area){
        $this->area = $area;
      }

      public function getNombre_nodo(){
        return $this->nombre_nodo;
      }

      public function setNombre_nodo($nombre_nodo){
        $this->nombre_nodo = $nombre_nodo;
      }

      public function getNombre_corto(){
        return $this->nombre_corto;
      }

      public function setNombre_corto($nombre_corto){
        $this->nombre_corto = $nombre_corto;
      }

      public function getJerarquia(){
        return $this->jerarquia;
      }

      public function setJerarquia($jerarquia){
        $this->jerarquia = $jerarquia;
      }

      public function getTipo_equipo(){
        return $this->tipo_equipo;
      }

      public function setTipo_equipo($tipo_equipo){
        $this->tipo_equipo = $tipo_equipo;
      }

      public function getEmg(){
        return $this->emg;
      }

      public function setEmg($emg){
        $this->emg = $emg;
      }

      public function getClli_sist(){
        return $this->clli_sist;
      }

      public function setClli_sist($clli_sist){
        $this->clli_sist = $clli_sist;
      }

      public function getRed_urbana(){
        return $this->red_urbana;
      }

      public function setRed_urbana($red_urbana){
        $this->red_urbana = $red_urbana;
      }

      public function getDomicilio(){
        return $this->domicilio;
      }

      public function setDomicilio($domicilio){
        $this->domicilio = $domicilio;
      }

      public function getEdo(){
        return $this->edo;
      }

      public function setEdo($edo){
        $this->edo = $edo;
      }

      public function getMunicipio(){
        return $this->municipio;
      }

      public function setMunicipio($municipio){
        $this->municipio = $municipio;
      }

      public function getLocalidad(){
        return $this->localidad;
      }

      public function setLocalidad($localidad){
        $this->localidad = $localidad;
      }

      public function getLatitud(){
        return $this->latitud;
      }

      public function setLatitud($latitud){
        $this->latitud = $latitud;
      }

      public function getLongitud(){
        return $this->longitud;
      }

      public function setLongitud($longitud){
        $this->longitud = $longitud;
      }

      public function Cantidad(){
        try {
          $consulta = $this->pdo->prepare("SELEC SUM (tipo_equipo)")
        } catch (\Throwable $th) {
          //throw $th;
        }
      }
    }  
		
?>