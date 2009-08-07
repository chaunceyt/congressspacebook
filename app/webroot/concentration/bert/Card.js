dojo.provide("bert.Card");

dojo.require("dijit._Widget");
dojo.require("dijit._Templated");
dojo.require("dojox.fx.flip");

dojo.declare("bert.Card", [dijit._Widget], {

    src: '',
    backSrc: 'card.png',
    clickEvent: null,
    
    flipped: false,

    postCreate: function() {

		var preload = new Image();
		preload.src = this.src;

        this.clickEvent = dojo.connect(this.domNode, 'onclick', this, "onClick");
           
    },
    
    onClick: function(e) {
        
        dojo.stopEvent(e);

        if (!readyToTurn || this.flipped) {
            return;   
        }

        cardsTurned++;
        activeCards[activeCards.length] = this;
        if (cardsTurned == 2) {
            readyToTurn = false;
        }
    
        var anim = dojox.fx.flip({ 
    		node: this.domNode,
    		dir: "right",
    		depth: .5,
    		endColor: "#fff",
    		duration:500
    	});
    	
		dojo.connect(anim, "onEnd", this, function(){ 

            this.domNode.childNodes[0].src = this.src;

            this.flipped = true;
            
            if (cardsTurned == 2) {
            
                if (activeCards[0].src == activeCards[1].src) {
    
                    setTimeout(function () {
    
                        activeCards[0].remove();
                        activeCards[1].remove();
                    
                        activeCards = [];
                        readyToTurn = true;
                        
                        matchesFound++;
                        
                        if (matchesFound == 12) {
                            youwin._load();
                        }
                    
                    }, 1000);
                    
                } else {
        
                    setTimeout(function () {
            
                        dijit.registry.byClass('bert.Card').forEach(function(card) {
            
                            if (card.flipped) {
                                card.flipBack();
                            }
                            
                        });
                        
                        cardsTurned = 0;
                        readyToTurn = true;
        
                    }, 1500);
                
                    activeCards = [];
                
                }
                
                cardsTurned = 0;
    
            }        

		});
        
        anim.play();
        
    },
    
    flipBack: function() {

        var anim = dojox.fx.flip({ 
    		node: this.domNode,
    		dir: "right",
    		depth: .5,
    		endColor: "#ffffff",
    		duration:500
    	});
    	
		dojo.connect(anim, "onEnd", this, function(){ 
            this.domNode.childNodes[0].src = this.backSrc;
		});
        
        anim.play();
        
        this.flipped = false;
        
    },
    
    remove: function() {
        
        dojo.style(this.domNode, 'background', '#fffff');
        var anim = dojo.fadeOut({ node: this.domNode.childNodes[0], duration:500 });
        anim.play();
        dojo.disconnect(this.clickEvent);
        this.flipped = false;
           
    }

});
