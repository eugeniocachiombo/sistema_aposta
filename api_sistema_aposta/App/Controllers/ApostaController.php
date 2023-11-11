<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\ApostaDao;
use App\Models\ApostaModel;
use App\Models\ApostadorModel;
use App\Models\PartidaPublicadaModel;

class ApostaController 
 {
    function Cadastrar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = 0;
        $id_apostador = $data[ 'id_apostador' ];
        $id_partida_pub = $data[ 'id_partida_pub' ];
        $golos_equipaA = $data[ 'golos_equipaA' ];
        $golos_equipaB = $data[ 'golos_equipaB' ];
        $data_aposta = $data[ 'data_aposta' ];
        $hora_aposta = $data[ 'hora_aposta' ];
        $valor_apostado = $data[ 'valor_apostado' ];

        $apostador = new ApostadorModel();
        $apostador->setId( $id_apostador );

        $partida_pub = new PartidaPublicadaModel( $id_partida_pub, 0, '', '', '', '', 0 );
        $ApostaModel = new ApostaModel(
            $id,
            $apostador,
            $partida_pub,
            $golos_equipaA,
            $golos_equipaB,
            $data_aposta,
            $hora_aposta,
            $valor_apostado
        );

        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->Cadastrar( $ApostaModel );
        return $response->withJson( [
            'message' => $resultado == true ? 'Cadastrado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos::".  
            " id_apostador: {$id_apostador},".
            " id_partida_pub: {$id_partida_pub}, ".
            " golos_equipaA: {$golos_equipaA}, ".
            " golos_equipaB: {$golos_equipaB}, ".
            " data_aposta: {$data_aposta}, ".
            " hora_aposta: {$hora_aposta}, ".
            " valor_apostado: {$valor_apostado}"
        ] );
    }

    function Listar ( Request $request, Response $response, array $args ) {
        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->Listar();
        return $response->withJson( $resultado );
    }

    function Eliminar ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->Eliminar( $id );
        return $response->withJson( [
            'message' => $resultado == true ? 'Eliminado com sucesso' : $resultado,
            'log' => 
            "Dados Inseridos:: id: {$id}"
        ] );
    }

    function ListarPorId ( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id = $data[ 'id' ];

        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->ListarPorId( $id );
        return $response->withJson( $resultado  );
    }

    function ListarPorApostador( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id_apostador = $data[ 'id_apostador' ];

        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->ListarPorApostador( $id_apostador );
        return $response->withJson( $resultado );
    }

    function ListarPorIdPartidaPublicada( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id_partida_publicada = $data[ 'id_partida_publicada' ];

        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->ListarPorIdPartidaPublicada( $id_partida_publicada );
        return $response->withJson( $resultado );
    }

    function ListarPorIdPartidaPublicadaApostador( Request $request, Response $response, array $args ) {
        $data = $request->getParsedBody();
        $id_partida_publicada = $data[ 'id_partida_publicada' ];
        $id_apostador = $data[ 'id_apostador' ];

        $ApostaDao = new ApostaDao();
        $resultado = $ApostaDao->ListarPorIdPartidaPublicadaApostador( $id_partida_publicada, $id_apostador);
        return $response->withJson( $resultado );
    }
}