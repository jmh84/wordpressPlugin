(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );

function jee(){
	var data;
	var items = [];
	// article URL: https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=
	var url = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmode=json&retmax=1000&retstart=1000&term=(%22breast%20neoplasms%22[MeSH%20Terms]%20OR%20(%22breast%22[All%20Fields]%20AND%20%22neoplasms%22[All%20Fields])%20OR%20%22breast%20neoplasms%22[All%20Fields]%20OR%20(%22breast%22[All%20Fields]%20AND%20%22cancer%22[All%20Fields])%20OR%20%22breast%20cancer%22[All%20Fields])%20AND%20(Review[ptyp]%20AND%20jsubsetaim[text])"
		data = jQuery.getJSON(url,function( data2 ) {
			jQuery.each( data2, function( key, val ) {
				//alert(key)
				items.push( "<li id='" + key + "'>" + val + "</li>" );
				//Way to get count of results: data2.esearchresult.count
				console.log(data2.esearchresult.count);
			})
		})  .done(function() {
			
	        var data = {
	    			'comment_status':'closed',
	    			'ping_status':'closed',
	    			'post_author':1,
	    			'post_name':'testi123_name',
	    			'post_title':'testi123_title',
	    			'post_status':'publish',
	    			'post_type':'klab_publication'
	            };

	            jQuery.ajax({
	                method: "POST",
	                url: test.root + 'wp/v2/klab_publication',
	                data: data,
	                beforeSend: function ( xhr ) {
	                    xhr.setRequestHeader( 'X-WP-Nonce', test.nonce );
	                },
	                success : function( response ) {
	                    console.log( response );
	                    alert( 'succe' );
	                },
	                fail : function( response ) {
	                    console.log( response );
	                    alert( 'fail' );
	                }

	            });
			
			
			console.log(items);
			console.log(test.url);
			console.log(test.nonce);
			console.log(test.current_user_id);
			console.log(test.root);
			console.log(test.root + 'wp/v2/klab_publication');
		});
	//wp_insert_post(postArray());
};

function postArray(){
	return {
			'comment_status':'closed',
			'ping_status':'closed',
			'post_author':1,
			'post_name':'testi123_name',
			'post_title':'testi123_title',
			'post_status':'publish',
			'post_type':'klab_publication'
	};
};

/*function postArray(){
	return array(
			'comment_status'  => 'closed',
			'ping_status'   => 'closed',
			'post_author'   => 1,
			'post_name'   => 'testi123_name',
			'post_title'    => 'testi123_title',
			'post_status'   => 'publish',
			'post_type'   => 'klab_publication'
	);
};*/
