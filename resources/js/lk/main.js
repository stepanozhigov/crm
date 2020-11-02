// https://developers.google.com/youtube/iframe_api_reference

// global variable for the player
var player;

// this function gets called when API is ready to use
function onYouTubePlayerAPIReady() {
  // create the global player from the specific iframe (#video)
  player = new YT.Player('video', {
    events: {
      // call this function when player is ready to use
      'onReady': onPlayerReady
    }
  });
}

function onPlayerReady(event) {
  
  // bind events
  var firstButton = document.getElementById("first-video-overlay");
  firstButton.addEventListener("click", function() {
    player.playVideo();
  });
  var playButton = document.getElementById("paused-video-overlay");
  playButton.addEventListener("click", function() {
    player.playVideo();
  });
  
  var pauseButton = document.getElementById("playing-video-overlay");
  pauseButton.addEventListener("click", function() {
    player.pauseVideo();
  });
  
}

// Inject YouTube API script
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


$(document).ready(function() { 
  // 1) show first videoload overlay if mobile and not autoplay
  $('#first-video-overlay').click(function(){
      console.log('FIRST VIDEO');
      $('#first-video-overlay').hide();
  //                $('#paused-video-overlay').fadeOut();
      $('#playing-video-overlay').show();
  });

  // 2) if the video overlay is clicked, then pause the video
  $('#playing-video-overlay').click(function(){
      $('#playing-video-overlay').hide();
      $('#paused-video-overlay').fadeIn();        
      console.log('PAUSE VIDEO');
  });

  // 3) if the video overlay is clicked, then pause the video
  $('#paused-video-overlay').click(function(){
    $('#paused-video-overlay').fadeOut();
    $('#playing-video-overlay').show();
    console.log('PLAY VIDEO');
  });

  $(".list20190906_item_more").click(function () {
    $(this).parent().toggleClass('active');
    var text = $(this).text();
    $(this).text(
      text === "свернуть" ? "продолжение..." : "свернуть");
  });

  const container = document.getElementById('site-navigation');
  const menu = container.getElementsByTagName('ul')[0];
  const button = container.getElementsByTagName('button')[0];
  button.onclick = function() {
    if ( -1 !== container.className.indexOf( 'toggled' ) ) {
      container.className = container.className.replace( ' toggled', '' );
      button.setAttribute( 'aria-expanded', 'false' );
      menu.setAttribute( 'aria-expanded', 'false' );
    } else {
      container.className += ' toggled';
      button.setAttribute( 'aria-expanded', 'true' );
      menu.setAttribute( 'aria-expanded', 'true' );
    }
  };
});