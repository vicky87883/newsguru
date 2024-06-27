(function(c){var d,a,b;d={speed:700,pause:4000,showItems:1,mousePause:true,height:0,animate:true,margin:0,padding:0,startPaused:false,autoAppend:true};a={moveUp:function(e,f){return a.showNextItem(e,f,"up")},moveDown:function(e,f){return a.showNextItem(e,f,"down")},nextItemState:function(g,f){var e,h;h=g.element.children("ul");e=g.itemHeight;if(g.options.height>0){e=h.children("li:first").height()}e+=g.options.margin+g.options.padding*2;return{height:e,options:g.options,el:g.element,obj:h,selector:f==="up"?"li:first":"li:last",dir:f}},showNextItem:function(g,h,e){var i,f;f=a.nextItemState(g,e);f.el.trigger("vticker.beforeTick");i=f.obj.children(f.selector).clone(true);if(f.dir==="down"){f.obj.css("top","-"+f.height+"px").prepend(i)}if(h&&h.animate){if(!g.animating){a.animateNextItem(f,g)}}else{a.nonAnimatedNextItem(f)}if(f.dir==="up"&&g.options.autoAppend){i.appendTo(f.obj)}return f.el.trigger("vticker.afterTick")},animateNextItem:function(f,g){var e;g.animating=true;e=f.dir==="up"?{top:"-="+f.height+"px"}:{top:0};return f.obj.animate(e,g.options.speed,function(){c(f.obj).children(f.selector).remove();c(f.obj).css("top","0px");return g.animating=false})},nonAnimatedNextItem:function(e){e.obj.children(e.selector).remove();return e.obj.css("top","0px")},nextUsePause:function(){var e,f;f=c(this).data("state");e=f.options;if(f.isPaused||a.hasSingleItem(f)){return}return b.next.call(this,{animate:e.animate})},startInterval:function(){var e,f;f=c(this).data("state");e=f.options;return f.intervalId=setInterval((function(g){return function(){return a.nextUsePause.call(g)}})(this),e.pause)},stopInterval:function(){var e;if(!(e=c(this).data("state"))){return}if(e.intervalId){clearInterval(e.intervalId)}return e.intervalId=void 0},restartInterval:function(){a.stopInterval.call(this);return a.startInterval.call(this)},getState:function(g,e){var f;if(!(f=c(e).data("state"))){throw new Error("vTicker: No state available from "+g)}return f},isAnimatingOrSingleItem:function(e){return e.animating||this.hasSingleItem(e)},hasMultipleItems:function(e){return e.itemCount>1},hasSingleItem:function(e){return !a.hasMultipleItems(e)},bindMousePausing:(function(e){return function(f,g){return f.bind("mouseenter",function(){if(g.isPaused){return}g.pausedByCode=true;a.stopInterval.call(this);return b.pause.call(this,true)}).bind("mouseleave",function(){if(g.isPaused&&!g.pausedByCode){return}g.pausedByCode=false;b.pause.call(this,false);return a.startInterval.call(this)})}})(this),setItemLayout:function(f,h,e){var g;f.css({overflow:"hidden",position:"relative"}).children("ul").css({position:"absolute",margin:0,padding:0}).children("li").css({margin:e.margin,padding:e.padding});if(isNaN(e.height)||e.height===0){f.children("ul").children("li").each(function(){if(c(this).height()>h.itemHeight){return h.itemHeight=c(this).height()}});f.children("ul").children("li").each(function(){return c(this).height(h.itemHeight)});g=e.margin+e.padding*2;return f.height((h.itemHeight+g)*e.showItems+e.margin)}else{return f.height(e.height)}},defaultStateAttribs:function(f,e){return{itemCount:f.children("ul").children("li").length,itemHeight:0,itemMargin:0,element:f,animating:false,options:e,isPaused:e.startPaused,pausedByCode:false}}};b={init:function(e){var h,f,g;if(g=c(this).data("state")){b.stop.call(this)}g=null;h=jQuery.extend({},d);e=c.extend(h,e);f=c(this);g=a.defaultStateAttribs(f,e);c(this).data("state",g);a.setItemLayout(f,g,e);if(!e.startPaused){a.startInterval.call(this)}if(e.mousePause){return a.bindMousePausing(f,g)}},pause:function(g){var e,f;f=a.getState("pause",this);if(!a.hasMultipleItems(f)){return false}f.isPaused=g;e=f.element;if(g){c(this).addClass("paused");return e.trigger("vticker.pause")}else{c(this).removeClass("paused");return e.trigger("vticker.resume")}},next:function(f){var e;e=a.getState("next",this);if(a.isAnimatingOrSingleItem(e)){return false}a.restartInterval.call(this);return a.moveUp(e,f)},prev:function(f){var e;e=a.getState("prev",this);if(a.isAnimatingOrSingleItem(e)){return false}a.restartInterval.call(this);return a.moveDown(e,f)},stop:function(){var e;e=a.getState("stop",this);return a.stopInterval.call(this)},remove:function(){var e,f;f=a.getState("remove",this);a.stopInterval.call(this);e=f.element;e.unbind();return e.remove()}};return c.fn.vTicker=function(e){if(b[e]){return b[e].apply(this,Array.prototype.slice.call(arguments,1))}if(typeof e==="object"||!e){return b.init.apply(this,arguments)}return c.error("Method "+e+" does not exist on jQuery.vTicker")}})(jQuery);