<?php

namespace Application\Model;


interface ClientesImplement {

    public function findAll();
    public function find($id);
    public function update(Clientes $clientes);
    public function delete($id);
    public function insert(Clientes $clientes);

} 