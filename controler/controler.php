<?php
	include('../../model/model.php');

	class Controler
	{
		private $unModel;

		public function __construct($server, $datebase, $user, $password)
		{
			$this->unModel = new Model($server, $datebase, $user, $password);
		}

		public function setTable($uneTable)
		{
			$this->unModel->setTable($uneTable);
		}

		public function selectCountFriend($where)
		{
			return $this->unModel->selectCountFriend($where);
		}

		public function searchProfil($name)
		{
			return $this->unModel->searchProfil($name);
		}

		public function displayProfil($name)
		{
			return $this->unModel->displayProfil($name);
		}

		public function displayPost($name)
		{
			return $this->unModel->displayPost($name);
		}

		public function displayMessage($idUser, $idFriend)
		{
			return $this->unModel->displayMessage($idUser, $idFriend);
		}

		public function selectFriend($idUser)
		{
			return $this->unModel->selectFriend($idUser);
		}

		public function selectAll()
		{
			return $this->unModel->selectAll();
		}

		public function insert($table)
		{
			$this->unModel->insert($table);
		}

		public function delete($table)
		{
			$this->unModel->delete($table);
		}

		public function update($tab, $where) 
		{
			$this->unModel->update($tab, $where);
		}

		public function login($champ, $where, $operator)
		{
			return $this->unModel->login($champ, $where, $operator);
		}

		public function createFolderUser($nameFolder)
		{
			$this->unModel->createFolderUser($nameFolder);
		}
	}
?>