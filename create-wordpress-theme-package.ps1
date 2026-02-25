# Script to create WordPress theme package
# Run this script from the project root directory

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Creating WordPress Theme Package" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Check if wordpress-theme directory exists
if (-Not (Test-Path "wordpress-theme")) {
    Write-Host "ERROR: wordpress-theme directory not found!" -ForegroundColor Red
    Write-Host "Please run this script from the project root directory." -ForegroundColor Red
    exit 1
}

# Remove old zip if exists
if (Test-Path "dost-audit-theme.zip") {
    Write-Host "Removing old package..." -ForegroundColor Yellow
    Remove-Item "dost-audit-theme.zip" -Force
}

# Create zip file
Write-Host "Creating ZIP package..." -ForegroundColor Green
Compress-Archive -Path "wordpress-theme\*" -DestinationPath "dost-audit-theme.zip" -Force

# Check if zip was created successfully
if (Test-Path "dost-audit-theme.zip") {
    $zipSize = (Get-Item "dost-audit-theme.zip").Length / 1MB
    Write-Host ""
    Write-Host "========================================" -ForegroundColor Green
    Write-Host "Package created successfully!" -ForegroundColor Green
    Write-Host "========================================" -ForegroundColor Green
    Write-Host "File: dost-audit-theme.zip" -ForegroundColor White
    Write-Host "Size: $([math]::Round($zipSize, 2)) MB" -ForegroundColor White
    Write-Host ""
    Write-Host "You can now upload this file to WordPress:" -ForegroundColor Cyan
    Write-Host "  Apparence > Thèmes > Ajouter > Téléverser un thème" -ForegroundColor White
    Write-Host ""
} else {
    Write-Host "ERROR: Failed to create package!" -ForegroundColor Red
    exit 1
}
