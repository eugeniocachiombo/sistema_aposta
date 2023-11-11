<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\ApostadorDao;
use App\Models\ApostadorModel;

class ApostadorController 
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

        $apostadorModel = new ApostadorModel();
        $apostadorModel->setId( $id );
        $apostadorModel->SetNome($nome);
        $apostadorModel->SetSobrenome($sobrenome);
        $apostadorModel->SetEmail($email);
        $apostadorModel->SetSenha($senha);
        $apostadorModel->SetNascimento($nascimento);
        $apostadorModel->SetGenero($genero);
        $apostadorModel->SetN_bi($n_bi);

        $apostadorDao = new ApostadorDao();
        $resultado = $apostadorDao->Cadastrar( $apostadorModel );
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

        $apostadorModel = new ApostadorModel();
        $apostadorModel->setId( $id );
        $apostadorModel->SetNome($nome);
        $apostadorModel->SetSobrenome($sobrenome);
        $apostadorModel->SetEmail($email);
        $apostadorModel->SetSenha($senha);
        $apostadorModel->SetNascimento($nascimento);
        $apostadorModel->SetGenero($genero);
        $apostadorModel->SetN_bi($n_bi);

        $apostadorDao = new ApostadorDao();
        $resultado = $apostadorDao->Actualizar( $apostadorModel );
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
        $apostadorDao = new ApostadorDao();
        $resultado = $apostadorDao->Listar();
        return $response->withJson( $resultado );
    }

    function Eliminar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $apostadorDao = new ApostadorDao();
        $resultado = $apostadorDao->Eliminar( $id );
        return $response->withJson( [
            'message' => $resultado == true ? 'Eliminado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos:: id: {$id}"
        ] );
    }

    function ListarPorId ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $apostadorDao = new ApostadorDao();
        $resultado = $apostadorDao->ListarPorId( $id );
        return $response->withJson( $resultado  );
    }

    function AlterarSenha( Request $request, Response $response, array $args ){

    }

    function ListarPorEmail( Request $request, Response $response, array $args ){

    }

    function ListarPorBISenha( Request $request, Response $response, array $args ){

    }

    function ListarPorIDSenha( Request $request, Response $response, array $args ){

    }

    function ListarPorBI( Request $request, Response $response, array $args ){

    }
}