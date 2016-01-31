<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ClientesTable implements ClientesImplement {

    private $tableGateway;

    public function __construct(tableGateway $tableGateway){
        $this->tableGateway =   $tableGateway;
    }

    public function findAll(){
        return $this->tableGateway->select();
    }

    public function find($id){
        $rtn = $this->tableGateway->select(['id'=>$id]);
        return $rtn->current();
    }

    public function update(Clientes $clientes){
        if($this->find($clientes->getId())){
            $this->tableGateway->update($clientes->getArrayCopy(),['id'=>$clientes->getId()]);
        }
    }

    public function delete($id){
        $this->tableGateway->delete(['id'=>$id]);
    }

    public function insert(Clientes $clientes){
        return $this->tableGateway->insert($clientes->getArrayCopy());
    }

} 