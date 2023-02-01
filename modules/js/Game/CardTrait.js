define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
    g_gamethemeurl + 'modules/js/Core/ToolsTrait.js'
], function (dojo, declare) {
    return declare(
            'smilelife.CardTrait',
            [
                common.ToolsTrait
            ],
            {

                constructor: function () {
                    this.debug('smilelife.CardTrait constructor');
//                    this.handCards = [];
//                    this.selectedJokers = [];
//                    
//                    dojo.subscribe('playNumber', this, "notifPlayNumber");
                }
            }
    );
});
