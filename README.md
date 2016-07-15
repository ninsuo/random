# random
A command that filters /dev/urandom with required characters to generate random strings

## Installation

```sh
git clone https://github.com/ninsuo/random.git
cd random
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar update
ln -s `pwd`/random /usr/local/bin/random
```

## Usage

```sh
Usage:
  random [options] [--] [<size>]

Arguments:
  size                  Size of the random string [default: 32]

Options:
  -i, --numeric         Exclude numeric characters
  -a, --alphabetic      Exclude alphabetic characters
  -s, --symbol          Exclude symbol characters
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
 Generate random strings
```

## Demo

```sh
# Default: alphabetic, numeric and symbols, 32 bytes
$ random
||>rr=llZqq+[T2-aa\]8ee#ll!Dllss

# The only argument taken is the random string size
$ random 64
Z,ssP{3=RWGFqq9)hhffH@ppEQ?|+:ww*E^oo$@[0ffCaass:AI.>-XCff)/aazz

# To disable symbols (to get alphanumeric string), use the -s option
$ random 64 -s
y2npUoSgBSLJFXhmErj9AgycuP8e0gQQFKOTYUlVHU6JrqD7zy6XilyHZ0HskZip

# To disable digits, use the -i option
$ random 64 -s -i
FzTbNwxGTwhroSUrROfgIPENdpxrhkMlCeZtXIdMItLDZypFzIwBebQImLsygKrm

# To disable alphabetic characters, use -a option
$ random 64 -s -a
0101947768751888979033495038653685824055996158848049030883823416
```

