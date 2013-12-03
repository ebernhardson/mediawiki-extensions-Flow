( function ( $, mw ) {
	'use strict';

	mw.flow.parsoid = {
		/**
		 * @param {string} from Input format: html|wikitext
		 * @param {string} to Desired output format: html|wikitext
		 * @param {string} content Content to convert
		 * @param {string} [title] Page title
		 * @return {string}
		 */
		convert: function ( from, to, content, title ) {
			if ( from !== to ) {
				var api = new mw.Api( { ajax: { async: false } } );

				if ( !title ) {
					title = mw.config.get( 'wgPageName' );
				}

				api.post( {
					action: 'flow-parsoid-utils',
					parsefrom: from,
					parseto: to,
					parsecontent: content,
					parsetitle: title
				} )
				.done( function ( data ) {
					content = data['flow-parsoid-utils'].content;
				} )
				.fail( function ( code, data ) {
					// @todo: proper error handling
					alert( data.error.info || 'Failed to convert wikitext to HTML.' );
				} );
			}

			return content;
		}
	};
} ( jQuery, mediaWiki ) );
