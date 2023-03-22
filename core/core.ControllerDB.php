<?php

class ControllerDB extends DB
{
    function __construct($db)
    {
        $this->db = $db;
    }
    public function insertTable($table, $data)
    {
        $sql = "INSERT INTO $table VALUES ($data)";
        $result = $this->db()->query($sql);
        return $result;
    }
    public function viewTable($table, $where = null, $param = null)
    {
        if ($where == null && $param == null) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT * FROM $table WHERE $where='$param'";
        }
        $result = $this->db()->query($sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function updateTable($table, $data, $id)
    {
        $sql = "UPDATE $table SET $data WHERE id = $id";
        $result = $this->db()->query($sql);
        return $result;
    }
    public function deleteTable($table, $id)
    {
        if ($id == 'all') {
            $sql = "DELETE FROM $table";
        } else {
            $sql = "DELETE FROM $table WHERE id IN ($id)";
        }
        $result = $this->db()->query($sql);
        return $result;
    }
    public function query($sql)
    {
        $result = $this->db()->query($sql);
        return $result;
    }
}
