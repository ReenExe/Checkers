define([
    'jquery',
    'underscore',
    'backbone',
    'socket.io'
], function ($, _, Backbone, io) {

    var debug = true;

    var getConnection = function() {
        var socket = io('http://checkers.lua:8000/');

        debug && socket.on('connected', console.log);

        return socket;
    };

    var Game = (function() {
        var socket = getConnection();

        var boardMap = {};

        var $block = $('#js-tic-tac-block');

        var getChoosesView = function(chooses, setChoose) {
            var $chooses = $('<div></div>');

            var getChooseAction = function(choose) {
                return function() {
                    setChoose(choose);

                    $chooses.remove();
                };
            };

            for (var key in chooses) {
                var choose = chooses[key];

                var $choose = $('<button></button>');

                $choose
                    .html(choose)
                    .click(getChooseAction(choose));

                $chooses.append($choose)
            }

            return $chooses;
        };

        var getTicTacBoardView = function() {
            var $table = $('<table></table>');

            var index = 0;

            for (var x = 1; x <= 3; x++) {
                var $row = $('<tr></tr>');

                for (var y = 1; y <= 3; y++) {
                    var $cell = $('<td></td>');

                    boardMap[index++] = $cell;

                    $row.append($cell);
                }

                $table.append($row)
            }

            return $table;
        };

        var showBoardView = function() {
            var $board = getTicTacBoardView();

            $block.html($board);
        };

        var player;

        var getOtherChoose = function(inChoose, chooses) {
            for (var choose in chooses) {
                if (choose == inChoose) continue;

                return choose;
            }
        };

        var setPlayerMark = function(me, chooses) {
            player = {
                me: me,
                partner: getOtherChoose(me, chooses)
            };
        };

        var partnerStep = function(step) {
            boardMap[step].html(player.partner);
        };

        return {
            start: function() {
                socket.emit('tic-tac:start');

                socket.on('tic-tac:choose', function(chooses) {

                    var $choosesView = getChoosesView(chooses, function(choose) {
                        socket.emit('tic-tac:choose:set', choose);

                        setPlayerMark(choose, chooses);

                        showBoardView();
                    });

                    $block.append($choosesView);
                });

                socket.on('tic-tac:step', partnerStep);

                socket.on('tic-tac:partner:connect', console.log)
            }
        };
    })();

    Game.start();
});