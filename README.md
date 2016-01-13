# Looping

### PHP - A presentation on Iterators & Generators
-----
This is all the code you will need to be able to follow along with my presentation on Iterators & Generators in PHP.

**[VIEW PRESENTATION](https://docs.google.com/presentation/d/1ksW1xDlkPCdtRcnbSWQToKegI5Y4AyZezRh8L9vuGU0/edit?usp=sharing)**

* With some interesting applications I have discovered along the  way.
* Working examples
* DockerFiles for both PHP56 and PHP7

### Running Dockers.

**Requires Docker to be installed already!**

**PHP7**
_Sorry this is larger, it's my dev build including debugging extras_

```shell

# Clone in
git clone https://github.com/drpain/Looping.git

# Go to the image of your choice
cd Looping/docker/php7-cli

# Run the build script which pulls the image and builds it
./build.sh

# And wait, for everything to complete.
```

**PHP56**
```shell
# Clone in
git clone https://github.com/drpain/Looping.git

# Go to the image of your choice
cd Looping/docker/php56-cli

# Run the build script which pulls the image and builds it
./build.sh

# And wait, for everything to complete.
```

### Links & Credits

Iterators 101, by Stefan Froelich:

http://www.sitepoint.com/using-spl-iterators-1/

-----
This was largely inspired by an article I read written by Nikita Popov regaring PHP Generators and Iterators:

http://nikic.github.io/2012/12/22/Cooperative-multitasking-using-coroutines-in-PHP.html
