@echo off
setlocal enabledelayedexpansion

:: Set color to yellow
color 0E

:: Clear screen and display header
cls
echo ================================================
echo            MASTER BARBER SHOP INSTALLER
echo ================================================
echo.
echo       ___________________
echo      /\                  \
echo     /  \    BARBER SHOP  \
echo    /    \________________/
echo    \    /
echo     \  /
echo      \/
echo.
echo Welcome! Let's get your barber shop website running!
timeout /t 2 >nul

:: Main menu function
:show_menu
cls
echo What would you like to do?
echo.
echo [1] Install everything (First time setup)
echo [2] Start the website
echo [3] Exit
echo.
set /p choice="Enter your choice (1-3): "

if "%choice%"=="1" goto install_barbershop
if "%choice%"=="2" goto start_website
if "%choice%"=="3" goto exit_script
goto show_menu

:: Install Barber Shop function
:install_barbershop
cls
echo ========================================
echo         Installing Barber Shop...
echo ========================================
echo.

echo Step 1/5: Checking for required software...
echo -------------------------------------

:: Check for Docker
docker --version >nul 2>&1
if errorlevel 1 (
    echo [X] Docker is missing! Please install Docker first.
    echo Visit https://docs.docker.com/get-docker/
    pause
    goto show_menu
) else (
    echo [√] Docker is installed!
)

:: Check for Docker Compose
docker-compose --version >nul 2>&1
if errorlevel 1 (
    echo [X] Docker Compose is missing! Please install Docker Compose first.
    echo Visit https://docs.docker.com/compose/install/
    pause
    goto show_menu
) else (
    echo [√] Docker Compose is installed!
)

echo.
echo Step 2/5: Setting up the project...
echo -------------------------------------
call composer install
echo [√] Dependencies installed!

echo.
echo Step 3/5: Installing Laravel Sail...
echo -------------------------------------
call php artisan sail:install --with=mysql
echo [√] Sail installed!

echo.
echo Step 4/5: Creating configuration...
echo -------------------------------------
if not exist ".env" (
    copy .env.example .env
    call .\vendor\bin\sail artisan key:generate
    echo [√] Configuration created!
) else (
    echo [√] Configuration already exists!
)

echo.
echo Step 5/5: Starting containers and loading initial data...
echo -------------------------------------
call .\vendor\bin\sail up -d
echo [√] Containers started!

:: Wait for MySQL to be ready
echo Waiting for MySQL to be ready...
timeout /t 20 >nul

call .\vendor\bin\sail artisan migrate:fresh --seed
echo [√] Data loaded successfully!

echo.
echo ========================================
echo         Installation Complete!
echo ========================================
echo.
pause
goto show_menu

:: Start website function
:start_website
cls
echo ========================================
echo         Starting Barber Shop...
echo ========================================
echo.
echo Your website will open in your browser...
echo To stop the website, close this window
echo.

:: Check if containers are running
docker ps | findstr /C:"sail-8.2/app" >nul 2>&1
if errorlevel 1 (
    call .\vendor\bin\sail up -d
)

:: Open in default browser
start http://localhost

:: Show logs
call .\vendor\bin\sail logs -f

goto show_menu

:: Exit script function
:exit_script
cls
echo Thanks for using Master Barber Shop!
echo.
echo See you next time! 👋
timeout /t 3 >nul
exit /b 0

:: Start the script
goto show_menu
