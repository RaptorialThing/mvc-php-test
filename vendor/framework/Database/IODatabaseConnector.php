<?php

namespace Psr\Database;
use Psr\Database\IOModel;

interface IODatabaseConnector {
    public function create(IOModel $model);
}
