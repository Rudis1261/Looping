# Use this to manually run a script
# Usage: ./php-cli.sh script.php
echo "Running php-cli Docker with arguments $@"
docker run -it --rm --name php-cli \
-v "$PWD":/usr/src/myapp \
-w /usr/src/myapp \
php:5.6-cli php "$@"