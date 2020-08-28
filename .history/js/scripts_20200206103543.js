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

// RADIO MANAGEMENTE
var elms = ['station0', 'title0', 'live0', 'playing0'];

elms.forEach(function(elm) {
  window[elm] = document.getElementById(elm);
});

var Radio = function(stations) {
  var self = this;

  self.stations = stations;
  self.index = 0;
  
  // Setup the display for each station.
  for (var i=0; i<self.stations.length; i++) {
    window['title' + i].innerHTML = '<b>' + self.stations[i].freq + '</b> ' + self.stations[i].title;
    window['station' + i].addEventListener('click', function(index) {
      var isNotPlaying = (self.stations[index].howl && !self.stations[index].howl.playing());
      
      // Stop other sounds or the current one.
      radio.stop();

      // If the station isn't already playing or it doesn't exist, play it.
      if (isNotPlaying || !self.stations[index].howl) {
        radio.play(index);
      }
    }.bind(self, i));
  }
};

Radio.prototype = {
  play: function(index) {
    var self = this;
    var sound;

    index = typeof index === 'number' ? index : self.index;
    var data = self.stations[index];

    // If we already loaded this track, use the current one.
    // Otherwise, setup and load a new Howl.
    if (data.howl) {
      sound = data.howl;
    } else {
      sound = data.howl = new Howl({
        src: data.src,
        html5: true, // A live stream can only be played through HTML5 Audio.
        format: ['mp3', 'aac']
      });
    }

    // Begin playing the sound.
    sound.play();

    // Toggle the display.
    self.toggleStationDisplay(index, true);

    // Keep track of the index we are currently playing.
    self.index = index;
  },

  /**
   * Stop a station's live stream.
   */
  stop: function() {
    var self = this;

    // Get the Howl we want to manipulate.
    var sound = self.stations[self.index].howl;

    // Toggle the display.
    self.toggleStationDisplay(self.index, false);

    // Stop the sound.
    if (sound) {
      sound.unload();
    }
  },

  toggleStationDisplay: function(index, state) {
    var self = this;

    // Highlight/un-highlight the row.
    window['station' + index].style.backgroundColor = state ? 'rgba(255, 255, 255, 0.33)' : '';

    // Show/hide the "live" marker.
    window['live' + index].style.opacity = state ? 1 : 0;

    // Show/hide the "playing" animation.
    window['playing' + index].style.display = state ? 'block' : 'none';
  }
};

// Setup our new radio and pass in the stations.
var radio = new Radio([
  {
    freq: '580',
    title: "Radio 580",
    src: 'http://170.84.134.39:9830/;',
  }
]);

