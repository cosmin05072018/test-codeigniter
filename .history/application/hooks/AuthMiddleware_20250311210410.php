class AuthMiddleware
{
    public function handle()
    {
        // Verificăm dacă utilizatorul este autentificat
        $CI = &get_instance(); // Instanțiem obiectul CI
        $user_data = $CI->session->userdata('logged_in');

        if (!$user_data) {
            // Dacă nu este autentificat, redirecționăm la login
            redirect('login');
        }
    }
}
