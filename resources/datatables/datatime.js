// UMD
(function( factory ) {
    "use strict";
 
    if ( typeof define === 'function' && define.amd ) {
        // AMD
        define( ['jquery'], function ( $ ) {
            return factory( $, window, document );
        } );
    }
    else if ( typeof exports === 'object' ) {
        // CommonJS
        module.exports = function (root, $) {
            if ( ! root ) {
                root = window;
            }
 
            if ( ! $ ) {
                $ = typeof window !== 'undefined' ?
                    require('jquery') :
                    require('jquery')( root );
            }
 
            return factory( $, root, root.document );
        };
    }
    else {
        // Browser
        factory( jQuery, window, document );
    }
}
(function( $, window, document ) {
 
 
$.fn.dataTable.render.intlNumber = function ( locale, options ) {
    if ( window.Intl ) {
        var formatter = new Intl.NumberFormat( locale, options );
 
        return function ( d, type ) {
            if ( type === 'display' ) {
                return formatter.format( d );
            }
            else if ( type === 'filter' ) {
                return d +' '+ formatter.format( d );
            }
            return d;
        };
    }
    else {
        return function ( d ) {
            return d;
        };
    }
};
 
 
$.fn.dataTable.render.intlDateTime = function ( locale, options ) {
    if ( window.Intl ) {
        var formatter = new Intl.DateTimeFormat( locale, options );
 
        return function ( data, type ) {
            var date;
 
            if ( typeof data === 'string' ) {
                date = Date.parse( data );
            }
            else if ( data instanceof Date ) {
                date = data;
            }
 
            if ( isNaN( date ) || type === 'type' || type === 'sort' ) {
                return data;
            }
 
            return formatter.format( date );
        };
    }
    else {
        return function ( d ) {
            return d;
        };
    }
};
 
 
}));