<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Permite rularea DOAR din CLI (terminal), nu din browser
        if (!is_cli()) {
            echo "This script can only be run from the command line.";
            exit;
        }
        $this->load->library('migration');
    }

    public function index() {
        if ($this->migration->latest()) {
            echo "Migrations ran successfully!";
        } else {
            echo $this->migration->error_string();
        }
    }
}
