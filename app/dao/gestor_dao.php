<?php

class GestorDao implements Crud {
    
    function Cadastrar($gestor){
        $con = GetConexao();
        $sql = "insert into gestor (nome_gestor, sobrenome_gestor, email_gestor, senha_gestor, nascimento_gestor, genero_gestor, n_bi_gestor) values (?,?,?,?,?,?,?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $gestor->GetNome());
        $stmt->bindValue( 2, $gestor->GetSobrenome());
        $stmt->bindValue( 3, $gestor->GetEmail());
        $stmt->bindValue( 4, $gestor->GetSenha());
        $stmt->bindValue( 5, $gestor->GetNascimento());
        $stmt->bindValue( 6, $gestor->GetGenero());
        $stmt->bindValue( 7, $gestor->GetN_bi());
        return $stmt->execute();
    }

    function Actualizar($gestor){
        $con = GetConexao();
        $sql = "update gestor set nome_gestor = ?, sobrenome_gestor = ?, email_gestor = ?, senha_gestor = ?, nascimento_gestor = ?, genero_gestor = ?, n_bi_gestor = ? where id_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $gestor->GetNome());
        $stmt->bindValue( 2, $gestor->GetSobrenome());
        $stmt->bindValue( 3, $gestor->GetEmail());
        $stmt->bindValue( 4, $gestor->GetSenha());
        $stmt->bindValue( 5, $gestor->GetNascimento());
        $stmt->bindValue( 6, $gestor->GetGenero());
        $stmt->bindValue( 7, $gestor->GetN_bi());
        $stmt->bindValue( 8, $gestor->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from gestor where id_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select * from gestor;";
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from gestor where id_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

}
