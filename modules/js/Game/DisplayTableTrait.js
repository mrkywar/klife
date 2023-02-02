

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
                        
                        
//                        var playerBorad = dojo.string.substitute(`
//                            <div  class="playertable whiteblock playertable" id="player_board_${playerId}" >
//                                <div class="playertablename" style="color:#${gamedatas.players[playerId]['color']}">
//                                        ${gamedatas.players[playerId]['name']}
//                                </div>
//                                <div class="playertablecard" id="playertable_${playerId}">
//                                </div>
//                                <div class="clear"></div>
//                            </div>
//                        `);
                        
//                        this.debug(playerBorad);
                    }

                    // Add this into the CSS

                },
            }




    );
});
