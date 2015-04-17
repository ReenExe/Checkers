require.config({

    paths: {
        "jquery": "/static/vendor/jquery",
        "underscore": "/static/vendor/underscore",
        "backbone": "/static/vendor/backbone"
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
        }
    },

    // запустить приложение
    deps: ['./main']
});