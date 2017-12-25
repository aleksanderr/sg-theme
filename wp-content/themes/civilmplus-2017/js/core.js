'use strict';

/* smoothscroll.min.js (polyfill) https://github.com/iamdustan/smoothscroll */!function(){"use strict";function o(o){var t=["MSIE ","Trident/","Edge/"];return new RegExp(t.join("|")).test(o)}function t(){function t(o,t){this.scrollLeft=o,this.scrollTop=t}function r(o){return.5*(1-Math.cos(Math.PI*o))}function i(o){if(null===o||"object"!=typeof o||void 0===o.behavior||"auto"===o.behavior||"instant"===o.behavior)return!0;if("object"==typeof o&&"smooth"===o.behavior)return!1;throw new TypeError("behavior member of ScrollOptions "+o.behavior+" is not a valid value for enumeration ScrollBehavior.")}function s(o,t){return"Y"===t?o.clientHeight+h<o.scrollHeight:"X"===t?o.clientWidth+h<o.scrollWidth:void 0}function c(o,t){var e=l.getComputedStyle(o,null)["overflow"+t];return"auto"===e||"scroll"===e}function n(o){var t=s(o,"Y")&&c(o,"Y"),l=s(o,"X")&&c(o,"X");return t||l}function f(o){var t;do{t=(o=o.parentNode)===e.body}while(!1===t&&!1===n(o));return t=null,o}function a(o){var t,e,i,s=(y()-o.startTime)/v;t=r(s=s>1?1:s),e=o.startX+(o.x-o.startX)*t,i=o.startY+(o.y-o.startY)*t,o.method.call(o.scrollable,e,i),e===o.x&&i===o.y||l.requestAnimationFrame(a.bind(l,o))}function p(o,r,i){var s,c,n,f,p=y();o===e.body?(s=l,c=l.scrollX||l.pageXOffset,n=l.scrollY||l.pageYOffset,f=u.scroll):(s=o,c=o.scrollLeft,n=o.scrollTop,f=t),a({scrollable:s,method:f,startTime:p,startX:c,startY:n,x:r,y:i})}if(!("scrollBehavior"in e.documentElement.style&&!0!==l.__forceSmoothScrollPolyfill__)){var d=l.HTMLElement||l.Element,v=468,h=o(l.navigator.userAgent)?1:0,u={scroll:l.scroll||l.scrollTo,scrollBy:l.scrollBy,elementScroll:d.prototype.scroll||t,scrollIntoView:d.prototype.scrollIntoView},y=l.performance&&l.performance.now?l.performance.now.bind(l.performance):Date.now;l.scroll=l.scrollTo=function(){void 0!==arguments[0]&&(!0!==i(arguments[0])?p.call(l,e.body,void 0!==arguments[0].left?~~arguments[0].left:l.scrollX||l.pageXOffset,void 0!==arguments[0].top?~~arguments[0].top:l.scrollY||l.pageYOffset):u.scroll.call(l,void 0!==arguments[0].left?arguments[0].left:"object"!=typeof arguments[0]?arguments[0]:l.scrollX||l.pageXOffset,void 0!==arguments[0].top?arguments[0].top:void 0!==arguments[1]?arguments[1]:l.scrollY||l.pageYOffset))},l.scrollBy=function(){void 0!==arguments[0]&&(i(arguments[0])?u.scrollBy.call(l,void 0!==arguments[0].left?arguments[0].left:"object"!=typeof arguments[0]?arguments[0]:0,void 0!==arguments[0].top?arguments[0].top:void 0!==arguments[1]?arguments[1]:0):p.call(l,e.body,~~arguments[0].left+(l.scrollX||l.pageXOffset),~~arguments[0].top+(l.scrollY||l.pageYOffset)))},d.prototype.scroll=d.prototype.scrollTo=function(){if(void 0!==arguments[0])if(!0!==i(arguments[0])){var o=arguments[0].left,t=arguments[0].top;p.call(this,this,void 0===o?this.scrollLeft:~~o,void 0===t?this.scrollTop:~~t)}else{if("number"==typeof arguments[0]&&void 0===arguments[1])throw new SyntaxError("Value couldn't be converted");u.elementScroll.call(this,void 0!==arguments[0].left?~~arguments[0].left:"object"!=typeof arguments[0]?~~arguments[0]:this.scrollLeft,void 0!==arguments[0].top?~~arguments[0].top:void 0!==arguments[1]?~~arguments[1]:this.scrollTop)}},d.prototype.scrollBy=function(){void 0!==arguments[0]&&(!0!==i(arguments[0])?this.scroll({left:~~arguments[0].left+this.scrollLeft,top:~~arguments[0].top+this.scrollTop,behavior:arguments[0].behavior}):u.elementScroll.call(this,void 0!==arguments[0].left?~~arguments[0].left+this.scrollLeft:~~arguments[0]+this.scrollLeft,void 0!==arguments[0].top?~~arguments[0].top+this.scrollTop:~~arguments[1]+this.scrollTop))},d.prototype.scrollIntoView=function(){if(!0!==i(arguments[0])){var o=f(this),t=o.getBoundingClientRect(),r=this.getBoundingClientRect();o!==e.body?(p.call(this,o,o.scrollLeft+r.left-t.left,o.scrollTop+r.top-t.top),"fixed"!==l.getComputedStyle(o).position&&l.scrollBy({left:t.left,top:t.top,behavior:"smooth"})):l.scrollBy({left:r.left,top:r.top,behavior:"smooth"})}else u.scrollIntoView.call(this,void 0===arguments[0]||arguments[0])}}}var l=window,e=document;"object"==typeof exports?module.exports={polyfill:t}:t()}();

