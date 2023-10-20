<?php

interface Crud{
    
    function Cadastrar($object);
    function Actualizar($object);
    function Eliminar($id);
    function Listar();
    
}