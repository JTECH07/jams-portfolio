#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
LOG_DIR="$ROOT_DIR/.dev"
mkdir -p "$LOG_DIR"

start_service() {
  local name="$1"
  local command="$2"
  local pid_file="$LOG_DIR/${name}.pid"
  local log_file="$LOG_DIR/${name}.log"

  if [ -f "$pid_file" ] && kill -0 "$(cat "$pid_file")" 2>/dev/null; then
    echo "$name already running (PID $(cat "$pid_file"))"
    return
  fi

  nohup bash -lc "$command" > "$log_file" 2>&1 &
  echo $! > "$pid_file"
  echo "$name started with PID $(cat "$pid_file")"
}

cd "$ROOT_DIR"
start_service "laravel" "php artisan serve --host 127.0.0.1 --port 8000"
start_service "vite" "npm run dev -- --host 127.0.0.1 --port 5173"

sleep 5

printf '\n=== URLs ===\n'
printf 'Laravel: http://127.0.0.1:8000\n'
printf 'Vite: http://127.0.0.1:5173\n\n'

printf '=== Laravel log ===\n'
tail -n 20 "$LOG_DIR/laravel.log" 2>/dev/null || echo 'No Laravel log yet'
printf '\n=== Vite log ===\n'
tail -n 20 "$LOG_DIR/vite.log" 2>/dev/null || echo 'No Vite log yet'
