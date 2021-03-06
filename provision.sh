#!/usr/bin/env bash
export DEBIAN_FRONTEND=noninteractive
export LC_ALL=en_US.UTF-8
export LANG=en_US.UTF-8

# sudo aptitude --help
# -y             Assume that the answer to simple yes/no questions is 'yes'.
# -f             Aggressively try to fix broken packages.
# -q             In command-line mode, suppress the incremental progress indicators.

sudo aptitude update -q

# OpenResty -> LuaRocks -> Lapis
sudo aptitude install -q -y -f libreadline-dev libncurses5-dev libpcre3-dev libssl-dev perl make

sudo aptitude install -q -y -f luarocks

sudo luarocks install lapis

wget http://openresty.org/download/ngx_openresty-1.7.10.1.tar.gz
tar xzvf ngx_openresty-1.7.10.1.tar.gz
cd ngx_openresty-1.7.10.1/
./configure
make
make install

sudo apt-get install -q -y -f nodejs npm

# Python Flask http://flask.pocoo.org/
sudo apt-get install -q -y -f python-pip
sudo pip install Flask

# Stress Testing
sudo apt-get install siege
sudo apt-get install -y python-dev
sudo pip install locustio

# Ruby
sudo apt-get install ruby-full
sudo gem install test-unit-full