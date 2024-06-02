// music1.js

var audio = document.getElementById('audioPlayer');
var progressBar = document.getElementById('progressBar');
var currentTimeDisplay = document.getElementById('currentTime');
var totalTimeDisplay = document.getElementById('totalTime');

audio.addEventListener('timeupdate', updateProgress);
audio.addEventListener('loadedmetadata', displayDuration);

function playAudio() {
  audio.play();
}

function pauseAudio() {
  audio.pause();
}

function stopAudio() {
  audio.pause();
  audio.currentTime = 0;
  updateProgress();
}

function updateProgress() {
  var value = (audio.currentTime / audio.duration) * 100;
  progressBar.value = value;
  currentTimeDisplay.textContent = formatTime(audio.currentTime);
}

function displayDuration() {
  totalTimeDisplay.textContent = formatTime(audio.duration);
}

function formatTime(seconds) {
  var minutes = Math.floor(seconds / 60);
  var seconds = Math.floor(seconds % 60);
  if (seconds < 10) {
    seconds = '0' + seconds;
  }
  return minutes + ':' + seconds;
}

progressBar.addEventListener('input', function () {
  var seekTime = (progressBar.value / 100) * audio.duration;
  audio.currentTime = seekTime;
});
