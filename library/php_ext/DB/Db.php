<?php
namespace DB;
interface database{
    public function connect();
    public function fetchOne($sql);
    public function fetchRows($sql);
    public function query($sql);
}
