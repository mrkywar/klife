const WIDTH_XL = 288
const HEIGHT_XL = 432;
const RADIUS_XL = 13;

const PREF_CHOICE_SIZE_XS = 1101;
const PREF_CHOICE_SIZE_S = 1102;
const PREF_CHOICE_SIZE_M = 1103;
const PREF_CHOICE_SIZE_L = 1104;
const PREF_CHOICE_SIZE_XL = 1105;
const PREF_CARD_SIZE = 110;
const PREF_TOOLTIP_SIZE = 111;

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
                    this.size_pref_names = {
                        "XS": PREF_CHOICE_SIZE_XS,
                        "S": PREF_CHOICE_SIZE_S,
                        "M": PREF_CHOICE_SIZE_M,
                        "L": PREF_CHOICE_SIZE_L,
                        "XL": PREF_CHOICE_SIZE_XL
                    }; // Sizes among with the user can chose in the prefs: XS, S, M, L, XL
                    this.card_dimensions = this.computePossibleCardDimensions();  // Get the card dimensions for each size
//                    dojo.subscribe('playNumber', this, "notifPlayNumber");

                    this.debug(this.card_dimensions);
                },

                setup: function (gamedatas) {
                    this.debug("Setup in trait", gamedatas);


                    // Get user preferences for card size
                    this.card_size = this.getUserCardSizePreference(PREF_CARD_SIZE);
                    this.tooltip_card_size = this.getUserCardSizePreference(PREF_TOOLTIP_SIZE);

                    this.debug(this.card_size, this.tooltip_card_size);

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
                },

                getUserCardSizePreference: function (user_pref) {
                    var pref_value = this.prefs[user_pref].value;
                    for (var size in this.size_pref_names) {
                        if (this.size_pref_names[size] == pref_value) {
                            return size;
                        }
                    }
                    return null;
                },
            }




    );
});
