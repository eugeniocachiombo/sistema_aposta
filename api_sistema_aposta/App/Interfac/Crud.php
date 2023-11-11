<?php

namespace App\Interfac;

Interface Crud{
    
    function Cadastrar($object);
    function Actualizar($object);
    function Eliminar($id);
    function Listar();
    
}