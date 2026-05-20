<?php
require_once __DIR__ . '/App.php';
require_once __DIR__ . '/Session.php';
require_once __DIR__ . '/SessionStorage.php';

class Auth {
    public static function isAuthenticated(): bool {
        Session::start();
        if (Session::has('user')) return true;
        $id = Session::id();
        if (empty($id)) return false;
        $data = SessionStorage::read($id);
        if (!empty($data['user'])) {
            Session::set('user', $data['user']);
            return true;
        }
        return false;
    }

    public static function requireAuth(array $publicPages = []): void {
        $pagina = $_GET['pagina'] ?? 'home';
        if (!in_array($pagina, $publicPages, true) && !self::isAuthenticated()) {
            App::redirect('login');
        }
    }
}

?>