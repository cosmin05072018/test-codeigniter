<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {
    private $db;
    private $dbforge;
    private $migration;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->dbforge();
        $this->load->library('migration');

        // Setează proprietățile explicit pentru a evita eroarea
        $this->db = $this->load->database('default', TRUE);
        $this->dbforge = $this->load->dbforge();
        $this->migration = $this->load->library('migration');
    }

    public function index() {
        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migrations ran successfully!";
        }
    }
}
