<?php
require_once __DIR__ . "/../helpers/database-wrapper.php";

    class ListModel {
        public function getAll() {
            $sql = "SELECT * FROM todo";
            $response = DB::run($sql)->fetch_all(MYSQLI_ASSOC);
            
            return $response;
        }
        public function deleteById($id) {
            $sql = "DELETE FROM todo WHERE id=$id";
            DB::run($sql);
        }
        public function getById($id) {
            $sql = "SELECT * FROM todo WHERE id=$id";
            $response = DB::run($sql);

            if ($response->num_rows === 0) {
                return [];
            } else {
                return $response->fetch_assoc();
            }
        }
        public function updateByNickname($nickname, $name) {
            $sql = "UPDATE todo SET name = 'name' WHERE nickname=$nickname";
            DB::run($sql);
        }
        public function insertNew($name) {
            $sql = "INSERT INTO todo (name) VALUES ('name')";
            DB::run($sql);
        }
    }
?>