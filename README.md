# random
A command that filters /dev/urandom with required characters to generate random strings

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