'use strict';

// Overlay navigation
function openNav() {
  document.getElementById('navbar-menu').style.height = '100%';
}

function closeNav() {
  document.getElementById('navbar-menu').style.height = '0%';
}

// Typing Animation
document.addEventListener('DOMContentLoaded',function(event){
  // array with texts to type in typewriter

  var dataText = [
    'We\'re a strategic creative agency',
    'We make cool shit for brands that give a damn',
    'We create digital experiences for humans',
    'We design digital interfaces that don\'t suck',
    'We unlock the digital potential of your brand',
    'We grow businesses using strategic design',
    'We\'re karmic creative'
  ];
  
  // type one text in the typwriter
  // keeps calling itself until the text is finished
  function typeWriter(text, i, fnCallback) {
    // check if text isn't finished yet
    if (i < (text.length)) {
      // add next character to h1
     document.querySelector(".typewriter").innerHTML = text.substring(0, i+1) +'<span class="cursor" aria-hidden="true"></span>';

      // wait for a while and call this function again for next character
      setTimeout(function() {
        typeWriter(text, i + 1, fnCallback)
      }, 50);
    }
    // text finished, call callback if there is a callback function
    else if (typeof fnCallback == 'function') {
      // call callback after timeout
      setTimeout(fnCallback, 1500);
    }
  }
  // start a typewriter animation for a text in the dataText array
   function StartTextAnimation(i) {
     if (typeof dataText[i] == 'undefined'){
        setTimeout(function() {
          StartTextAnimation(0);
        }, 10000);
     }
     // check if dataText[i] exists
    if (i < dataText[i].length) {
      // text exists! start typewriter animation
     typeWriter(dataText[i], 0, function(){
       // after callback (and whole text has been animated), start next text
       StartTextAnimation(i + 1);
     });
    }
  }
  // start the text animation
  StartTextAnimation(0);
});