var app = {
	init: function() {
		var ctrl = this;

		tools.backgrounds();
		tools.scrollTo();
		search.init();
		popups.init();
		filterDropdown.init();
		areas.init();
		headerScroll.init();
	}
}

var tools = {
	backgrounds: function() {

		$("[data-bg-src]").each(function() {
			var block = $(this);

			var src = block.attr('data-bg-src');
			var size = block.attr('data-bg-size') || "auto";
			var pos = block.attr('data-bg-pos') || "auto";
			var repeat = "no-repeat";

			block.css({
				'background-image': 'url('+ src +')',
				'background-size': size,
				'background-position': pos,
				'background-repeat': repeat
			});
		});
	},

	scrollTo: function() {
	    // Mozilla fix
	    // $('body,html').stop(true,true).animate({scrollTop: obj.offset().top - 110}, 500);

	    $('[data-scroll-to]').on('click', function(event) {
	    	event.preventDefault();
	    	var id = $(this).attr('data-scroll-to');
	    	var offset = document.getElementById(id).offsetTop;
	    	window.scroll({ top: offset, left: 0, behavior: 'smooth' });
	    });	    
	}
}

var search = {
	init: function() {
		var ctrl = this;

		ctrl.block = $('[data-search]');
		ctrl.form = $('[data-search-form]');
		ctrl.button = $('[data-search-button]');
		ctrl.field = $('[data-search-field]');
		ctrl.classOpened = "search_opened";

		ctrl.events();
	},

	events: function() {
		var ctrl = this;

		ctrl.button.on('click', function(event) {
			if ( ctrl.block.hasClass(ctrl.classOpened) && (ctrl.field.val() !== '') ) {
				ctrl.form.submit();
			} else {			
				ctrl.block.addClass(ctrl.classOpened);			
			}
		});

		$(document).mouseup(function (e){ 
			if (!ctrl.block .is(e.target) && ctrl.block .has(e.target).length === 0) { 
				ctrl.block.removeClass(ctrl.classOpened);
			}
		});
	}
}

