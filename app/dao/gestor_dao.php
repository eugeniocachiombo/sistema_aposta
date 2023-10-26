<?php

class GestorDao implements Crud {
    
    function Cadastrar($gestor){
        $con = GetConexao();
        $sql = "insert into gestor (nome_gestor, sobrenome_gestor, email_gestor, senha_gestor, nascimento_gestor, genero_gestor, n_bi_gestor) values (?, ?, ?, md5(?), ?, ?, ?);";
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
        $sql = "update gestor set nome_gestor = ?, sobrenome_gestor = ?, email_gestor = ?, nascimento_gestor = ?, genero_gestor = ?, n_bi_gestor = ? where id_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $gestor->GetNome());
        $stmt->bindValue( 2, $gestor->GetSobrenome());
        $stmt->bindValue( 3, $gestor->GetEmail());
        $stmt->bindValue( 4, $gestor->GetNascimento());
        $stmt->bindValue( 5, $gestor->GetGenero());
        $stmt->bindValue( 6, $gestor->GetN_bi());
        $stmt->bindValue( 7, $gestor->GetId());
        return $stmt->execute();
    }

    function AlterarSenha($id_gestor, $senha_nova){
        $con = GetConexao();
        $sql = "update gestor set senha_gestor = md5(?) where id_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $senha_nova);
        $stmt->bindValue( 2, $id_gestor);
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
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from gestor where id_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorEmail($email){
        $con = GetConexao();
        $sql = "select * from gestor where email_gestor = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorBISenha($n_bi, $senha){
        $con = GetConexao();
        $sql = "select * from gestor where n_bi_gestor = ? and senha_gestor = md5(?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $n_bi);
        $stmt->bindValue( 2, $senha);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorIDSenha($id_gestor, $senha){
        $con = GetConexao();
        $sql = "select * from gestor where id_gestor = ? and senha_gestor = md5(?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id_gestor);
        $stmt->bindValue( 2, $senha);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorBI($n_bi){
        $con = GetConexao();
        $sql = "select * from gestor where n_bi_gestor = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $n_bi);
        $stmt->execute();
        return $stmt->fetch();
    }
    

}
