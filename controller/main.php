<?php
class Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->productos = "";
    }

    public function render()
    {
        if ($this->isEmpleado()) {

            $clientes = $this->modelo->getClientes();
            $perfiles = $this->modelo->getPerfiles();
            $permisos = $this->modelo->getPermisos();
            $categorias = $this->modelo->getFiltro("categoria");
            $marcas = $this->modelo->getFiltro("marca");
            $condiciones = $this->modelo->getFiltro("condicion");
            $this->view->clientes = $clientes;
            $this->view->perfiles = $perfiles;
            $this->view->permisos = $permisos;
            $this->view->categorias = $categorias;
            $this->view->marcas = $marcas;
            $this->view->condiciones = $condiciones;
            $this->view->setPerfil = $this->isSubmit("setPerfil");
            $this->view->editPerfil = $this->isSubmit("editPerfil");
            $this->view->addPerfil = $this->isSubmit("addPerfil");
            $this->view->statePerfil = $this->isSubmit("statePerfil");
            $this->view->editPermiso = $this->isSubmit("editPermiso");
            $this->view->statePermiso = $this->isSubmit("statePermiso");
            $this->view->mostrarFiltro = $this->isSubmit("mostrarFiltro");
            $this->view->cambiarFiltro = $this->isSubmit("cambiarFiltro");
            $this->view->addPermiso = $this->isSubmit("addPermiso");
            $this->view->ingresarCategoria = $this->isSubmit("ingresarFiltro");
            $this->view->render("main/index_emp");

        } else {

            $productosNuevos = $this->modelo->getProductos("Nuevo");
            $productosDestacados = $this->modelo->getProductos("Destacado");
            $banners = $this->modelo->getBanners();
            $this->view->productosNuevos = $productosNuevos;
            $this->view->productosDestacados = $productosDestacados;
            $this->view->banners = $banners;
            $this->view->render("main/index");
        }
    }

    public function setPerfil()
    {
        $perfil = array(
            "key" => $_POST["key"],
            "perfil" => intval($_POST["perfiles"])
        );
        $insertar =  $this->modelo->actualizarCliente($perfil);
        if ($insertar) {
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function editPerfil(){
        $editPerfil = array(
            "ID" => intval($_POST["ID"]),
            "Nombre" => $_POST["nombre"]
        );
        $update = $this->modelo->actualizarPerfil($editPerfil);
        if ($update) {
            echo "<meta http-equiv='refresh' content='0'>";
        }
        
    }

    public function statePerfil(){
        if($_POST["statePerfil"] == "Activar"){
            $statePerfil = array(
                "ID" => intval($_POST["ID"]),
                "Activo" => 1
            );
        }else if($_POST["statePerfil"] == "Desactivar"){
            $statePerfil = array(
                "ID" => intval($_POST["ID"]),
                "Activo" => 0
            );
        }
        $update = $this->modelo->activarPerfil($statePerfil);
        if($update){
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }

    public function addPerfil(){
        $newPerfil = array(
            "Nombre" => $_POST["nombre"]
        );
        $addPerfil = $this->modelo->addPerfil($newPerfil);
        if($addPerfil){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function editPermiso(){
        $editPermiso = array(
            "ID" => intval($_POST["ID"]),
            "Nombre" => $_POST["nombre"],
            "Code" => $_POST["code"]
        );
        $update = $this->modelo->actualizarPermiso($editPermiso);
        if($update){
            echo "<meta http-equiv='refresh' content='0'>";
        }   
    
    }

    public function statePermiso(){
        if($_POST["statePermiso"] == "Activar"){
            $statePermiso = array(
                "ID" => intval($_POST["ID"]),
                "Activo" => 1 
            );
        }else if($_POST["statePermiso"] == "Desactivar"){
            $statePermiso = array(
                "ID" => intval($_POST["ID"]),
                "Activo" => 0 
            );
        }
        $update = $this->modelo->activarPermiso($statePermiso);
        if($update){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function addPermiso(){
        $newPermiso = array(
            "Nombre" => $_POST["descripcion"],
            "Code" => strtoupper($_POST["code"])
        );
        $addPermiso =$this->modelo->addPermiso($newPermiso);
        if($addPermiso){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function mostrarFiltro()
    {
        if ($_POST["mostrarFiltro"] == "Activar") {
            $estado = array(
                "ID" => intval($_POST["ID"]),
                "Activo" => 1,
                "Tabla" => $_POST["tabla"]
            );
        } else if ($_POST["mostrarFiltro"] == "Desactivar") {
            $estado = array(
                "ID" => intval($_POST["ID"]),
                "Activo" => 0,
                "Tabla" => $_POST["tabla"]
            );
        }
        $exito = $this->modelo->mostrarFiltro($estado);

        if ($exito) {
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function cambiarFiltro()
    {
        if (!empty($_POST["nombre"])) {
            $nombre = array(
                "ID" => intval($_POST["ID"]),
                "Nombre" => $_POST["nombre"],
                "Tabla" => $_POST["tabla"]
            );
            $insertar = $this->modelo->cambiarFiltro($nombre);
            if ($insertar) {
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
    }

    public function ingresarFiltro()
    {
        $nuevo = array(
            "Nombre" => $_POST["filtro"],
            "Tabla" => $_POST["tabla"]
        );
        $insertar = $this->modelo->nuevoFiltro($nuevo);
        if ($insertar) {
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}
