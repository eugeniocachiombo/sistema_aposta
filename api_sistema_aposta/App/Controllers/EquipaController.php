<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\EquipaDao;
use App\Models\EquipaModel;

class EquipaController 
{
    function Cadastrar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $nome = $data['nome'];

        $equipaModel = new EquipaModel(0, $nome);
        $equipaDao = new EquipaDao();
        $resultado = $equipaDao->Cadastrar( $equipaModel );
        return $response->withJson( [
            'message' => $resultado == true ? "Cadastrado com sucesso" : $resultado,
            'log' => "Dados Inseridos::  Nome: {$nome}"
        ] );
    }

    function Listar ( Request $request, Response $response, array $args ) {
        $equipaDao = new EquipaDao();
        $resultado = $equipaDao->Listar();
        return $response->withJson( $resultado );
    }

    function Actualizar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data['id'];
        $nome = $data['nome'];
        
        $equipaModel = new EquipaModel($id, $nome);
        $equipaDao = new EquipaDao();
        $resultado = $equipaDao->Actualizar( $equipaModel );
        return $response->withJson( [
            'message' => $resultado == true ? "Actualizado com sucesso" : $resultado,
            'log' => "Dados Inseridos::  Id: {$id}, Nome: {$nome}"
        ] );
    }

    function Eliminar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data['id'];
        
        $equipaModel = new EquipaModel($id, "");
        $equipaDao = new EquipaDao();
        $resultado = $equipaDao->Eliminar( $id );
        return $response->withJson( [
            'message' => $resultado == true ? "Eliminado com sucesso" : $resultado,
            'log' => "Dados Inseridos::  Id: {$id}"
        ] );
    }

    function ListarPorId ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data['id'];
        
        $equipaModel = new EquipaModel($id, "");
        $equipaDao = new EquipaDao();
        $resultado = $equipaDao->ListarPorId( $id );
        return $response->withJson( $resultado );
    }

    function ListarPorNome ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $nome = $data['nome'];
        
        $equipaModel = new EquipaModel($nome, "");
        $equipaDao = new EquipaDao();
        $resultado = $equipaDao->ListarPorNome( $nome );
        return $response->withJson( $resultado );
    }
}