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
            $categorias = $this->modelo->getFiltro("categoria");
            $marcas = $this->modelo->getFiltro("marca");
            $condiciones = $this->modelo->getFiltro("condicion");
            $this->view->clientes = $clientes;
            $this->view->perfiles = $perfiles;
            $this->view->categorias = $categorias;
            $this->view->marcas = $marcas;
            $this->view->condiciones = $condiciones;
            $this->view->setPerfil = $this->isSubmit("setPerfil");
            $this->view->mostrarFiltro = $this->isSubmit("mostrarFiltro");
            $this->view->cambiarFiltro = $this->isSubmit("cambiarFiltro");
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
        $insertar =  $this->modelo->actualizarPerfil($perfil);
        if ($insertar) {
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
