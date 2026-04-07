#!/bin/bash
set -e

# The WORKDIR is set to /var/www/html/src in the Dockerfile
# If the directory is empty (no composer.json), install Laravel from pre-cached files
if [ ! -f "composer.json" ]; then
    echo "First run: Bootstrapping Laravel project from pre-cached files into src/..."
    cp -rn /usr/src/laravel/. .
    
    # Set permissions for Laravel directories
    chown -R www-data:www-data storage bootstrap/cache
    chmod -R 775 storage bootstrap/cache
    
    echo "Laravel bootstrapping complete!"
fi

# Execute the original command (apache2-foreground)
exec "$@"
