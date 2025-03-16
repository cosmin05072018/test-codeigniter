<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Permite rularea doar din CLI
        if (!is_cli()) {
            echo "This script can only be run from the command line.";
            exit;
        }

        // Încarcă biblioteca de migrare
        $this->load->library('migration');
    }

    public function index() {
        $result = $this->migration->latest();

        if ($result === FALSE) {
            echo "Migration failed: " . $this->migration->error_string();
        } else {
            echo "Migrations ran successfully!";
        }
    }
}
