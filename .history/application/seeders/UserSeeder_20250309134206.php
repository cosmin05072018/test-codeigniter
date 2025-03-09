<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSeeder {

    public function run()
    {
        // Obține instanța de CodeIgniter
        $CI =& get_instance();
        $CI->load->model('User_model');  // Încarcă modelul User_model

        // Date pentru un utilizator
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),  // Asigură-te că salvezi parola criptată
            'created_at' => date('Y-m-d H:i:s'),  // Timpul curent
            'updated_at' => date('Y-m-d H:i:s')   // Timpul curent
        ];

        // Inserează utilizatorul în baza de date
        if ($CI->User_model->insert($data)) {
            echo "User seeded successfully!" . PHP_EOL;
        } else {
            echo "Failed to seed user!" . PHP_EOL;
        }
    }
}
