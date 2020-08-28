/* jQuery(document).ready( $ => {
    $('#nav-container').slicknav({
        label: '',
        appendTo: '#nav-content'
    });
}) */

/* jQuery(document).ready(function($) {
    $(".search_icon").click(function() {
        $(".spicewpsearchform").slideToggle();
    });
  
    $(document).keydown(function(e) {
        if (e.keyCode == 27) {
            //$(modal_or_menu_element).closeElement();
            $(".spicewpsearchform").hide();
        }
    });
}); */

// LOAD MORE BUTTON

jQuery(function($){
	//blog posts static page
	$('.loadmore').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : loadmore_params.current_page
		};
 
		$.ajax({
			url : '/wp-admin/admin-ajax.php', // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'More posts' ).prev().after(data); // insert new posts
					loadmore_params.current_page++;
 
					if ( loadmore_params.current_page == loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
				} else {
					//button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
 
 
 
	$('.loadmore2').click(function(){
		//custom query on front-page.php
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': posts_myajax,
			'page' : current_page_myajax
		};
 
		$.ajax({
			url : '/wp-admin/admin-ajax.php', // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Cargando...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'Cargar más noticias' ).prev().after(data); // insert new posts
					current_page_myajax++;
 
					if ( current_page_myajax == max_page_myajax )
						button.remove(); // if last page, remove the button
				} else {
					//button.remove(); // if no data, remove the button as well
				}
			}
		});
	});	
 
});

