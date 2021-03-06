<?php namespace Attendance\Database;

/**
 */
class AttendanceTable extends AbstractTable {

  protected static $instance;

  private function __construct() {
    $this->table_name = 'attendance';
  }

  public function create() {
    $sql = "CREATE TABLE IF NOT EXISTS `" . $this->getTableName() . "` (
           `id` INT NOT NULL AUTO_INCREMENT ,
           `reg_no` VARCHAR(10) NOT NULL ,
           `subject` VARCHAR(30) NOT NULL ,
           `taken_by` VARCHAR(50) NOT NULL ,
           `taken_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
           `remarks` text NOT NULL ,
           PRIMARY KEY (`id`))";
    return $this->execute($sql);
  }

  public static function getInstance() {
    if (self::$instance == null) {
      self::$instance = new self;
    }
    return self::$instance;
  }

}