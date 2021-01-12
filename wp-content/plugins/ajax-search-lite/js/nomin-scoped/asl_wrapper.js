(function(jQuery, $, window){
// INIT CODE
// INIT CODE

// Use the window to make sure it is in the main scope, I do not trust IE
window.ASL = window.ASL || {};

window.ASL.getScope = function() {
    /**
     * Explanation:
     * If the sript is scoped, the first argument is always passed in a localized jQuery
     * variable, while the actual parameter can be aspjQuery or jQuery (or anything) as well.
     */
    if (typeof jQuery !== "undefined") {
        // Is there more than one jQuery? Let's try to find the one where ajax search pro is added
        if ( typeof jQuery.fn.ajaxsearchlite == 'undefined' ) {
            // Let's try noconflicting through all the versions
            var temp = jQuery;
            var original = jQuery;
            for (var i = 0; i < 10; i++) {
                if (typeof temp.fn.ajaxsearchlite == 'undefined') {
                    temp = jQuery.noConflict(true);
                } else {
                    // Restore the globals to the initial, original one
                    if ( temp.fn.jquery != original.fn.jquery ) {
                        window.jQuery = window.$ = original;
                    }
                    return temp;
                }
            }
        } else {
            return jQuery;
        }
    }

    // The code should never reach this point, but sometimes magic happens (unloaded or undefined jQuery??)
    // .. I am almost positive at this point this is going to fail anyways, but worth a try.
    if (typeof window[ASL.js_scope] !== "undefined")
        return window[ASL.js_scope];
    else
        return eval(ASL.js_scope);
};

window.ASL.initialized = false;

// Call this function if you need to initialize an instance that is printed after an AJAX call
// Calling without an argument initializes all instances found.
window.ASL.initialize = function(id) {
    // this here is either window.ASL or window._ASL
    var _this = this;

    // Some weird ajax loader problem prevention
    if ( typeof _this.getScope == 'undefined' )
        return false;

    // Yeah I could use $ or jQuery as the scope variable, but I like to avoid magical errors..
    var scope = _this.getScope();
    var selector = ".asl_init_data";

    if ((typeof ASL_INSTANCES != "undefined") && Object.keys(ASL_INSTANCES).length > 0) {
        scope.each(ASL_INSTANCES, function(k, v){
            if ( typeof v == "undefined" ) return false;
            // Return if it is already initialized
            if ( scope("#ajaxsearchlite" + k).hasClass("hasASL") )
                return false;
            else
                scope("#ajaxsearchlite" + k).addClass("hasASL");

            return scope("#ajaxsearchlite" + k).ajaxsearchlite(v);
        });
    } else {
        if (typeof id !== 'undefined')
            selector = "div[id*=asl_init_id_" + id + "]";

        function b64_utf8_decode(utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;

            while ( i < utftext.length ) {

                c = utftext.charCodeAt(i);

                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                }
                else if((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i+1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                }
                else {
                    c2 = utftext.charCodeAt(i+1);
                    c3 = utftext.charCodeAt(i+2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }

            }

            return string;
        }

        function b64_decode(input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;
            var _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            while (i < input.length) {

                enc1 = _keyStr.indexOf(input.charAt(i++));
                enc2 = _keyStr.indexOf(input.charAt(i++));
                enc3 = _keyStr.indexOf(input.charAt(i++));
                enc4 = _keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

            }
            output = b64_utf8_decode(output);
            return output;
        }

        /**
         * Getting around inline script declarations with this solution.
         * So these new, invisible divs contains a JSON object with the parameters.
         * Parse all of them and do the declaration.
         */
        scope(selector).each(function (index, value) {
            var rid = scope(this).attr('id').match(/^asl_init_id_(.*)/)[1];

            var jsonData = scope(this).data("asldata");
            if (typeof jsonData === "undefined") return false;

            jsonData = b64_decode(jsonData);
            if (typeof jsonData === "undefined" || jsonData == "") return false;

            var args = JSON.parse(jsonData);
            scope("#ajaxsearchlite" + rid).addClass('hasASL');

            return scope("#ajaxsearchlite" + rid).ajaxsearchlite(args);
        });
    }

    _this.initialized = true;
};

window.ASL.fixClones = function() {
    var _this = this;
    _this.fix_duplicates = _this.fix_duplicates || 0;
    if ( _this.fix_duplicates == 0 )
        return false;

    if ( typeof _this.getScope == 'undefined' )
        return false;
    var scope = _this.getScope();

    var inst = {};
    var selector = ".asl_init_data";

    scope(selector).each(function(){
        var rid =  scope(this).attr('id').match(/^asl_init_id_(.*)/)[1];
        if ( typeof inst[rid] == 'undefined' ) {
            inst[rid] = {
                'rid'  : rid,
                'id'  : rid,
                'count': 1
            };
        } else {
            inst[rid].count++;
        }
    });

    scope.each(inst, function(k, v){
        // Same instance, but more copies
        if ( v.count > 1 ) {
            scope('.asl_m_' + v.rid).each(function(kk, vv){
                if ( kk == 0 ) return true;
                var parent = scope(this).parent();
                var n_rid = v.id;
                while ( scope('#ajaxsearchlite' + n_rid).length != 0 ) {
                    n_rid++;
                }
                // Main box
                scope(this).attr('id', 'ajaxsearchlite' + n_rid);
                scope(this).removeClass('asl_m_' + v.rid).addClass('asl_m_' + n_rid);
                scope(this).removeClass('hasASL');
                // Results box
                // Check if the cloning did make a copy before init, if not, make a results box
                if ( scope('.asl_r_'+v.rid, this).length == 0 ) {
                    scope('.asl_r_'+v.rid).clone().appendTo(scope(this));
                }
                scope('.asl_r_'+v.rid, this).attr('id', 'ajaxsearchliteres'+n_rid);
                scope('.asl_r_'+v.rid, this).attr('data-id', n_rid);
                scope('.asl_r_'+v.rid, this).removeClass('asl_r_'+v.rid).addClass('asl_r_'+n_rid);
                if ( typeof(ASL.resHTML) != 'undefined' ) {
                    scope('#ajaxsearchliteres'+n_rid).html(ASL.resHTML);
                }
                // Settings box
                // Check if the cloning did make a copy before init, if not, make a settings box
                if ( scope('.asl_s_'+v.rid, this).length == 0 && scope('.asl_s_'+v.rid).length != 0 ) {
                    scope('.asl_s_'+v.rid).clone().appendTo(scope(this));
                }
                if ( scope('.asl_sb_'+v.rid, this).length == 0 && scope('.asl_sb_'+v.rid).length != 0 ) {
                    scope('.asl_sb_'+v.rid).clone().appendTo(scope(this));
                }
                scope('.asl_s_'+v.rid, this).attr('id', 'ajaxsearchlitesettings'+n_rid);
                if ( typeof(ASL.setHTML) != 'undefined' ) {
                    scope('#ajaxsearchlitesettings'+n_rid).html(ASL.setHTML);
                }
                scope('.asl_sb_'+v.rid, parent).attr('id', 'ajaxsearchlitebsettings'+n_rid);
                if ( typeof(ASL.setHTML) != 'undefined' ) {
                    scope('#ajaxsearchlitebsettings'+n_rid).html(ASL.setHTML);
                }
                // Other data
                if ( scope('.asl_hidden_data', parent).length > 0 )
                    scope('.asl_hidden_data', parent).attr('id', 'asl_hidden_data_'+n_rid);
                if ( scope('.asl_init_data', parent).length > 0 )
                    scope('.asl_init_data', parent).attr('id', 'asl_init_id_'+n_rid);

                _this.initialize(n_rid);
            });
        }
    });
};

window.ASL.ready = function() {
    var _this = this;
    var scope = _this.getScope();
    var t = null;

    scope(document).ready(function () {
        _this.initialize();
        setTimeout(function(){
            _this.fixClones();
        }, 2500);
    });

    // Redundancy for safety
    scope(window).on('load', function () {
        // It should be initialized at this point, but you never know..
        if ( !_this.initialized ) {
            _this.initialize();
            setTimeout(function(){
                _this.fixClones();
            }, 2500);
            console.log("ASL initialized via window.load");
        }
    });

    // DOM tree modification detection to re-initialize automatically if enabled
    if (typeof(ASL.detect_ajax) != "undefined" && ASL.detect_ajax == 1) {
        scope("body").bind("DOMSubtreeModified", function() {
            clearTimeout(t);
            t = setTimeout(function(){
                _this.initialize();
            }, 500);
        });
    }

    var tt;
    scope(window).on('resize', function(){
        clearTimeout(tt);
        tt = setTimeout(function(){
            _this.fixClones();
        }, 2000);
    });

    var ttt;
    // Known slide-out and other type of menus to initialize on click
    var triggerSelectors = '#menu-item-search, .fa-search, .fa, .fas';
    // Avada theme
    triggerSelectors = triggerSelectors + ', .fusion-flyout-menu-toggle, .fusion-main-menu-search-open';
    // Be theme
    triggerSelectors = triggerSelectors + ', #search_button';
    // The 7 theme
    triggerSelectors = triggerSelectors + ', .mini-search.popup-search';
    // Flatsome theme
    triggerSelectors = triggerSelectors + ', .icon-search';
    // Enfold theme
    triggerSelectors = triggerSelectors + ', .menu-item-search-dropdown';
    // Uncode theme
    triggerSelectors = triggerSelectors + ', .mobile-menu-button';
    // Newspaper theme
    triggerSelectors = triggerSelectors + ', .td-icon-search, .tdb-search-icon';
    // Bridge theme
    triggerSelectors = triggerSelectors + ', .side_menu_button, .search_button';
    // Jupiter theme
    triggerSelectors = triggerSelectors + ', .raven-search-form-toggle';
    // Elementor trigger lightbox & other elementor stuff
    triggerSelectors = triggerSelectors + ', [data-elementor-open-lightbox], .elementor-button-link, .elementor-button';

    // Attach this to the document ready, as it may not attach if this is loaded early
    scope(function(){
        scope('body').on('click touchend', triggerSelectors, function(){
            clearTimeout(ttt);
            ttt = setTimeout(function(){
                _this.initialize();
            }, 500);
        });
    });
};

// Make a reference clone, just in case if an ajax page loader decides to override
window._ASL = ASL;

// Call the ready method
window._ASL.ready();
})(asljQuery, asljQuery, window);