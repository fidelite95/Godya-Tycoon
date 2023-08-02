let playpause_btn = document.querySelector ('.playpause-track');
let next_btn = document.querySelector ('.next-track');
let prev_btn = document.querySelector ('.prev-track');

// Specify globally used values
let track_index = 0;
let isPlaying = false;

// Create the audio element for the player
let curr_track = document.createElement ('audio');

// Define the list of tracks that have to be played
let track_list = [
  {
    name: 'Designer',
    path: 'audios/designer.mp3',
  },
  {
    name: 'Lonely',
    path: 'audios/lonely.mp3',
  },
  {
    name: 'Paris',
    path: 'audios/paris.mp3',
  },
  {
    name: 'Balenciaga',
    path: 'audios/balenciaga.mp3',
  },
];

function loadTrack (track_index) {
  // Load a new track
  curr_track.src = track_list[track_index].path;
  curr_track.load ();

  // Move to the next track if the current finishes playing
  // using the 'ended' event
  curr_track.addEventListener ('ended', nextTrack);
}

function playpauseTrack () {
  // Switch between playing and pausing
  // depending on the current state
  if (!isPlaying) playTrack ();
  else pauseTrack ();
}

function playTrack () {
  // Play the loaded track
  curr_track.play ();
  isPlaying = true;

  // Replace icon with the pause icon
  playpause_btn.innerHTML = '<i class="fa fa-pause-circle fa-2x"></i>';
}

function pauseTrack () {
  // Pause the loaded track
  curr_track.pause ();
  isPlaying = false;

  // Replace icon with the play icon
  playpause_btn.innerHTML = '<i class="fa fa-play-circle fa-2x"></i>';
}

function nextTrack () {
  // Go back to the first track if the
  // current one is the last in the track list
  if (track_index < track_list.length - 1) track_index += 1;
  else track_index = 0;

  // Load and play the new track
  loadTrack (track_index);
  playTrack ();
}

function prevTrack () {
  // Go back to the last track if the
  // current one is the first in the track list
  if (track_index > 0) track_index -= 1;
  else track_index = track_list.length - 1;

  // Load and play the new track
  loadTrack (track_index);
  playTrack ();
}

loadTrack (track_index);
