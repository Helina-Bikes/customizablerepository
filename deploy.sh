#!/bin/bash

# Define FTP credentials
FTP_USER="Helina-Bikes"
FTP_PASS="helina123bikes"
FTP_HOST="ftp.artseb.studio"

# Define your project path on the server
REMOTE_PATH="/home/artseb/public_html"

# Install lftp (only if it's not installed)
if ! command -v lftp &> /dev/null; then
    echo "lftp not found, installing..."
    sudo apt-get install lftp -y  # This command depends on the environment you're running the script in
fi

# Add the SSH key to known hosts (prevent first-time warning)
ssh-keyscan -H $FTP_HOST >> ~/.ssh/known_hosts

# Upload files using FTP
lftp -c "
open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST;
lcd $GITHUB_WORKSPACE;
mirror -R . $REMOTE_PATH;
bye
"

# Run Laravel commands on the server
ssh your_ssh_user@$FTP_HOST << EOF
    cd $REMOTE_PATH
    php artisan down
    composer install --no-dev --optimize-autoloader
    php artisan migrate --force
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    php artisan up
    exit
EOF

echo "✅ Deployment Completed Successfully!"
