<?php
namespace Application\Model;

class Clientes {

    private $id;
    private $nome;
    private $endereco;
    private $numero;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function exchangeArray(Array $data){
        $this->setId((isset($data['id']))?$data['id']:0);
        $this->setNome($data['nome']);
        $this->setEndereco($data['endereco']);
        $this->setNumero($data['numero']);
    }

    public function getArrayCopy(){
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'endereco' => $this->getEndereco(),
            'numero' => $this->getNumero()
        ];
    }


} 