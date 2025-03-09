<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder_cli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Verifică dacă cererea provine din CLI
        if ( ! is_cli() ) {
            exit('This method can only be run from the CLI.');
        }

        $this->load->model('User_model'); // Sau orice alt model ai nevoie
    }

    // Metoda care rulează seeder-ul
    public function run($seeder_name)
    {
        // Calea către fișierul seeder
        $seeder_file = APPPATH . 'seeders/' . $seeder_name . '.php';

        // Verifică dacă fișierul seeder există
        if (file_exists($seeder_file)) {
            include_once($seeder_file); // Include fișierul seeder
            $seeder_class = ucfirst($seeder_name); // Creează numele clasei seeder
            $seeder = new $seeder_class(); // Instanțiază clasa seeder
            $seeder->run(); // Rulează metoda 'run' din seeder
        } else {
            echo 'Seeder file not found!' . PHP_EOL;
        }
    }
}
