require.config({

    paths: {
        "jquery": "/frontend/static/vendor/jquery",
        "underscore": "/frontend/static/vendor/underscore",
        "backbone": "/frontend/static/vendor/backbone",
        "socket.io": "/frontend/static/vendor/socket.io"
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