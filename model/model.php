<?php
	class Model
	{
		private $pdo, $table;

		public function __construct($server, $database, $user, $password)
		{
			try
			{
				$this->pdo = new PDO("mysql:host=" .$server. ";dbname=" .$database, $user, $password);
			}
			catch(PDOException $exp)
			{
				echo "Error connecting to database : " .$server. "/" .$database;
				$this->pdo = null;
			}
		}

		public function setTable($uneTable)
		{
			$this->table = $uneTable;
		}

		public function selectCountFriend($where)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$request = "select count(*) from ".$this->table." where idUser = ".$where.";";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchColumn();
				return $resultats;
			}
		}

		public function searchProfil($name)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$request = "select *from ".$this->table." where firstname = '".$name."';";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchAll();
				return $resultats;
			}	
		}

		public function displayProfil($name)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$request = "select *from ".$this->table." where idUser = '".$name."';";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchAll();
				return $resultats;
			}	
		}

		public function displayPost($name)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$request = "select *from ".$this->table." where idUser = '".$name."' order by datePost desc;";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchAll();
				return $resultats;
			}	
		}

		public function displayMessage($idUser, $idFriend)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$request = "select iduser, idfriend, message, datemessage, timemessage from message where iduser in ('".$idUser."', '".$idFriend."') and idfriend in ('".$idFriend."', '".$idUser."');";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchAll();
				//var_dump($resultats);
				return $resultats;
			}
		}
	
		public function selectFriend($idUser)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				//$request = "select idFriend from friend where idUser = '".$idUser."';";
				$request = "select idUser, lastName, firstName, folder, imgUser from user where idUser in (select idFriend from friend where idUser = '".$idUser."');";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchAll();
				return $resultats;
			}	
		}

		public function selectAll()
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$request = "select *from ".$this->table.";";
				$select = $this->pdo->prepare($request);
				$select->execute();
				$resultats = $select->fetchAll();
				return $resultats;
			}
		}

		public function insert($table)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$data = array();
				$champs = array();

				foreach($table as $cle => $valeur) 
				{
					$champs[] = ":" .$cle;
					$data[":" .$cle] = $valeur;
				}

				$chaineChamps = implode(",", $champs);
				$request = "insert into " .$this->table. " values (null, " .$chaineChamps. ");";
				$insert = $this->pdo->prepare($request);
				$insert->execute($data);
				//echo $request;
				//var_dump($data);
			}
		}

		public function delete($table)
		{
			if($this->pdo == null)
			{
				return null;
			}
			else
			{
				$data = array();
				$champs = array();

				foreach($table as $cle => $valeur) 
				{
					$champs[] = ":" .$cle;
					$data[":" .$cle] = $valeur;
				}

				$chaineWhere = implode("and", $champs);
				$request = "delete from " .$this->table. " where idCompte = " .$chaineWhere. ";";
				$delete = $this->pdo->prepare($request);
				$delete->execute($data);
				echo $request;
				var_dump($data);
			}
		}

		public function update($tab, $where)
		{
			$data = array();
			$champs = array();
			//Traitement des attributs à updater
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle.'= :'.$cle;
				$data[':'.$cle] = $valeur;
			}
			$chaineChamps = implode(",", $champs);

			//Traitement du where
			$chaineWhere = array();
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle.'= :'.$cle;
				$data[':'.$cle] = $valeur;
			}
			$champsWhere = implode(",", $where);

			//Traitement du requete
			$requete = "update ".$this->table." set ".$chaineChamps." where idUser = ".$champsWhere.";";
			$update = $this->pdo->prepare($requete);
			$update->execute($data);
		}

		public function login($champs, $where, $operateur)
		{
			if ($this->pdo == null) 
			{
				return null;
			} 
			else 
			{
				$chaineChamps = implode(",", $champs);
				$tab = array();
				$data = array();
				foreach ($where as $cle=>$valeur) 
				{
					$tab[] = $cle. "= :" .$cle;
					$data[":" .$cle] = $valeur;
				}
		
				$chaineWhere = implode(" " .$operateur. " ", $tab);
				$request = "select count(*) as number, " .$chaineChamps. " from " .$this->table. " where " .$chaineWhere. ";";
				// echo $request;
				// var_dump($data);
				$select = $this->pdo->prepare($request);
				$select->execute($data);
				$resultats = $select->fetchall();		// fetchAll donne tous les résultats, tous les clients par ex
				return $resultats[0];
			}
		}

		public function createFolderUser($nameFolder)
		{
			// Structure de répertoire désirée
			$structure = '../../public/folder/'.$nameFolder;

			// Pour créer une stucture imbriquée, le paramètre $recursive 
			// doit être spécifié.

			if (!mkdir($structure, 0777, true)) 
			{
			    ?> <div class="alert-msg"> <?php echo "Error creating folder user !"; ?> </div> <?php
			}
		}
	}
?>