<?php
class SessionStorage {
    public static function storageDir(): string {
        $primary = dirname(__DIR__) . '/tmp/session_storage';
        $alt = dirname(__DIR__) . '/tmp/sessions';
        $projectRoot = dirname(__DIR__, 1);
        $fallback = $projectRoot . '/tmp';

        foreach ([$primary, $alt, $fallback] as $dir) {
            if (is_dir($dir)) {
                if (is_writable($dir)) return $dir;
            } else {
                // try to create, suppress warnings and check
                @mkdir($dir, 0700, true);
                if (is_dir($dir) && is_writable($dir)) return $dir;
            }
        }
        // as last resort use sys_get_temp_dir()
        return sys_get_temp_dir();
    }

    public static function fileFor(string $sessionId): string {
        return rtrim(self::storageDir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'sess_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $sessionId) . '.json';
    }

    public static function write(string $sessionId, array $data): bool {
        $file = self::fileFor($sessionId);
        return (bool) file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function read(string $sessionId): array {
        $file = self::fileFor($sessionId);
        if (!is_file($file)) return [];
        $content = file_get_contents($file);
        return json_decode($content, true) ?: [];
    }

    public static function delete(string $sessionId): void {
        $file = self::fileFor($sessionId);
        if (is_file($file)) unlink($file);
    }
}

?>