<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\PublicadorDao;
use App\Models\PublicadorModel;

class PublicadorController 
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

        $publicadorModel = new PublicadorModel();
        $publicadorModel->setId( $id );
        $publicadorModel->SetNome($nome);
        $publicadorModel->SetSobrenome($sobrenome);
        $publicadorModel->SetEmail($email);
        $publicadorModel->SetSenha($senha);
        $publicadorModel->SetNascimento($nascimento);
        $publicadorModel->SetGenero($genero);
        $publicadorModel->SetN_bi($n_bi);

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->Cadastrar( $publicadorModel );
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

        $publicadorModel = new PublicadorModel();
        $publicadorModel->setId( $id );
        $publicadorModel->SetNome($nome);
        $publicadorModel->SetSobrenome($sobrenome);
        $publicadorModel->SetEmail($email);
        $publicadorModel->SetSenha($senha);
        $publicadorModel->SetNascimento($nascimento);
        $publicadorModel->SetGenero($genero);
        $publicadorModel->SetN_bi($n_bi);

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->Actualizar( $publicadorModel );
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
        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->Listar();
        return $response->withJson( $resultado );
    }

    function Eliminar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->Eliminar( $id );
        return $response->withJson( [
            'message' => $resultado == true ? 'Eliminado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos:: id: {$id}"
        ] );
    }

    function ListarPorId ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->ListarPorId( $id );
        return $response->withJson( $resultado  );
    }

    function AlterarSenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];
        $senha_nova = $data["senha_nova"];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->AlterarSenha( $id, $senha_nova );
        return $response->withJson( [
            'message' => $resultado == true ? 'Senha alterada com sucesso' : $resultado,
            'log' => "Dados Inseridos:: id: {$id}, senha_nova: {$senha_nova}"
        ] );
    }

    function ListarPorEmail( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $email = $data["email"];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->ListarPorEmail( $email );
        return $response->withJson( $resultado );
    }

    function ListarPorBISenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $n_bi = $data["n_bi"];
        $senha = $data["senha"];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->ListarPorBISenha( $n_bi, $senha );
        return $response->withJson( $resultado );
    }

    function ListarPorIDSenha( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $id = $data["id"];
        $senha = $data["senha"];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->ListarPorIDSenha( $id, $senha );
        return $response->withJson( $resultado );
    }

    function ListarPorBI( Request $request, Response $response, array $args ){
        $data = $request->getParsedBody();
        $n_bi = $data["n_bi"];

        $publicadorDao = new PublicadorDao();
        $resultado = $publicadorDao->ListarPorBI( $n_bi );
        return $response->withJson( $resultado );
    }
}