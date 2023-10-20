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

    }

    function Eliminar($id){

    }

    function Listar(){

    }

}
