

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


                    for (var playerId in gamedatas.players) {
                        var player = gamedatas.players[playerId];
                        player['playerId'] = playerId;

                        dojo.place(this.format_block('jstpl_player_board', player), 'board');
                        
                    }

                    // Add this into the CSS

                },
            }




    );
});
