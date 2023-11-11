<?php

namespace App\Dao;
use App\Interfac\Crud;

class AdministradorDao implements Crud {
    
    function Cadastrar($administrador){
        $con = GetConexao();
        $sql = "insert into administrador (nome_administrador, sobrenome_administrador, email_administrador, senha_administrador, nascimento_administrador, genero_administrador, n_bi_administrador) values (?, ?, ?, md5(?), ?, ?, ?);";
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
        $sql = "update administrador set nome_administrador = ?, sobrenome_administrador = ?, email_administrador = ?, nascimento_administrador = ?, genero_administrador = ?, n_bi_administrador = ? where id_administrador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $administrador->GetNome());
        $stmt->bindValue( 2, $administrador->GetSobrenome());
        $stmt->bindValue( 3, $administrador->GetEmail());
        $stmt->bindValue( 4, $administrador->GetNascimento());
        $stmt->bindValue( 5, $administrador->GetGenero());
        $stmt->bindValue( 6, $administrador->GetN_bi());
        $stmt->bindValue( 7, $administrador->GetId());
        return $stmt->execute();
    }

    function AlterarSenha($id_administrador, $senha_nova){
        $con = GetConexao();
        $sql = "update administrador set senha_administrador = md5(?) where id_administrador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $senha_nova);
        $stmt->bindValue( 2, $id_administrador);
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
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from administrador where id_administrador = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorEmail($email){
        $con = GetConexao();
        $sql = "select * from administrador where email_administrador = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorBISenha($n_bi, $senha){
        $con = GetConexao();
        $sql = "select * from administrador where n_bi_administrador = ? and senha_administrador = md5(?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $n_bi);
        $stmt->bindValue( 2, $senha);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorIDSenha($id_administrador, $senha){
        $con = GetConexao();
        $sql = "select * from administrador where id_administrador = ? and senha_administrador = md5(?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id_administrador);
        $stmt->bindValue( 2, $senha);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorBI($n_bi){
        $con = GetConexao();
        $sql = "select * from administrador where n_bi_administrador = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $n_bi);
        $stmt->execute();
        return $stmt->fetch();
    }    
}
