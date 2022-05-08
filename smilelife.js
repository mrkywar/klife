/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * Smile Life implementation : © Jean Portemer <jportemer@mailz.org>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * smilelife.js
 *
 * Smile Life user interface script
 * 
 * In this file, you are describing the logic of your user interface, in Javascript language.
 *
 */

/* Constants */

// Constants in game preferences (! The value match these in constants.inc.php !)
const PR_CARD_SIZE = 100;
const PR_TOOLTIP_CARD_SIZE = 101;

const CH_XS = 1;
const CH_S = 2;
const CH_M = 3;
const CH_L = 4;
const CH_XL = 5;

const ONLY_ONE = 1;

const SPRITE_NB_COLUMNS = 15;
const SPRITE_NB_ROWS = 7;

const WIDTH_XL = 288
const HEIGHT_XL = 432;
const RADIUS_XL = 13;

define([
    "dojo","dojo/_base/declare",
    "ebg/core/gamegui",
    "ebg/counter",
    "ebg/stock"
],
function (dojo, declare) {
    return declare("bgagame.smilelife", ebg.core.gamegui, {
        constructor: function(){
            console.log('smilelife constructor');
              
            // Here, you can init the global variables of your user interface
            // Example:
            // this.myGlobalValue = 0;
			
			// Before release, one must decide which image format must be used
			// (Today: SVG is top quality but heavy to load...)
			this.sprite_image_path = g_gamethemeurl + 'img/cards.png';
			this.dontPreloadImage(g_gamethemeurl + 'img/cards.jpg');
			this.dontPreloadImage(g_gamethemeurl + 'img/cards.svg');
			
			this.sprite_nb_columns = SPRITE_NB_COLUMNS; // Number of images in the sprite
			this.sprite_nb_rows = SPRITE_NB_ROWS; // Number of images in the sprite
			
			this.size_pref_names = {"XS": CH_XS, "S": CH_S, "M": CH_M, "L": CH_L, "XL": CH_XL}; // Sizes among with the user can chose in the prefs: XS, S, M, L, XL
			this.card_dimensions = this.computePossibleCardDimensions();  // Get the card dimensions for each size
			
			this.ref_card_width = null; // Reference dimensions for a card. The positionning of text are given relatively to that reference
			this.ref_card_height = null; // Those are define serer-side
			
			this.card_size = null; // Current size of the card according to the player preferences
			this.tooltip_card_size = null; // Same for card size in tooltips
			
			this.card_being_created = null; // Used to remember the last card created for tooltip
			
			console.log(this.card_dimensions);
        },
        
        /*
            setup:
            
            This method must set up the game user interface according to current game situation specified
            in parameters.
            
            The method is called each time the game interface is displayed to a player, ie:
            _ when the game starts
            _ when a player refreshes the game page (F5)
            
            "gamedatas" argument contains all datas retrieved by your "getAllDatas" PHP method.
        */
        
        setup: function(gamedatas) {
            console.log( "Starting game setup" );
			
			// Get user preferences for card size
			this.card_size = this.getUserCardSizePreference(PR_CARD_SIZE);
			this.tooltip_card_size = this.getUserCardSizePreference(PR_TOOLTIP_CARD_SIZE);
			
			// Apply user preferences in CSS
			this.applyCardSize(this.card_size, ".card");
			this.applyPlayerBoardMinimumSize(this.card_size);
			this.applyCardSize(this.tooltip_card_size, ".card.tooltip");

			// Get the reference size (which is defined server side). This is NOT the same as XL size.
            this.ref_card_width = gamedatas.ref_card_width;
            this.ref_card_height = gamedatas.ref_card_height;
			
            // Setting up player boards
            for(var player_id in gamedatas.players) {
                var player = gamedatas.players[player_id];
                
				var board = 'player_board_' + player_id;
				
                // TODO: Setting up players boards if needed
            }
			
			// Player hand
			if(!this.isSpectator) { // Only if the player is in the game
				// Build the hand manager
				dojo.place(jstpl_my_hand, 'player_' + this.player_id);
				this.player_hand = new ebg.stock();
				this.player_hand.create(this, $('my_hand'), this.card_dimensions[this.card_size].width, this.card_dimensions[this.card_size].height);
				this.player_hand.extraClasses = "card " + this.card_size;
				this.player_hand.image_items_per_row = this.sprite_nb_columns;
				this.player_hand.setSelectionAppearance('class');
				this.player_hand.setSelectionMode(ONLY_ONE);
				this.player_hand.onItemCreate = dojo.hitch(this, 'onCreateNewCard');
				
				for(var i=0; i<this.sprite_nb_rows; i++) {
					for(var j=0; j<this.sprite_nb_columns; j++) {
						var k = i * this.sprite_nb_rows + j;
						this.player_hand.addItemType(k, k, this.sprite_image_path, k);
					}
				}
				
				// Create the cards that are currently in the player hand
				for (var i=0; i<gamedatas.hand.length; i++) {
					this.card_being_created = gamedatas.hand[i];
					this.player_hand.addToStockWithId(this.card_being_created.index, this.card_being_created.id);
				}
				
				// this.preload_tooltip_image(); // Force tooltip to preload
			}
			
            // Setup game notifications to handle (see "setupNotifications" method below)
            this.setupNotifications();
			
            console.log( "Ending game setup" );
        },
       

        ///////////////////////////////////////////////////
        //// Game & client states
        
        // onEnteringState: this method is called each time we are entering into a new game state.
        //                  You can use this method to perform some user interface changes at this moment.
        //
        onEnteringState: function(stateName, args) {
            console.log('Entering state: '+stateName);
            
            switch(stateName) {
            
            /* Example:
            
            case 'myGameState':
            
                // Show some HTML block at this game state
                dojo.style( 'my_html_block_id', 'display', 'block' );
                
                break;
            */
			}
        },

        // onLeavingState: this method is called each time we are leaving a game state.
        //                 You can use this method to perform some user interface changes at this moment.
        //
        onLeavingState: function(stateName) {
            console.log('Leaving state: '+stateName);
            
            switch(stateName) {
            
            /* Example:
            
            case 'myGameState':
            
                // Hide the HTML block we are displaying only during this game state
                dojo.style( 'my_html_block_id', 'display', 'none' );
                
                break;
            */
			}
        }, 

        // onUpdateActionButtons: in this method you can manage "action buttons" that are displayed in the
        //                        action status bar (ie: the HTML links in the status bar).
        //        
        onUpdateActionButtons: function( stateName, args )
        {
            console.log('onUpdateActionButtons: '+stateName);
                      
            if(this.isCurrentPlayerActive()) {            
                switch(stateName) {
				/*               
                 Example:
 
                 case 'myGameState':
                    
                    // Add 3 action buttons in the action status bar:
                    
                    this.addActionButton( 'button_1_id', _('Button 1 label'), 'onMyMethodToCall1' ); 
                    this.addActionButton( 'button_2_id', _('Button 2 label'), 'onMyMethodToCall2' ); 
                    this.addActionButton( 'button_3_id', _('Button 3 label'), 'onMyMethodToCall3' ); 
                    break;
				*/
                }
            }
        },        

        ///////////////////////////////////////////////////
        //// Utility methods
        
        /*
        
            Here, you can defines some utility methods that you can use everywhere in your javascript
            script.
        
        */
		
		// Enables to insert extra css into the document
		insertCSS: function(css) {
			var styleSheet = document.createElement("style");
			styleSheet.type = "text/css";
			styleSheet.innerText = css;
			document.head.appendChild(styleSheet);
		},
		
		// Use in initialization to compute the possible card dimensions (XS to L) taking the declared XL dimensions into account
		computePossibleCardDimensions: function() {
			var size_ratios = {"XS": .2, "S":.4, "M":.6, "L": .8};
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
		
		// Call this function to preload the tooltip content in initialisation
		preload_tooltip_image: function() {
			// Open and close manually the tooltip for the first item
			// This is dirty, I know...
			this.tooltips['my_hand_item_1'].open('my_hand_item_1');
			var self = this;
			window.addEventListener('load', function() {self.tooltips['my_hand_item_1'].close('my_hand_item_1')});
		},
		
		onCreateNewCard: function(card_div, card_type_id, card_HTML_id) {
            this.createCardTooltip(card_div, card_type_id, card_HTML_id);
			
			// Add i18n text in accordance with positionning and style indicated in the card object
			this.writeCardText(this.card_being_created, card_div);
        },

        createCardTooltip: function(card_div, card_type_id, card_HTML_id) {
			var tooltip_card_div = dojo.clone(card_div);
			dojo.removeAttr(tooltip_card_div, 'id');
			dojo.removeClass(tooltip_card_div, 'stockitem');
			dojo.addClass(tooltip_card_div, 'tooltip');
            this.addTooltipHtml(card_HTML_id, tooltip_card_div.outerHTML);
			
			// Add i18n text in accordance with positionning and style indicated in the card object
			// TODO: write tooltip in the DOM
			// this.writeCardText(this.card_being_created, tooltip_card_div);
        },
		
		writeCardText: function(card, card_div) {
			for(var i=0; i<card.texts.length; i++) {
				// Integrate i-th text
				var infos = card.texts[i];
				var str = _(infos.str);
				
				var nb_boxes = infos.boxes.length
				var str_array;
				if (nb_boxes == 1) {
					str_array = [str];
				}
				else { // nb_boxes == 2
					// The translated text must be split into two parts to fill two boxes (divs)
					str_array = this.splitIntoTwoLines(str)
				}
				
				// Create the boxes (1 or 2 depending of the case) and fill them with the translated text
				for(var l=0; l<nb_boxes; l++) {
					// Create the box
					var box = infos.boxes[l];
					var box_id = dojo.string.substitute(`text_${card.id}_${i}_${l}`);
					var str = str_array[l];
					var div = dojo.string.substitute(`<div id='${box_id}' class='card_text'>${str}</div>`)
					
					// Include in the DOM
					dojo.place(div, card_div);
					
					// Compute actual text and box dimension in px according to the current card size
					var actual_card_width = this.card_dimensions[this.card_size].width;
					var ratio = actual_card_width / this.ref_card_width;
					
					var font_size = box['font-size'] * ratio;
					var left = box.left * ratio;
					var top = box.top * ratio;
					var width = box.width * ratio;
					var height = box.height * ratio;
					
					// Apply CSS
					dojo.style(box_id, 'font-family', infos['font-family']);
					dojo.style(box_id, 'font-weight', infos['font-weight']);
					dojo.style(box_id, 'font-style', infos['font-style']);
					dojo.style(box_id, 'color', infos['color']);
					
					dojo.style(box_id, 'font-size', font_size + 'px');
					
					dojo.style(box_id, 'left', left + 'px');
					dojo.style(box_id, 'top', top + 'px');
					dojo.style(box_id, 'width', width + 'px');
					dojo.style(box_id, 'height', height + 'px');
					
					// TODO: If text overflow box, reduce-compute the font-size
				}
			}
		},
		
		// Utilitary to split a translated text string into two parts, as evenly as possible
		// If there is only one word, an hyphen is used
		// If there are several words, the splitting is done between two words
		splitIntoTwoLines: function(str) {
			// First base case, empty or one character only
			if (str.length <= 1) {
				return [str, ""]
			}

			var half_length = Math.floor(str.length / 2);
			var first_half = str.substring(0, half_length).trim();
			var second_half = str.substring(half_length).trim();
			
			var words = str.split(" ");
			// Second base case, if only one word, split in the middle and link with an hyphen
			if (words.length == 1) {
				return [first_half + "-", second_half];
			}
			// Third base case, if only one two words, put each on a separate line
			if (words.length == 2) {
				return words;
			}
			
			// General case, divide a string which contains 3+ words
			var first_half_words = first_half.split(" ");
			var second_half_words = second_half.split(" ");
			
			var k = first_half_words.length - 1;
			if (first_half_words[k] == words[k]) { // Splitting the line preserves the words
				return [first_half, second_half];
			}
			
			// There is a word that would be split
			// Must decide to place it on the first or on the second line base of the length
			var word = first_half_words[k] + second_half_words[0]
			console.log(first_half_words[k])
			console.log(second_half_words[0])
			if (first_half_words[k].length < second_half_words[0].length) {
				// Put the word at the beginning of the second line
				return [first_half_words.slice(0, k).join(" "), word + " " + second_half_words.slice(1).join(" ")];
			}
			// Put the word at the end of the first line
			return [first_half_words.slice(0, k).join(" ") + " " + word, second_half_words.slice(1).join(" ")];
		},
		
		getUserCardSizePreference: function(user_pref) {
			var pref_value = this.prefs[user_pref].value;
			for(var size in this.size_pref_names) {
				if (this.size_pref_names[size] == pref_value) {
					return size;
				}
			}
			return null;
		},
		
		applyCardSize: function(size, HTML_class_list) {
			// Compute the size of the sprite in pixels
			var width = this.card_dimensions[size].width;
			var height = this.card_dimensions[size].height;
			var radius = this.card_dimensions[size].radius;
			
			var sprite_width = this.sprite_nb_columns * width;
			var sprite_height = this.sprite_nb_rows * height;
			
			// Create the CSS piece
			var css = dojo.string.substitute(`
			${HTML_class_list} {
				width: ${width}px !important;
				height: ${height}px !important;
				background-size: ${sprite_width}px ${sprite_height}px !important;
				border-radius: ${radius}px;
			}`);
			
			// Add this into the CSS
			this.insertCSS(css);
		},
		
		applyPlayerBoardMinimumSize: function(size) {
			// Get the height of a card
			var height = this.card_dimensions[size].height;
			
			// Create the CSS piece
			var css = dojo.string.substitute(`
			.player_board {
				min-height: ${height}px !important;
			}`);
			
			// Add this into the CSS
			this.insertCSS(css);
		},

        ///////////////////////////////////////////////////
        //// Player's action
        
        /*
        
            Here, you are defining methods to handle player's action (ex: results of mouse click on 
            game objects).
            
            Most of the time, these methods:
            _ check the action is possible at this game state.
            _ make a call to the game server
        
        */
        
        /* Example:
        
        onMyMethodToCall1: function(evt) {
            console.log('onMyMethodToCall1');
            
            // Preventing default browser reaction
            dojo.stopEvent(evt);

            // Check that this action is possible (see "possibleactions" in states.inc.php)
            if(!this.checkAction('myAction')) {
				return;
			}

            this.ajaxcall( "/smilelife/smilelife/myAction.html", { 
                                                                    lock: true, 
                                                                    myArgument1: arg1, 
                                                                    myArgument2: arg2,
                                                                    ...
                                                                 }, 
                         this, function(result) {
                            
                            // What to do after the server call if it succeeded
                            // (most of the time: nothing)
                            
                         }, function(is_error) {

                            // What to do after the server call in anyway (success or failure)
                            // (most of the time: nothing)

                         }
			);        
        },        
        
        */

        
        ///////////////////////////////////////////////////
        //// Reaction to cometD notifications

        /*
            setupNotifications:
            
            In this method, you associate each of your game notifications with your local method to handle it.
            
            Note: game notification names correspond to "notifyAllPlayers" and "notifyPlayer" calls in
                  your smilelife.game.php file.
        
        */
        setupNotifications: function() {
            console.log('notifications subscriptions setup');
            
            // TODO: here, associate your game notifications with local methods
            
            // Example 1: standard notification handling
            // dojo.subscribe('cardPlayed', this, 'notif_cardPlayed');
            
            // Example 2: standard notification handling + tell the user interface to wait
            //            during 3 seconds after calling the method in order to let the players
            //            see what is happening in the game.
            // dojo.subscribe('cardPlayed', this, 'notif_cardPlayed');
            // this.notifqueue.setSynchronous('cardPlayed', 3000);
            // 
        },  
        
        // TODO: from this point and below, you can write your game notifications handling methods
        
        /*
        Example:
        
        notif_cardPlayed: function(notif) {
            console.log('notif_cardPlayed');
            console.log(notif);
            
            // Note: notif.args contains the arguments specified during you "notifyAllPlayers" / "notifyPlayer" PHP call
            
            // TODO: play the card in the user interface.
        },    
        
        */
   });             
});
