<?php
require_once 'config.php';

class DataClass {
    protected $PDO;
    function __construct() {
        $this->PDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, );
    }

    function endSept2010() {
        $rows = $this->PDO->prepare('SELECT brand.name as Марка, model.name as Модель, model.end_date as \'Дата снятия с производства\' FROM model left join brand on model.`brand_id` = brand.id WHERE end_date < \'2010-09-01\'');
        if ($rows->execute()) {
            return $rows->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    function stillProcessedNWork1000() {
        $rows = $this->PDO->prepare('SELECT brand.name as Марка, model.name as Модель, work.name as \'Наименование работ\', work.cost as \'Стоимость работ\' FROM model left join brand on model.`brand_id` = brand.id right join work on model.id = work.model_id WHERE model.end_date > CURDATE() and work.cost>1000');
        if ($rows->execute()) {
            return $rows->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
}


