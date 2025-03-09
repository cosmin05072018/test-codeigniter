<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder_cli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Verifică dacă suntem pe CLI
        if ( ! $this->input->is_cli_request()) {
            exit('This method can only be run from the CLI.');
        }

        // Încarcă modelul necesar sau resursele pentru seeding
        $this->load->model('User_model');
    }

    public function run($seeder_name)
    {
        // Verifică dacă fișierul există în folderul seeders
        $seeder_file = APPPATH . 'seeders/' . $seeder_name . '.php';

        if (file_exists($seeder_file)) {
            // Include fișierul de seed
            include_once($seeder_file);
            $seeder_class = ucfirst($seeder_name); // Clasa trebuie să fie cu majusculă
            $seeder = new $seeder_class();
            $seeder->run();
        } else {
            echo 'Seeder file not found!' . PHP_EOL;
        }
    }
}
