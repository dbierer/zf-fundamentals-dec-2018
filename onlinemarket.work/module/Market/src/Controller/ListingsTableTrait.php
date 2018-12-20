<?php
namespace Market\Controller;

use Zend\Db\TableGateway\TableGateway;

trait ListingsTableTrait
{
    protected $listingsTable;
    public function setListingsTable(TableGateway $table)
    {
        $this->listingsTable = $table;
    }
}
