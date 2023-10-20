<?php

class ApostadorDao implements Crud {
    
    function Cadastrar($apostador){
        $con = GetConexao();
        $sql = "insert into apostador (nome_apostador, sobrenome_apostador, email_apostador, senha_apostador, nascimento_apostador, genero_apostador, n_bi_apostador) values (?,?,?,?,?,?,?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $apostador->GetNome());
        $stmt->bindValue( 2, $apostador->GetSobrenome());
        $stmt->bindValue( 3, $apostador->GetEmail());
        $stmt->bindValue( 4, $apostador->GetSenha());
        $stmt->bindValue( 5, $apostador->GetNascimento());
        $stmt->bindValue( 6, $apostador->GetGenero());
        $stmt->bindValue( 7, $apostador->GetN_bi());
        return $stmt->execute();
    }

    function Actualizar($apostador){
        $con = GetConexao();
        $sql = "update apostador set nome_apostador = ?, sobrenome_apostador = ?, email_apostador = ?, senha_apostador = ?, nascimento_apostador = ?, genero_apostador = ?, n_bi_apostador = ? where id_apostador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $apostador->GetNome());
        $stmt->bindValue( 2, $apostador->GetSobrenome());
        $stmt->bindValue( 3, $apostador->GetEmail());
        $stmt->bindValue( 4, $apostador->GetSenha());
        $stmt->bindValue( 5, $apostador->GetNascimento());
        $stmt->bindValue( 6, $apostador->GetGenero());
        $stmt->bindValue( 7, $apostador->GetN_bi());
        $stmt->bindValue( 8, $apostador->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from apostador where id_apostador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select * from apostador;";
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from apostador where id_apostador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

}
