<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\GestorDao;
use App\Models\GestorModel;

class GestorController 
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

        $gestorModel = new GestorModel();
        $gestorModel->setId( $id );
        $gestorModel->SetNome($nome);
        $gestorModel->SetSobrenome($sobrenome);
        $gestorModel->SetEmail($email);
        $gestorModel->SetSenha($senha);
        $gestorModel->SetNascimento($nascimento);
        $gestorModel->SetGenero($genero);
        $gestorModel->SetN_bi($n_bi);

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->Cadastrar( $gestorModel );
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

        $gestorModel = new GestorModel();
        $gestorModel->setId( $id );
        $gestorModel->SetNome($nome);
        $gestorModel->SetSobrenome($sobrenome);
        $gestorModel->SetEmail($email);
        $gestorModel->SetSenha($senha);
        $gestorModel->SetNascimento($nascimento);
        $gestorModel->SetGenero($genero);
        $gestorModel->SetN_bi($n_bi);

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->Actualizar( $gestorModel );
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
        $gestorDao = new GestorDao();
        $resultado = $gestorDao->Listar();
        return $response->withJson( $resultado );
    }

    function Eliminar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->Eliminar( $id );
        return $response->withJson( [
            'message' => $resultado == true ? 'Eliminado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos:: id: {$id}"
        ] );
    }

    function ListarPorId ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->ListarPorId( $id );
        return $response->withJson( $resultado  );
    }

    function AlterarSenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];
        $senha_nova = $data["senha_nova"];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->AlterarSenha( $id, $senha_nova );
        return $response->withJson( [
            'message' => $resultado == true ? 'Senha alterada com sucesso' : $resultado,
            'log' => "Dados Inseridos:: id: {$id}, senha_nova: {$senha_nova}"
        ] );
    }

    function ListarPorEmail( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $email = $data["email"];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->ListarPorEmail( $email );
        return $response->withJson( $resultado );
    }

    function ListarPorBISenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $n_bi = $data["n_bi"];
        $senha = $data["senha"];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->ListarPorBISenha( $n_bi, $senha );
        return $response->withJson( $resultado );
    }

    function ListarPorIDSenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $id = $data["id"];
        $senha = $data["senha"];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->ListarPorIDSenha( $id, $senha );
        return $response->withJson( $resultado );
    }

    function ListarPorBI( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $n_bi = $data["n_bi"];

        $gestorDao = new GestorDao();
        $resultado = $gestorDao->ListarPorBI( $n_bi );
        return $response->withJson( $resultado );
    }
}