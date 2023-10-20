<?php

class PublicadorDao implements Crud {
    
    function Cadastrar($publicador){
        $con = GetConexao();
        $sql = "insert into publicador (nome_publicador, sobrenome_publicador, email_publicador, senha_publicador, nascimento_publicador, genero_publicador, n_bi_publicador) values (?,?,?,?,?,?,?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $publicador->GetNome());
        $stmt->bindValue( 2, $publicador->GetSobrenome());
        $stmt->bindValue( 3, $publicador->GetEmail());
        $stmt->bindValue( 4, $publicador->GetSenha());
        $stmt->bindValue( 5, $publicador->GetNascimento());
        $stmt->bindValue( 6, $publicador->GetGenero());
        $stmt->bindValue( 7, $publicador->GetN_bi());
        return $stmt->execute();
    }

    function Actualizar($publicador){
        $con = GetConexao();
        $sql = "update publicador set nome_publicador = ?, sobrenome_publicador = ?, email_publicador = ?, senha_publicador = ?, nascimento_publicador = ?, genero_publicador = ?, n_bi_publicador = ? where id_publicador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $publicador->GetNome());
        $stmt->bindValue( 2, $publicador->GetSobrenome());
        $stmt->bindValue( 3, $publicador->GetEmail());
        $stmt->bindValue( 4, $publicador->GetSenha());
        $stmt->bindValue( 5, $publicador->GetNascimento());
        $stmt->bindValue( 6, $publicador->GetGenero());
        $stmt->bindValue( 7, $publicador->GetN_bi());
        $stmt->bindValue( 8, $publicador->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from publicador where id_publicador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select * from publicador;";
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from publicador where id_publicador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

}
