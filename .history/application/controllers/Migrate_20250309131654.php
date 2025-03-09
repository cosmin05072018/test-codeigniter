<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {
    private $db;
    private $dbforge;
    private $migration;

    public function __construct() {
        parent::__construct();

        // Încarcă baza de date și biblioteca de migrare
        $this->load->database();
        $this->load->dbforge();
        $this->load->library('migration');

        // Inițializează proprietățile pentru PHP 8.2+
        $this->db = $this->db;
        $this->dbforge = $this->dbforge;
        $this->migration = $this->migration;
    }

    public function index() {
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migrarea a fost rulată cu succes!";
        }
    }
}
