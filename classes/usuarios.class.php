<?php
class Usuarios {


	public function getTotalUsuarios(){
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) AS totalUsuarios FROM usuarios");
		$row = $sql->fetch();

		return $row['totalUsuarios'];
	}



	public function cadastrar($nome, $email, $senha, $telefone) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

	public function login($email, $senha) {
		global $pdo;

		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;
		} else {
			return false;
		}

	}

public static function User($id) {
        global $pdo;
        
		$sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dd = $sql->fetch();

				return $dd['nome'];
		}
	}






}
?>