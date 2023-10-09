/*------------------------------------------------------------------------------*/
/*  Home_Page Slider
/*------------------------------------------------------------------------------*/

var revapi2,

  tpj;
  
  jQuery(function() {
    tpj = jQuery;
    if(tpj("#rev_slider_1_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_1_1");
    }else{
        revapi2 = tpj("#rev_slider_1_1").show().revolution({
        sliderType:"standard",
        visibilityLevels:"1240,1240,778,480",
        gridwidth:"1340,1340,778,480",
        gridheight:"600,600,450,320",
        spinner:"spinner0",
        perspective:600,
        perspectiveType:"local",
        editorheight:"600,600,450,320",
        responsiveLevels:"1240,1240,778,480",
        disableProgressBar:true,
          navigation: {
            onHoverStop:false,
            arrows: {
              enable:true,
              style:"uranus",
              hide_onmobile:true,
              hide_under:778,
              left: {
                h_offset:30
              },
              right: {
                h_offset:30
              }
            }
          },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid:true
        },
      });
    }
    
  });



  /* (homepage -2 )*/
  jQuery(function() {
    tpj = jQuery;

    if(tpj("#rev_slider_2_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_2_1");

      }else{

        revapi2 = tpj("#rev_slider_2_1").show().revolution({
        sliderType:"standard",
        visibilityLevels:"1240,1240,778,480",
        gridwidth:"1340,1340,778,480",
        gridheight:"750,750,450,320",
        spinner:"spinner0",
        perspective:600,
        perspectiveType:"local",
        editorheight:"750,768,450,320",
        responsiveLevels:"1240,1240,778,480",
        progressBar:{disableProgressBar:true},
        navigation: {
          onHoverStop:false,
          arrows: {
            enable:true,
            style:"hesperiden",
            hide_onmobile:true,
            hide_under:778,
            hide_onleave:true,
            left: {
              h_offset:30
            },
            right: {
              h_offset:30
            }
          }
        },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid:true
        },
      });
    }
  });

  /* (homepage -3 )*/
  jQuery(function() {
    tpj = jQuery;

    if(tpj("#rev_slider_3_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_3_1");
        
      }else{

        revapi2 = tpj("#rev_slider_3_1").show().revolution({
                sliderLayout:"fullwidth",
                visibilityLevels:"1240,1240,778,480",
                gridwidth:"1340,1340,778,480",
                gridheight:"600,600,450,320",
                lazyType:"smart",
                perspective:600,
                perspectiveType:"global",
                editorheight:"600,768,450,320",
                responsiveLevels:"1240,1240,778,480",
                progressBar:{disableProgressBar:true},
                navigation: {
                  wheelCallDelay:1000,
                  onHoverStop:false,
                  touch: {
                    touchenabled:true,
                    touchOnDesktop:true
                  },
                  arrows: {
                    enable:true,
                    style:"uranus",
                    hide_onmobile:true,
                    hide_under:778,
                    hide_onleave:true,
                    left: {
                      h_offset:30
                    },
                    right: {
                      h_offset:30
                    }
                  }
                },
                viewPort: {
                  global:true,
                  globalDist:"-200px",
                  enable:false
                },
                fallbacks: {
                  allowHTML5AutoPlayOnAndroid:true
                },
      });
    }
  });





          