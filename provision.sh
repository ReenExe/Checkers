#!/usr/bin/env bash
export DEBIAN_FRONTEND=noninteractive

# sudo aptitude --help
# -y             Assume that the answer to simple yes/no questions is 'yes'.
# -f             Aggressively try to fix broken packages.
# -q             In command-line mode, suppress the incremental progress indicators.

sudo aptitude update -q

# OpenResty -> LuaRocks -> Lapis
sudo aptitude install -q -y -f openresty luarocks

# for success install Lapis need libssl
sudo aptitude install -q -y -f libssl-dev

sudo luarocks install lapis