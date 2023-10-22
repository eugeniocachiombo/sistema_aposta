<?php

class PublicadorDao implements Crud {
    
    function Cadastrar($publicador){
        $con = GetConexao();
        $sql = "insert into publicador (nome_publicador, sobrenome_publicador, email_publicador, senha_publicador, nascimento_publicador, genero_publicador, n_bi_publicador) values (?, ?, ?, md5(?), ?, ?, ?);";
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
        $sql = "update publicador set nome_publicador = ?, sobrenome_publicador = ?, email_publicador = ?, nascimento_publicador = ?, genero_publicador = ?, n_bi_publicador = ? where id_publicador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $publicador->GetNome());
        $stmt->bindValue( 2, $publicador->GetSobrenome());
        $stmt->bindValue( 3, $publicador->GetEmail());
        $stmt->bindValue( 4, $publicador->GetNascimento());
        $stmt->bindValue( 5, $publicador->GetGenero());
        $stmt->bindValue( 6, $publicador->GetN_bi());
        $stmt->bindValue( 7, $publicador->GetId());
        return $stmt->execute();
    }

    function AlterarSenha($id_publicador, $senha_nova){
        $con = GetConexao();
        $sql = "update publicador set senha_publicador = md5(?) where id_publicador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $senha_nova);
        $stmt->bindValue( 2, $id_publicador);
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
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from publicador where id_publicador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorBISenha($n_bi, $senha){
        $con = GetConexao();
        $sql = "select * from publicador where n_bi_publicador = ? and senha_publicador = md5(?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $n_bi);
        $stmt->bindValue( 2, $senha);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorIDSenha($id_publicador, $senha){
        $con = GetConexao();
        $sql = "select * from publicador where id_publicador = ? and senha_publicador = md5(?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id_publicador);
        $stmt->bindValue( 2, $senha);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorBI($n_bi){
        $con = GetConexao();
        $sql = "select * from publicador where n_bi_publicador = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $n_bi);
        $stmt->execute();
        return $stmt->fetch();
    }
    

}
