#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
CONFIG_FILE="$BASE_DIR/../src/config/config.php"
SEED_FILE="$BASE_DIR/seed.sql"

if [[ ! -f "$CONFIG_FILE" ]]; then
  echo "ERROR: No se encontró el config en $CONFIG_FILE"
  exit 1
fi

if [[ ! -f "$SEED_FILE" ]]; then
  echo "ERROR: No se encontró el seed en $SEED_FILE"
  exit 1
fi

PHP_BIN="$(command -v php || true)"
MYSQL_BIN="$(command -v mysql || true)"

if [[ -z "$PHP_BIN" && -x "/Applications/XAMPP/xamppfiles/bin/php" ]]; then
  PHP_BIN="/Applications/XAMPP/xamppfiles/bin/php"
fi
if [[ -z "$MYSQL_BIN" && -x "/Applications/XAMPP/xamppfiles/bin/mysql" ]]; then
  MYSQL_BIN="/Applications/XAMPP/xamppfiles/bin/mysql"
fi

if [[ -z "$PHP_BIN" ]]; then
  echo "ERROR: PHP no está instalado o no se encontró en el PATH. Instala PHP o ajusta el PATH a tu binario de XAMPP."
  exit 1
fi

if [[ -z "$MYSQL_BIN" ]]; then
  echo "ERROR: MySQL client no está instalado o no se encontró en el PATH. Instala el cliente MySQL o ajusta el PATH a tu binario de XAMPP."
  exit 1
fi

CONFIG_OUTPUT="$($PHP_BIN -r 'require_once $argv[1]; echo _DB_NAME_ . "\n" . _DB_HOST_ . "\n" . _DB_USER_ . "\n" . _DB_PASS_ . "\n";' "$CONFIG_FILE")"

DB_NAME="$(printf '%s' "$CONFIG_OUTPUT" | sed -n '1p')"
DB_HOST="$(printf '%s' "$CONFIG_OUTPUT" | sed -n '2p')"
DB_USER="$(printf '%s' "$CONFIG_OUTPUT" | sed -n '3p')"
DB_PASS="$(printf '%s' "$CONFIG_OUTPUT" | sed -n '4p')"

MYSQL_ARGS=("-h" "$DB_HOST" "-u" "$DB_USER" "--show-warnings")
if [[ -n "$DB_PASS" ]]; then
  MYSQL_ARGS+=("-p$DB_PASS")
fi

echo "Importando seed en la base de datos '$DB_NAME'..."
echo "  Host: $DB_HOST"
echo "  Usuario: $DB_USER"
echo "  Archivo: $SEED_FILE"
IMPORT_OUTPUT="$($MYSQL_BIN "${MYSQL_ARGS[@]}" "$DB_NAME" < "$SEED_FILE" 2>&1)"
IMPORT_STATUS=$?
echo "$IMPORT_OUTPUT"
if [[ $IMPORT_STATUS -ne 0 ]] || echo "$IMPORT_OUTPUT" | grep -q -E 'Error \(Code|ERROR|Failed|fatal'; then
  echo "ERROR: La importación produjo errores. Revise la salida anterior."
  exit 1
fi

echo "Seed importado correctamente."
echo "Verificando importación en tablas claves..."
"$MYSQL_BIN" "${MYSQL_ARGS[@]}" "$DB_NAME" -e "SELECT 'tbl_roles' AS tabla, COUNT(*) AS registros FROM tbl_roles UNION ALL SELECT 'tbl_usuarios', COUNT(*) FROM tbl_usuarios UNION ALL SELECT 'tbl_abogados', COUNT(*) FROM tbl_abogados UNION ALL SELECT 'tbl_clientes', COUNT(*) FROM tbl_clientes UNION ALL SELECT 'tbl_casos', COUNT(*) FROM tbl_casos;"
