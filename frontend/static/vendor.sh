#!/bin/bash

wget -O static/vendor/jquery.js http://code.jquery.com/jquery-1.11.2.js
wget -O static/vendor/underscore.js http://underscorejs.org/underscore.js
wget -O static/vendor/backbone.js http://backbonejs.org/backbone.js
wget -O static/vendor/require.js http://requirejs.org/docs/release/2.1.16/comments/require.js
wget -O static/vendor/socket.io.js https://cdn.socket.io/socket.io-1.3.4.js

# sh static/vendor.sh 