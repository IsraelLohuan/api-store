<?php

namespace Application\Database;

class Query
{
    private $conn;

    public function __construct($conexao) 
    {
		$this->conn = $conexao;
    }

    private function setParams($statement, $parameters = array())
	{
        foreach($parameters as $key => $value) 
        {
			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}

	public function executeQuery($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$result = $stmt->execute();

		if($result == 0)
		{
			throw new \Exception("Falha ao salvar registro!");
		}
	}

	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);
		
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
