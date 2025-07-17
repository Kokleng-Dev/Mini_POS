<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';

include_once __DIR__ . '/../../core/Database.php';
include_once __DIR__ . '/../../db/migration.php';

use Core\Database;
use Core\BaseController;
use DB\Migration;

class MigrationController extends BaseController
{
    private $db;
    private $migration;
    public function __construct()
    {
      $this->db = Database::getInstance()->getConnection();
      $this->migration = new Migration();
    }
    public function migrate()
    {
      try{
        $this->migration->up($this->db);
        echo "Migration Success";
      } catch (Exception $e) {
        echo "Migration Failed : " . $e->getMessage();
      }
    }

    public function rollback()
     {
      try{
        $this->migration->down($this->db);
        echo "Drop all tables successfully";
      } catch (Exception $e) {
        echo "Migration Failed : " . $e->getMessage();
      }
    }


}


