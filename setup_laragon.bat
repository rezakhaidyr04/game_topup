@echo off
echo ===================================
echo Game TopUp - Laragon Setup
echo ===================================
echo.

REM Check if Laragon exists
if not exist "C:\laragon\www" (
    echo ERROR: Laragon tidak ditemukan di C:\laragon\www
    echo Silakan install Laragon terlebih dahulu!
    pause
    exit /b 1
)

echo Copying project to Laragon...
xcopy "C:\game_topup" "C:\laragon\www\game_topup" /E /I /Y

if %errorlevel% equ 0 (
    echo.
    echo SUCCESS! Project sudah di-copy ke Laragon
    echo.
    echo Langkah berikutnya:
    echo 1. Buka Laragon
    echo 2. Klik "Start All" untuk menjalankan Apache dan MySQL
    echo 3. Buka browser: http://localhost/game_topup/public
    echo 4. Atau akses phpMyAdmin: http://localhost/phpmyadmin
    echo.
) else (
    echo ERROR: Gagal copy project
    pause
    exit /b 1
)

pause
