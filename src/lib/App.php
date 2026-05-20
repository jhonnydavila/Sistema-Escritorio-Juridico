<?php
class App {
    public static function basePath(): string {
        $dir = dirname($_SERVER['SCRIPT_NAME']);
        // if running from /.../src, strip the /src segment
        if (substr($dir, -4) === '/src') {
            $dir = substr($dir, 0, -4);
        }
        if ($dir === '/' || $dir === '\\') {
            return '';
        }
        return $dir;
    }

    public static function redirect(string $pagina): void {
        $base = self::basePath();
        $url = ($base === '' ? '' : $base) . '/index.php?pagina=' . $pagina;
        header('Location: ' . $url);
        exit;
    }
}

?>