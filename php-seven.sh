# Use this to manually run a script
# Usage: ./php-cli.sh script.php
clear
echo "Running php-cli Docker with arguments $@"
docker rm -f php7-cli 2>/dev/null
docker run -it \
--rm \
--name php7-cli \
--net=host \
-v "$PWD":/usr/src/myapp \
-v "${HOME}/Music":/usr/src/myapp/music \
-v "${HOME}/Pictures/wallpapers":/usr/src/myapp/pictures \
-v "${HOME}":/usr/src/myapp/home \
-w /usr/src/myapp \
drpain/php-cli:latest php "$@"
