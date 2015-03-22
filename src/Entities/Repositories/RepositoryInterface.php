<?php

namespace Entities\Repositories;

interface RepositoryInterface {
    public function findAll();
    public function find(array $conditions);
}