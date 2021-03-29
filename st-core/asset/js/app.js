/* -----------------------------------------------
/* How to use? : Check the GitHub README
/* ----------------------------------------------- */

/* To load a config file (particles.json) you need to host this demo (MAMP/WAMP/local)... */
/*
particlesJS.load('particles-js', 'particles.json', function() {
  console.log('particles.js loaded - callback');
});
*/

/* Otherwise just put the config content (json): */

function particleShow() {

     particlesJS('particles-js',

          {
               "particles": {
                    "number": {
                         "value": 600,
                         "density": {
                              "enable": true,
                              "value_area": 500
                         }
                    },
                    "color": {
                         "value": "#ffffff"
                    },
                    "shape": {
                         "type": "circle",
                         "stroke": {
                              "width": 0,
                              "color": "#ffffff"
                         },


                    },
                    "opacity": {
                         "value": 0.7,
                         "random": true,
                         "anim": {
                              "enable": true,
                              "speed": 3,
                              "opacity_min": 0.3,
                              "sync": false,
                              "random": true
                         }
                    },
                    "size": {
                         "value": 1,
                         "random": true,
                         "anim": {
                              "enable": true,
                              "speed": 1,
                              "random": true,
                              "size_min": 0.2,
                              "sync": true,
                              "random": true
                         }
                    },
                    "line_linked": {
                         "enable": false,
                         "distance": 50,
                         "color": "#ffffff",
                         "opacity": 0,
                         "width": 1
                    },
                    "move": {
                         "enable": true,
                         "speed": 1,
                         "direction": "bottom",
                         "random": false,
                         "straight": true,
                         "out_mode": "out",
                         "attract": {
                              "enable": false,
                              "rotateX": 600,
                              "rotateY": 1200
                         }
                    }
               },
               "interactivity": {
                    "detect_on": "window",
                    "events": {
                         "onhover": {
                              "enable": false,
                              "mode": "repulse"
                         },
                         "onclick": {
                              "enable": true,
                              "mode": "push"
                         },
                         "resize": true
                    },
                    "modes": {
                         "grab": {
                              "distance": 400,
                              "line_linked": {
                                   "opacity": 1
                              }
                         },
                         "bubble": {
                              "distance": 400,
                              "size": 40,
                              "duration": 2,
                              "opacity": 8,
                              "speed": 3
                         },
                         "repulse": {
                              "distance": 200
                         },
                         "push": {
                              "particles_nb": 10
                         },
                         "remove": {
                              "particles_nb": 2
                         }
                    }
               },
               "retina_detect": true,
               "config_demo": {
                    "hide_card": false,
                    "background_color": "#b61924",
                    "background_image": "",
                    "background_position": "50% 50%",
                    "background_repeat": "no-repeat",
                    "background_size": "cover"
               }
          }

     );
}