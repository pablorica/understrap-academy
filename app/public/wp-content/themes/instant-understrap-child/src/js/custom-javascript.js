
const controller = new ScrollMagic.Controller();

(function($) {
    const CDG = {

        addMSGonReady: function() {
            console.log('Codigo Ready');
        },

        addMSGonResize: function() {
            console.log('Resized window');
        },

        addMSGonLoad: function() {
            console.log('Codigo Loaded');
        },

        /*
        * Modal
        */
		modal: function(modalID, action = 'show'){
            if(!modalID.startsWith("#")) {
                modalID = '#'+modalID;
            }
			if($(modalID).length) {
				$(modalID).modal(action)
			}
		},

        /*
        * ScrollMagic
        */
        scrollMagic: function(){
            $('article.card').each(function(){
                let $card = $(this);
                let id = $card.attr('id');

                new ScrollMagic.Scene({
                    triggerElement: "#"+id,
                    triggerHook: 0.6, // show, when scrolled 40% into view
                    offset: 50, // move trigger to center of element
                    reverse: false // only do once
                })
                .setClassToggle("#"+id, "visible") // add class to reveal
                .addTo(controller);
            });
		},
       
        onreadyFunctions: function() {
            //CDG.addMSGonReady();

            // if($('body.home').length > 0 ) {
            //     setTimeout(() => {
            //         CDG.modal('ctaModal', 'show');
            //     }, 3000);
            // }
            CDG.scrollMagic();

            $(window).on('resize',function() {
                //CDG.addMSGonResize();
            });
        },

        onloadFunctions: function() {
            //CDG.addMSGonLoad();
        }
    };

    $(document).on("ready",function($){
        CDG.onreadyFunctions();
    });

    $(window).on('load', function() {
        CDG.onloadFunctions();
    });

})( jQuery );