!function(e){var n={};function a(i){if(n[i])return n[i].exports;var t=n[i]={i:i,l:!1,exports:{}};return e[i].call(t.exports,t,t.exports,a),t.l=!0,t.exports}a.m=e,a.c=n,a.d=function(e,n,i){a.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:i})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,n){if(1&n&&(e=a(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(a.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var t in e)a.d(i,t,function(n){return e[n]}.bind(null,t));return i},a.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(n,"a",n),n},a.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},a.p="/",a(a.s=1)}({1:function(e,n,a){e.exports=a("Za7F")},Za7F:function(e,n){!function(e,n,a){"use strict";var i=.01*e.innerHeight;n.documentElement.style.setProperty("--vh","".concat(i,"px")),a.app=a.app||{};var t=a("body"),s=a(e),o=a('div[data-menu="menu-wrapper"]').html(),l=a('div[data-menu="menu-wrapper"]').attr("class");a.app.menu={expanded:null,collapsed:null,hidden:null,container:null,horizontalMenu:!1,manualScroller:{obj:null,init:function(){a(".main-menu").hasClass("menu-dark");this.obj=new PerfectScrollbar(".main-menu-content",{suppressScrollX:!0,wheelPropagation:!1})},update:function(){if(this.obj){if(!0===a(".main-menu").data("scroll-to-active")){var e,i,s;if(e=n.querySelector(".main-menu-content li.active"),t.hasClass("menu-collapsed"))a(".main-menu-content li.sidebar-group-active").length&&(e=n.querySelector(".main-menu-content li.sidebar-group-active"));else if(i=n.querySelector(".main-menu-content"),e&&(s=e.getBoundingClientRect().top+i.scrollTop),s>parseInt(2*i.clientHeight/3))var o=s-i.scrollTop-parseInt(i.clientHeight/2);setTimeout((function(){a.app.menu.container.stop().animate({scrollTop:o},300),a(".main-menu").data("scroll-to-active","false")}),300)}this.obj.update()}},enable:function(){a(".main-menu-content").hasClass("ps")||this.init()},disable:function(){this.obj&&this.obj.destroy()},updateHeight:function(){"vertical-menu"!=t.data("menu")&&"vertical-menu-modern"!=t.data("menu")&&"vertical-overlay-menu"!=t.data("menu")||!a(".main-menu").hasClass("menu-fixed")||(a(".main-menu-content").css("height",a(e).height()-a(".header-navbar").height()-a(".main-menu-header").outerHeight()-a(".main-menu-footer").outerHeight()),this.update())}},init:function(e){if(a(".main-menu-content").length>0){this.container=a(".main-menu-content");var n="";if(!0===e&&(n="collapsed"),"vertical-menu-modern"==t.data("menu")){this.change(n)}else this.change(n)}},drillDownMenu:function(e){a(".drilldown-menu").length&&("sm"==e||"xs"==e?"true"==a("#navbar-mobile").attr("aria-expanded")&&a(".drilldown-menu").slidingMenu({backLabel:!0}):a(".drilldown-menu").slidingMenu({backLabel:!0}))},change:function(n){var i=Unison.fetch.now();this.reset();var s,o,l=t.data("menu");if(i)switch(i.name){case"xl":"vertical-overlay-menu"===l?this.hide():"collapsed"===n?this.collapse(n):this.expand();break;case"lg":"vertical-overlay-menu"===l||"vertical-menu-modern"===l||"horizontal-menu"===l?this.hide():this.collapse();break;case"md":case"sm":case"xs":this.hide()}"vertical-menu"!==l&&"vertical-menu-modern"!==l||this.toOverlayMenu(i.name,l),t.is(".horizontal-layout")&&!t.hasClass(".horizontal-menu-demo")&&(this.changeMenu(i.name),a(".menu-toggle").removeClass("is-active")),"horizontal-menu"!=l&&this.drillDownMenu(i.name),"xl"==i.name&&(a('body[data-open="hover"] .header-navbar .dropdown').on("mouseenter",(function(){a(this).hasClass("show")?a(this).removeClass("show"):a(this).addClass("show")})).on("mouseleave",(function(e){a(this).removeClass("show")})),a('body[data-open="hover"] .dropdown a').on("click",(function(e){if("horizontal-menu"==l&&a(this).hasClass("dropdown-toggle"))return!1}))),a(".header-navbar").hasClass("navbar-brand-center")&&a(".header-navbar").attr("data-nav","brand-center"),"sm"==i.name||"xs"==i.name?a(".header-navbar[data-nav=brand-center]").removeClass("navbar-brand-center"):a(".header-navbar[data-nav=brand-center]").addClass("navbar-brand-center"),"xl"==i.name&&"horizontal-menu"==l&&a(".main-menu-content").find("li.active").parents("li").addClass("sidebar-group-active active"),"xl"!==i.name&&"horizontal-menu"==l&&a("#navbar-type").toggleClass("d-none d-xl-block"),a("ul.dropdown-menu [data-toggle=dropdown]").on("click",(function(e){a(this).siblings("ul.dropdown-menu").length>0&&e.preventDefault(),e.stopPropagation(),a(this).parent().siblings().removeClass("show"),a(this).parent().toggleClass("show")})),"horizontal-menu"==l&&(a("li.dropdown-submenu").on("mouseenter",(function(){a(this).parent(".dropdown").hasClass("show")||a(this).removeClass("openLeft");var n=a(this).find(".dropdown-menu");if(n.length>0){var i=a(e).height(),t=a(this).position().top,s=n.offset().left,o=n.width();if(i-t-n.height()-28<1){var l=i-t-170;a(this).find(".dropdown-menu").css({"max-height":l+"px","overflow-y":"auto","overflow-x":"hidden"});new PerfectScrollbar("li.dropdown-submenu.show .dropdown-menu",{wheelPropagation:!1})}s+o-(e.innerWidth-16)>=0&&a(this).addClass("openLeft")}})),a(".theme-layouts").find(".semi-dark").hide(),a("#customizer-navbar-colors").hide()),"vertical-menu"!==l&&"vertical-overlay-menu"!==l||(jQuery.expr[":"].Contains=function(e,n,a){return(e.textContent||e.innerText||"").toUpperCase().indexOf(a[3].toUpperCase())>=0},s=a("#main-menu-navigation"),o=a(".menu-search"),a(o).change((function(){var e=a(this).val();if(e){a(".navigation-header").hide(),a(s).find("li a:not(:Contains("+e+"))").hide().parent().hide();var n=a(s).find("li a:Contains("+e+")");n.parent().hasClass("has-sub")?(n.show().parents("li").show().addClass("open").closest("li").children("a").show().children("li").show(),n.siblings("ul").length>0&&n.siblings("ul").children("li").show().children("a").show()):n.show().parents("li").show().addClass("open").closest("li").children("a").show()}else a(".navigation-header").show(),a(s).find("li a").show().parent().show().removeClass("open");return a.app.menu.manualScroller.update(),!1})).keyup((function(){a(this).change()})))},transit:function(e,n){var i=this;t.addClass("changing-menu"),e.call(i),t.hasClass("vertical-layout")&&(t.hasClass("menu-open")||t.hasClass("menu-expanded")?(a(".menu-toggle").addClass("is-active"),"vertical-menu"===t.data("menu")&&a(".main-menu-header")&&a(".main-menu-header").show()):(a(".menu-toggle").removeClass("is-active"),"vertical-menu"===t.data("menu")&&a(".main-menu-header")&&a(".main-menu-header").hide())),setTimeout((function(){n.call(i),t.removeClass("changing-menu"),i.update()}),500)},open:function(){this.transit((function(){t.removeClass("menu-hide menu-collapsed").addClass("menu-open"),this.hidden=!1,this.expanded=!0,t.hasClass("vertical-overlay-menu")&&(a(".sidenav-overlay").removeClass("d-none").addClass("d-block"),a("body").css("overflow","hidden"))}),(function(){!a(".main-menu").hasClass("menu-native-scroll")&&a(".main-menu").hasClass("menu-fixed")&&(this.manualScroller.enable(),a(".main-menu-content").css("height",a(e).height()-a(".header-navbar").height()-a(".main-menu-header").outerHeight()-a(".main-menu-footer").outerHeight())),t.hasClass("vertical-overlay-menu")||(a(".sidenav-overlay").removeClass("d-block d-none"),a("body").css("overflow","auto"))}))},hide:function(){this.transit((function(){t.removeClass("menu-open menu-expanded").addClass("menu-hide"),this.hidden=!0,this.expanded=!1,t.hasClass("vertical-overlay-menu")&&(a(".sidenav-overlay").removeClass("d-block").addClass("d-none"),a("body").css("overflow","auto"))}),(function(){!a(".main-menu").hasClass("menu-native-scroll")&&a(".main-menu").hasClass("menu-fixed")&&this.manualScroller.enable(),t.hasClass("vertical-overlay-menu")||(a(".sidenav-overlay").removeClass("d-block d-none"),a("body").css("overflow","auto"))}))},expand:function(){!1===this.expanded&&("vertical-menu-modern"==t.data("menu")&&a(".modern-nav-toggle").find(".toggle-icon").removeClass("feather icon-circle").addClass("feather icon-disc"),this.transit((function(){t.removeClass("menu-collapsed").addClass("menu-expanded"),this.collapsed=!1,this.expanded=!0,a(".sidenav-overlay").removeClass("d-block d-none")}),(function(){a(".main-menu").hasClass("menu-native-scroll")||"horizontal-menu"==t.data("menu")?this.manualScroller.disable():a(".main-menu").hasClass("menu-fixed")&&this.manualScroller.enable(),"vertical-menu"!=t.data("menu")&&"vertical-menu-modern"!=t.data("menu")||!a(".main-menu").hasClass("menu-fixed")||a(".main-menu-content").css("height",a(e).height()-a(".header-navbar").height()-a(".main-menu-header").outerHeight()-a(".main-menu-footer").outerHeight())})))},collapse:function(n){!1===this.collapsed&&("vertical-menu-modern"==t.data("menu")&&a(".modern-nav-toggle").find(".toggle-icon").removeClass("feather icon-disc").addClass("feather icon-circle"),this.transit((function(){t.removeClass("menu-expanded").addClass("menu-collapsed"),this.collapsed=!0,this.expanded=!1,a(".content-overlay").removeClass("d-block d-none")}),(function(){"horizontal-menu"==t.data("menu")&&t.hasClass("vertical-overlay-menu")&&a(".main-menu").hasClass("menu-fixed")&&this.manualScroller.enable(),"vertical-menu"!=t.data("menu")&&"vertical-menu-modern"!=t.data("menu")||!a(".main-menu").hasClass("menu-fixed")||a(".main-menu-content").css("height",a(e).height()-a(".header-navbar").height()),"vertical-menu-modern"==t.data("menu")&&a(".main-menu").hasClass("menu-fixed")&&this.manualScroller.enable()})))},toOverlayMenu:function(e,n){var a=t.data("menu");"vertical-menu-modern"==n?"lg"==e||"md"==e||"sm"==e||"xs"==e?t.hasClass(a)&&t.removeClass(a).addClass("vertical-overlay-menu"):t.hasClass("vertical-overlay-menu")&&t.removeClass("vertical-overlay-menu").addClass(a):"sm"==e||"xs"==e?t.hasClass(a)&&t.removeClass(a).addClass("vertical-overlay-menu"):t.hasClass("vertical-overlay-menu")&&t.removeClass("vertical-overlay-menu").addClass(a)},changeMenu:function(e){a('div[data-menu="menu-wrapper"]').html(""),a('div[data-menu="menu-wrapper"]').html(o);var n=a('div[data-menu="menu-wrapper"]'),i=(a('div[data-menu="menu-container"]'),a('ul[data-menu="menu-navigation"]')),s=a('li[data-menu="dropdown"]'),r=a('li[data-menu="dropdown-submenu"]');"xl"===e?(t.removeClass("vertical-layout vertical-overlay-menu fixed-navbar").addClass(t.data("menu")),a("nav.header-navbar").removeClass("fixed-top"),n.removeClass().addClass(l),this.drillDownMenu(e),a("a.dropdown-item.nav-has-children").on("click",(function(){event.preventDefault(),event.stopPropagation()})),a("a.dropdown-item.nav-has-parent").on("click",(function(){event.preventDefault(),event.stopPropagation()}))):(t.removeClass(t.data("menu")).addClass("vertical-layout vertical-overlay-menu fixed-navbar"),a("nav.header-navbar").addClass("fixed-top"),n.removeClass().addClass("main-menu menu-light menu-fixed menu-shadow"),i.removeClass().addClass("navigation navigation-main"),s.removeClass("dropdown").addClass("has-sub"),s.find("a").removeClass("dropdown-toggle nav-link"),s.children("ul").find("a").removeClass("dropdown-item"),s.find("ul").removeClass("dropdown-menu"),r.removeClass().addClass("has-sub"),a.app.nav.init(),a("ul.dropdown-menu [data-toggle=dropdown]").on("click",(function(e){e.preventDefault(),e.stopPropagation(),a(this).parent().siblings().removeClass("open"),a(this).parent().toggleClass("open")})),a(".main-menu-content").find("li.active").parents("li").addClass("sidebar-group-active"),a(".main-menu-content").find("li.active").closest("li.nav-item").addClass("open"))},toggle:function(){var e=Unison.fetch.now(),n=(this.collapsed,this.expanded),a=this.hidden,i=t.data("menu");switch(e.name){case"xl":!0===n?"vertical-overlay-menu"==i?this.hide():this.collapse():"vertical-overlay-menu"==i?this.open():this.expand();break;case"lg":!0===n?"vertical-overlay-menu"==i||"vertical-menu-modern"==i||"horizontal-menu"==i?this.hide():this.collapse():"vertical-overlay-menu"==i||"vertical-menu-modern"==i||"horizontal-menu"==i?this.open():this.expand();break;case"md":case"sm":case"xs":!0===a?this.open():this.hide()}this.drillDownMenu(e.name)},update:function(){this.manualScroller.update()},reset:function(){this.expanded=!1,this.collapsed=!1,this.hidden=!1,t.removeClass("menu-hide menu-open menu-collapsed menu-expanded")}},a.app.nav={container:a(".navigation-main"),initialized:!1,navItem:a(".navigation-main").find("li").not(".navigation-category"),config:{speed:300},init:function(e){this.initialized=!0,a.extend(this.config,e),this.bind_events()},bind_events:function(){var e=this;a(".navigation-main").on("mouseenter.app.menu","li",(function(){var n=a(this);if(a(".hover",".navigation-main").removeClass("hover"),t.hasClass("menu-collapsed")&&"vertical-menu-modern"!=t.data("menu")){a(".main-menu-content").children("span.menu-title").remove(),a(".main-menu-content").children("a.menu-title").remove(),a(".main-menu-content").children("ul.menu-content").remove();var i,s,o,l=n.find("span.menu-title").clone();if(n.hasClass("has-sub")||(i=n.find("span.menu-title").text(),s=n.children("a").attr("href"),""!==i&&((l=a("<a>")).attr("href",s),l.attr("title",i),l.text(i),l.addClass("menu-title"))),o=n.css("border-top")?n.position().top+parseInt(n.css("border-top"),10):n.position().top,"vertical-compact-menu"!==t.data("menu")&&l.appendTo(".main-menu-content").css({position:"fixed",top:o}),n.hasClass("has-sub")&&n.hasClass("nav-item")){n.children("ul:first");e.adjustSubmenu(n)}}n.addClass("hover")})).on("mouseleave.app.menu","li",(function(){})).on("active.app.menu","li",(function(e){a(this).addClass("active"),e.stopPropagation()})).on("deactive.app.menu","li.active",(function(e){a(this).removeClass("active"),e.stopPropagation()})).on("open.app.menu","li",(function(n){var i=a(this);if(i.addClass("open"),e.expand(i),a(".main-menu").hasClass("menu-collapsible"))return!1;i.siblings(".open").find("li.open").trigger("close.app.menu"),i.siblings(".open").trigger("close.app.menu"),n.stopPropagation()})).on("close.app.menu","li.open",(function(n){var i=a(this);i.removeClass("open"),e.collapse(i),n.stopPropagation()})).on("click.app.menu","li",(function(e){var n=a(this);n.is(".disabled")?e.preventDefault():t.hasClass("menu-collapsed")&&"vertical-menu-modern"!=t.data("menu")?e.preventDefault():n.has("ul").length?n.is(".open")?n.trigger("close.app.menu"):n.trigger("open.app.menu"):n.is(".active")||(n.siblings(".active").trigger("deactive.app.menu"),n.trigger("active.app.menu")),e.stopPropagation()})),a(".navbar-header, .main-menu").on("mouseenter",(function(){if("vertical-menu-modern"==t.data("menu")&&(a(".main-menu, .navbar-header").addClass("expanded"),t.hasClass("menu-collapsed"))){0===a(".main-menu li.open").length&&a(".main-menu-content").find("li.active").parents("li").addClass("open");var e=a(".main-menu li.menu-collapsed-open");e.children("ul").hide().slideDown(200,(function(){a(this).css("display","")})),e.addClass("open").removeClass("menu-collapsed-open")}})).on("mouseleave",(function(){t.hasClass("menu-collapsed")&&"vertical-menu-modern"==t.data("menu")&&setTimeout((function(){if(0===a(".main-menu:hover").length&&0===a(".navbar-header:hover").length&&(a(".main-menu, .navbar-header").removeClass("expanded"),t.hasClass("menu-collapsed"))){var e=a(".main-menu li.open"),n=e.children("ul");e.addClass("menu-collapsed-open"),n.show().slideUp(200,(function(){a(this).css("display","")})),e.removeClass("open")}}),1)})),a(".main-menu-content").on("mouseleave",(function(){t.hasClass("menu-collapsed")&&(a(".main-menu-content").children("span.menu-title").remove(),a(".main-menu-content").children("a.menu-title").remove(),a(".main-menu-content").children("ul.menu-content").remove()),a(".hover",".navigation-main").removeClass("hover")})),a(".navigation-main li.has-sub > a").on("click",(function(e){e.preventDefault()})),a("ul.menu-content").on("click","li",(function(n){var i=a(this);if(i.is(".disabled"))n.preventDefault();else if(i.has("ul"))if(i.is(".open"))i.removeClass("open"),e.collapse(i);else{if(i.addClass("open"),e.expand(i),a(".main-menu").hasClass("menu-collapsible"))return!1;i.siblings(".open").find("li.open").trigger("close.app.menu"),i.siblings(".open").trigger("close.app.menu"),n.stopPropagation()}else i.is(".active")||(i.siblings(".active").trigger("deactive.app.menu"),i.trigger("active.app.menu"));n.stopPropagation()}))},adjustSubmenu:function(e){var n,i,t,o,l,r=e.children("ul:first"),d=r.clone(!0);a(".main-menu-header").height(),n=e.position().top,t=s.height()-a(".header-navbar").height(),l=0,r.height(),parseInt(e.css("border-top"),10)>0&&(l=parseInt(e.css("border-top"),10)),o=t-n-e.height()-30,a(".main-menu").hasClass("menu-dark"),i=n+e.height()+l,d.addClass("menu-popout").appendTo(".main-menu-content").css({top:i,position:"fixed","max-height":o});new PerfectScrollbar(".main-menu-content > ul.menu-content",{wheelPropagation:!1})},collapse:function(e,n){e.children("ul").show().slideUp(a.app.nav.config.speed,(function(){a(this).css("display",""),a(this).find("> li").removeClass("is-shown"),n&&n(),a.app.nav.container.trigger("collapsed.app.menu")}))},expand:function(e,n){var i=e.children("ul"),t=i.children("li").addClass("is-hidden");i.hide().slideDown(a.app.nav.config.speed,(function(){a(this).css("display",""),n&&n(),a.app.nav.container.trigger("expanded.app.menu")})),setTimeout((function(){t.addClass("is-shown"),t.removeClass("is-hidden")}),0)},refresh:function(){a.app.nav.container.find(".open").removeClass("open")}}}(window,document,jQuery),window.addEventListener("resize",(function(){var e=.01*window.innerHeight;document.documentElement.style.setProperty("--vh","".concat(e,"px"))}))}});