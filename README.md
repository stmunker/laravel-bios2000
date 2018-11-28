# BIOS2000 for Laravel

## Requirements

https://github.com/Microsoft/msphpsql/

## Installation

```
composer require bernhardk/laravel-bios2000
```

In ".env" the following needs to be added and configured:
```
BIOS_CONNECTION=mssql
BIOS_HOST=...
BIOS_PORT=1433
BIOS_USERNAME=...
BIOS_PASSWORD=...
BIOS_DB_S=...
BIOS_DB_M=...
BIOS_DB_A=...
```

In config/database.php the following Connection needs to be added:
```
'bios2000' => [
    'database' => env('BIOS_DB_M'),
    'driver' => env('BIOS_CONNECTION'),
    'host' => env('BIOS_HOST'),
    'port' => env('BIOS_PORT'),
    'username' => env('BIOS_USERNAME'),
    'password' => env('BIOS_PASSWORD'),
],
```

