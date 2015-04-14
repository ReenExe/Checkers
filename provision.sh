#!/usr/bin/env bash
export DEBIAN_FRONTEND=noninteractive

sudo aptitude update -q

sudo aptitude install -q -y -f openresty luarocks