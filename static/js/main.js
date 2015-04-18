define([
    'jquery',
    'underscore',
    'backbone',
    'socket.io'
], function ($, _, Backbone, io) {
    var socket = io('http://checkers.lua:8000/');

    socket.on('connected', console.log);
});