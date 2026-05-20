<?php
class Session {
    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) {
            // ensure a writable session save path inside the project to avoid host defaults
            $defaultSavePath = ini_get('session.save_path');
            if (empty($defaultSavePath) || !is_writable($defaultSavePath)) {
                $projectPath = dirname(__DIR__, 1); // src/
                $custom = $projectPath . '/tmp/sessions';
                if (!is_dir($custom)) {
                    mkdir($custom, 0700, true);
                }
                if (is_dir($custom) && is_writable($custom)) {
                    ini_set('session.save_path', $custom);
                }
            }
            // sensible defaults for local dev
            session_set_cookie_params([
                'lifetime' => 0,
                'path' => '/',
                'domain' => '',
                'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
            ini_set('session.use_strict_mode', '1');
            ini_set('session.cookie_httponly', '1');
            ini_set('session.use_cookies', '1');
            session_start();
        }
    }

    public static function get(string $key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public static function set(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    public static function has(string $key): bool {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function flash(string $key, $value = null) {
        if ($value === null) {
            if (isset($_SESSION[$key])) {
                $val = $_SESSION[$key];
                unset($_SESSION[$key]);
                return $val;
            }
            return null;
        }
        $_SESSION[$key] = $value;
    }

    public static function regenerate(): void {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function writeClose(): void {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_write_close();
        }
    }

    public static function destroy(): void {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            if (ini_get('session.use_cookies')) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params['path'] ?? '/', $params['domain'] ?? '', $params['secure'] ?? false, $params['httponly'] ?? true);
            }
            session_destroy();
        }
    }

    public static function id(): string {
        return session_id();
    }

    public static function cookieParams(): array {
        return session_get_cookie_params();
    }
}

?>