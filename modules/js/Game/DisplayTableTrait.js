

define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
    g_gamethemeurl + 'modules/js/Core/ToolsTrait.js'
], function (dojo, declare) {
    return declare(
            'smilelife.DisplayTableTrait',
            [
                common.ToolsTrait
            ],
            {

                constructor: function () {
                    this.debug('smilelife.DisplayTableTrait constructor');
//                    this.handCards = [];
                },

                displayTable: function (gamedatas) {
                    this.debug("setup Table", gamedatas);

                    dojo.place(this.format_block('jstpl_myhand'), 'board');

                    for (var playerId in gamedatas.players) {
                        var player = gamedatas.players[playerId];
                        player['playerId'] = playerId;

                        dojo.place(this.format_block('jstpl_player_board', player), 'board');

                    }

                    for (var cardId in gamedatas.myhand) {
                        this.debug(cardId, gamedatas.myhand[cardId]);
                        var card = gamedatas.myhand[cardId];
                        card['cardId'] = cardId;
                        
                        dojo.place(this.format_block('jstpl_card', card), 'myhand');
                    }


                },
            }




    );
});
