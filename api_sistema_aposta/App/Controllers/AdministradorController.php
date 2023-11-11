<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\AdministradorDao;
use App\Models\AdministradorModel;

class AdministradorController 
{
    function Cadastrar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = 0;
        $nome = $data["nome"];
        $sobrenome = $data["sobrenome"];
        $email = $data["email"];
        $senha = $data["senha"];
        $nascimento = $data["nascimento"];
        $genero = $data["genero"];
        $n_bi = $data["n_bi"];

        $administradorModel = new AdministradorModel();
        $administradorModel->setId( $id );
        $administradorModel->SetNome($nome);
        $administradorModel->SetSobrenome($sobrenome);
        $administradorModel->SetEmail($email);
        $administradorModel->SetSenha($senha);
        $administradorModel->SetNascimento($nascimento);
        $administradorModel->SetGenero($genero);
        $administradorModel->SetN_bi($n_bi);

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->Cadastrar( $administradorModel );
        return $response->withJson( [
            'message' => $resultado == true ? 'Cadastrado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos::".  
            " nome: {$nome}, ".
            " sobrenome: {$sobrenome}, ".
            " email: {$email}, ".
            " senha: {$senha}, ".
            " nascimento: {$nascimento}, ".
            " genero: {$genero}, ".
            " n_bi: {$n_bi}"
        ] );
    }

    function Actualizar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data["id"];
        $nome = $data["nome"];
        $sobrenome = $data["sobrenome"];
        $email = $data["email"];
        $senha = $data["senha"];
        $nascimento = $data["nascimento"];
        $genero = $data["genero"];
        $n_bi = $data["n_bi"];

        $administradorModel = new AdministradorModel();
        $administradorModel->setId( $id );
        $administradorModel->SetNome($nome);
        $administradorModel->SetSobrenome($sobrenome);
        $administradorModel->SetEmail($email);
        $administradorModel->SetSenha($senha);
        $administradorModel->SetNascimento($nascimento);
        $administradorModel->SetGenero($genero);
        $administradorModel->SetN_bi($n_bi);

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->Actualizar( $administradorModel );
        return $response->withJson( [
            'message' => $resultado == true ? 'Actualizado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos::".  
            " id: {$id},".
            " nome: {$nome}, ".
            " sobrenome: {$sobrenome}, ".
            " email: {$email}, ".
            " senha: {$senha}, ".
            " nascimento: {$nascimento}, ".
            " genero: {$genero}, ".
            " n_bi: {$n_bi}"
        ] );
    }

    function Listar ( Request $request, Response $response, array $args ) {
        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->Listar();
        return $response->withJson( $resultado );
    }

    function Eliminar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->Eliminar( $id );
        return $response->withJson( [
            'message' => $resultado == true ? 'Eliminado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos:: id: {$id}"
        ] );
    }

    function ListarPorId ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->ListarPorId( $id );
        return $response->withJson( $resultado  );
    }

    function AlterarSenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];
        $senha_nova = $data["senha_nova"];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->AlterarSenha( $id, $senha_nova );
        return $response->withJson( [
            'message' => $resultado == true ? 'Senha alterada com sucesso' : $resultado,
            'log' => "Dados Inseridos:: id: {$id}, senha_nova: {$senha_nova}"
        ] );
    }

    function ListarPorEmail( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $email = $data["email"];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->ListarPorEmail( $email );
        return $response->withJson( $resultado );
    }

    function ListarPorBISenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $n_bi = $data["n_bi"];
        $senha = $data["senha"];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->ListarPorBISenha( $n_bi, $senha );
        return $response->withJson( $resultado );
    }

    function ListarPorIDSenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $id = $data["id"];
        $senha = $data["senha"];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->ListarPorIDSenha( $id, $senha );
        return $response->withJson( $resultado );
    }

    function ListarPorBI( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $n_bi = $data["n_bi"];

        $administradorDao = new AdministradorDao();
        $resultado = $administradorDao->ListarPorBI( $n_bi );
        return $response->withJson( $resultado );
    }
}