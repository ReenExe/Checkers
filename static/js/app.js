require.config({

    paths: {
        "jquery": "/static/vendor/jquery",
        "underscore": "/static/vendor/underscore",
        "backbone": "/static/vendor/backbone",
        "socket.io": "/static/vendor/socket.io"
    },

    shim: {
        "jquery": {
            exports: "$"
        },
        "underscore": {
            exports: "_"
        },
        "backbone": {
            deps: ["underscore", "jquery"],
            exports: "Backbone"
        },
        "socket.io": {
            exports: "io"
        }
    },

    // запустить приложение
    deps: ['./main']
});