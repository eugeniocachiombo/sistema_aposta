<?php

class AdministradorDao implements Crud {
    
    function Cadastrar($administrador){
        $con = GetConexao();
        $sql = "insert into administrador (nome_administrador, sobrenome_administrador, email_administrador, senha_administrador, nascimento_administrador, genero_administrador, n_bi_administrador) values (?,?,?,?,?,?,?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $administrador->GetNome());
        $stmt->bindValue( 2, $administrador->GetSobrenome());
        $stmt->bindValue( 3, $administrador->GetEmail());
        $stmt->bindValue( 4, $administrador->GetSenha());
        $stmt->bindValue( 5, $administrador->GetNascimento());
        $stmt->bindValue( 6, $administrador->GetGenero());
        $stmt->bindValue( 7, $administrador->GetN_bi());
        return $stmt->execute();
    }

    function Actualizar($administrador){
        $con = GetConexao();
        $sql = "update administrador set nome_administrador = ?, sobrenome_administrador = ?, email_administrador = ?, senha_administrador = ?, nascimento_administrador = ?, genero_administrador = ?, n_bi_administrador = ? where id_administrador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $administrador->GetNome());
        $stmt->bindValue( 2, $administrador->GetSobrenome());
        $stmt->bindValue( 3, $administrador->GetEmail());
        $stmt->bindValue( 4, $administrador->GetSenha());
        $stmt->bindValue( 5, $administrador->GetNascimento());
        $stmt->bindValue( 6, $administrador->GetGenero());
        $stmt->bindValue( 7, $administrador->GetN_bi());
        $stmt->bindValue( 8, $administrador->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from administrador where id_administrador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select * from administrador;";
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from administrador where id_administrador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

}
