# Use this to manually run a script
# Usage: ./php-cli.sh script.php
echo "Running php-cli Docker with arguments $@"
docker rm -f php7-cli 2>/dev/null
docker run -it --rm --name php7-cli \
-v "$PWD":/usr/src/myapp \
-w /usr/src/myapp \
drpain/php-cli:latest php "$@"
