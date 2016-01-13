# Use this to manually run a script
# Usage: ./php-cli.sh script.php
echo "Running php-cli Docker with arguments $@"
docker rm -f php56-cli 2>/dev/null
docker run -it --rm --name php56-cli \
-v "$PWD":/usr/src/myapp \
-v "${HOME}/Music":/usr/src/myapp/music \
-w /usr/src/myapp \
php:5.6-cli php "$@"
