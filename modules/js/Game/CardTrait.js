const WIDTH_XL = 288
const HEIGHT_XL = 432;
const RADIUS_XL = 13;

const CH_XS = 1101;
const CH_S = 1102;
const CH_M = 1103;
const CH_L = 1104;
const CH_XL = 1105;

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
                    this.size_pref_names = {"XS": CH_XS, "S": CH_S, "M": CH_M, "L": CH_L, "XL": CH_XL}; // Sizes among with the user can chose in the prefs: XS, S, M, L, XL
                    this.card_dimensions = this.computePossibleCardDimensions();  // Get the card dimensions for each size
//                    dojo.subscribe('playNumber', this, "notifPlayNumber");

                    this.debug(this.card_dimensions);
                },

                setup: function (gamedatas) {
                    this.debug("Setup in trait", gamedatas);
                },

                /* -------------------------------------------------------------
                 *                  BEGIN - CARD SIZE
                 * ---------------------------------------------------------- */


                // Use in initialization to compute the possible card dimensions (XS to L) taking the declared XL dimensions into account
                computePossibleCardDimensions: function () {
                    var size_ratios = {"XS": .2, "S": .4, "M": .6, "L": .8};
                    var card_dimensions_XL = {"width": WIDTH_XL, "height": HEIGHT_XL, "radius": RADIUS_XL};
                    card_dimensions = {"XL": card_dimensions_XL};

                    for (var size in size_ratios) {
                        // Compute card dimensions for this size
                        var ratio = size_ratios[size];

                        var width = ratio * card_dimensions_XL.width;
                        var height = ratio * card_dimensions_XL.height;
                        var radius = ratio * card_dimensions_XL.radius;

                        card_dimensions[size] = {"width": width, "height": height, "radius": radius};
                    }
                    return card_dimensions;
                }
            }


    );
});