var popups = {
	init: function() {
		var ctrl = this;
		ctrl.popups = $("[data-popup]");
		ctrl.classActive = "popup_active";
		ctrl.isOpened = false;
		ctrl.events();
	},
	open: function(popup) {
		var ctrl = this;
		
		ctrl.popups.filter("[data-popup='" + popup + "']").addClass(ctrl.classActive);
		ctrl.isOpened = true;

		$("body").addClass('popup-opened');
	},
	close: function() {
		var ctrl = this;

		ctrl.popups.removeClass(ctrl.classActive);
		ctrl.isOpened = false;
		
		$("body").removeClass('popup-opened');
	},
	events: function() {
		var ctrl = this;

		$('[data-popup-open]').on('click', function () {
			var popup = $(this).data("popup-open");
			console.log("popup", popup);
			ctrl.open(popup);
		});

		$('[data-popup-close]').on('click', function () {
			ctrl.close();
		});

		/*$(document).on("mouseup", function (e) {
			if (ctrl.isOpened) {
				if (!ctrl.popups.is(e.target) && ctrl.popups.has(e.target).length === 0) {
					ctrl.close();
				}
			}
		});*/
	}
};

var filterDropdown = {
	init: function() {
		var ctrl = this;
		ctrl.dropdown = $('[data-dropdown]');
		ctrl.toggle = $('[data-dropdown-toggle]');
		ctrl.openedClass = "filter-dropdown_opened";
		ctrl.isOpened = false;

		ctrl.events();
	},

	events: function() {
		var ctrl = this;

		ctrl.toggle.on('click', function(event) {
			event.preventDefault();
			ctrl.togglee();
		});

		$(document).on("click", function (e) {			
			if (!ctrl.dropdown.is(e.target) && ctrl.dropdown.has(e.target).length === 0) {
				if (ctrl.isOpened) {
					ctrl.togglee();
				}
			}
		});
	},

	togglee: function() {
		var ctrl = this;
		ctrl.dropdown.toggleClass(ctrl.openedClass);
		ctrl.isOpened = !ctrl.isOpened;
	}
};

var areas = {
	init: function() {
		var ctrl = this;

		ctrl.parent = $('[data-areas]');
		ctrl.content = $('[data-areas-content]');
		ctrl.button = $('[data-areas-toggle]');
		ctrl.classOpened = "areas-dropdown_opened";
		ctrl.labelExpand = $('[data-areas-label-expand]');
		ctrl.labelCollapse = $('[data-areas-label-collapse]');
		ctrl.labelCollapse.hide();	
		ctrl.events();

		if (ctrl.content.height() > 350) {
			ctrl.content.height(350);
			ctrl.labelCollapse.hide();
		} else {				
			ctrl.button.hide();
		}

	},
	events: function() {
		var ctrl = this;

		ctrl.button.on('click', function() {
			ctrl.parent.toggleClass(ctrl.classOpened);

			if (ctrl.parent.hasClass(ctrl.classOpened)) {				
				ctrl.content.attr('style', '');
				var height = ctrl.content.height();
				ctrl.content.height(350);
				ctrl.content.animate({height: height}, 400);	
				ctrl.labelExpand.hide();			
				ctrl.labelCollapse.show();			
			} else {
				ctrl.content.animate({height: 350}, 400)
				ctrl.labelCollapse.hide();
				ctrl.labelExpand.show();						
			}
			
		});
	}
}

var headerScroll = {
	init: function() {
		var ctrl = this;
		ctrl.header = $('.header');
		ctrl.classLight = 'header_light';
		ctrl.events();
	},

	events: function() {
		var ctrl = this;

		$(window).on('scroll load', function() {
			var top = $(document).scrollTop();
			
			if ( top > 150 ) {
				ctrl.header.addClass(ctrl.classLight);
			} else {
				ctrl.header.removeClass(ctrl.classLight);
			}

		});
	}
}

$(document).ready(function() {
	app.init();
});