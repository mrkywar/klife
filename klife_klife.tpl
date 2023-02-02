{OVERALL_GAME_HEADER}
<div id="gamepanel">
    <div class="container">
        <div id="carddeck" >
            <div class="">
                <div id="aviableDraw">
                </div>
                <div class="clear"></div>
            </div>
            <div class="">
                <div id="deck">
                </div>
                <div class="clear"></div>
            </div>

        </div>
        <div id="board">

        </div>
    </div>
    <div class="clear"></div>

</div>




<script type="text/javascript">
    var jstpl_player_board = `
        <div  class="playertable whiteblock playertable" id="player_board_\${playerId}" >
            <div class="playertablename" style="color:#\${color}">
                    \${name}
            </div>
            <div class="playertablecard" id="playertable_\${playerId}">
            </div>
            <div class="clear"></div>
        </div>
    `;
    
    var jstpl_myhand = `
            <div id="myhand_wrap" class="whiteblock">
                <h3>{MY_HAND}</h3>
                <div id="myhand">
                </div>
                <div class="clear"></div>
            </div>
    `;

// Javascript HTML templates

            /*
             // Example:
             var jstpl_some_game_item='<div class="my_game_item" id="my_game_item_${MY_ITEM_ID}"></div>';
             
             */

</script>  

{OVERALL_GAME_FOOTER}
