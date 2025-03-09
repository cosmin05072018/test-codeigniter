<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder_cli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();


        if ( ! $this->input->is_cli_request()) {
            exit('This method can only be run from the CLI.');
        }


        $this->load->model('User_model');
    }

    public function run($seeder_name)
    {

        $seeder_file = APPPATH . 'seeders/' . $seeder_name . '.php';

        if (file_exists($seeder_file)) {
            include_once($seeder_file);
            $seeder_class = ucfirst($seeder_name);
            $seeder = new $seeder_class();
            $seeder->run();
        } else {
            echo 'Seeder file not found!' . PHP_EOL;
        }
    }
}
