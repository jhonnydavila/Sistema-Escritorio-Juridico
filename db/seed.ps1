Set-StrictMode -Version Latest

$BaseDir = Split-Path -Parent $MyInvocation.MyCommand.Definition
$ConfigFile = Join-Path $BaseDir '..\src\config\config.php'
$SeedFile = Join-Path $BaseDir 'seed.sql'

if (-not (Test-Path $ConfigFile)) {
    Write-Error "ERROR: No se encontró el config en $ConfigFile"
    exit 1
}

if (-not (Test-Path $SeedFile)) {
    Write-Error "ERROR: No se encontró el seed en $SeedFile"
    exit 1
}

$php = Get-Command php -ErrorAction SilentlyContinue
$mysql = Get-Command mysql -ErrorAction SilentlyContinue

if (-not $php -and Test-Path 'C:\xampp\php\php.exe') {
    $php = Get-Command 'C:\xampp\php\php.exe' -ErrorAction SilentlyContinue
}
if (-not $php -and Test-Path 'C:\Program Files\xampp\php\php.exe') {
    $php = Get-Command 'C:\Program Files\xampp\php\php.exe' -ErrorAction SilentlyContinue
}
if (-not $php -and Test-Path 'C:\Applications\XAMPP\xamppfiles\bin\php.exe') {
    $php = Get-Command 'C:\Applications\XAMPP\xamppfiles\bin\php.exe' -ErrorAction SilentlyContinue
}
if (-not $php -and Test-Path '/Applications/XAMPP/xamppfiles/bin/php') {
    $php = Get-Command '/Applications/XAMPP/xamppfiles/bin/php' -ErrorAction SilentlyContinue
}

if (-not $php) {
    Write-Error "ERROR: PHP no está instalado o no se encontró en el PATH. Instala PHP o ajusta el PATH a tu binario de XAMPP."
    exit 1
}

if (-not $mysql -and Test-Path 'C:\xampp\mysql\bin\mysql.exe') {
    $mysql = Get-Command 'C:\xampp\mysql\bin\mysql.exe' -ErrorAction SilentlyContinue
}
if (-not $mysql -and Test-Path 'C:\Program Files\xampp\mysql\bin\mysql.exe') {
    $mysql = Get-Command 'C:\Program Files\xampp\mysql\bin\mysql.exe' -ErrorAction SilentlyContinue
}
if (-not $mysql -and Test-Path 'C:\Applications\XAMPP\xamppfiles\bin\mysql.exe') {
    $mysql = Get-Command 'C:\Applications\XAMPP\xamppfiles\bin\mysql.exe' -ErrorAction SilentlyContinue
}
if (-not $mysql -and Test-Path '/Applications/XAMPP/xamppfiles/bin/mysql') {
    $mysql = Get-Command '/Applications/XAMPP/xamppfiles/bin/mysql' -ErrorAction SilentlyContinue
}

if (-not $mysql) {
    Write-Error "ERROR: MySQL client no está instalado o no se encontró en el PATH. Instala el cliente MySQL o ajusta el PATH a tu binario de XAMPP."
    exit 1
}

$values = & $php.Source -r "require_once '$ConfigFile'; echo _DB_NAME_ . PHP_EOL . _DB_HOST_ . PHP_EOL . _DB_USER_ . PHP_EOL . _DB_PASS_ . PHP_EOL;"
$lines = $values -split "`n" | ForEach-Object { $_.Trim() }

if ($lines.Count -lt 4) {
    Write-Error "ERROR: No se pudieron leer las constantes del config"
    exit 1
}

$DB_NAME = $lines[0]
$DB_HOST = $lines[1]
$DB_USER = $lines[2]
$DB_PASS = $lines[3]

$mysqlArgs = @('-h', $DB_HOST, '-u', $DB_USER, '--show-warnings')
if ($DB_PASS -ne '') {
    $mysqlArgs += "--password=$DB_PASS"
}

Write-Host "Importando seed en la base de datos '$DB_NAME'..."
Write-Host "  Host: $DB_HOST"
Write-Host "  Usuario: $DB_USER"
Write-Host "  Archivo: $SeedFile"
$output = & $mysql.Source $mysqlArgs $DB_NAME < $SeedFile 2>&1
$status = $LASTEXITCODE
if ($output) {
    $output | ForEach-Object { Write-Host $_ }
}
$hasError = $false
if ($output -match 'Error \(Code|ERROR|Failed|fatal') {
    $hasError = $true
}
if ($status -ne 0 -or $hasError) {
    Write-Error "ERROR: La importación produjo errores. Revise la salida anterior."
    exit 1
}

Write-Host "Seed importado correctamente."
Write-Host "Verificando importación en tablas claves..."
& $mysql.Source $mysqlArgs $DB_NAME -e "SELECT 'tbl_roles' AS tabla, COUNT(*) AS registros FROM tbl_roles UNION ALL SELECT 'tbl_usuarios', COUNT(*) FROM tbl_usuarios UNION ALL SELECT 'tbl_abogados', COUNT(*) FROM tbl_abogados UNION ALL SELECT 'tbl_clientes', COUNT(*) FROM tbl_clientes UNION ALL SELECT 'tbl_casos', COUNT(*) FROM tbl_casos;"
