
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/*new*/
import linkify from 'vue-linkify'
 
Vue.directive('linkified', linkify)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
import {TinkerComponent} from 'botman-tinker';
Vue.component('botman-tinker', TinkerComponent);

const app = new Vue({
    el: '#app'
});*/

Vue.component('tinker',require('../assets/js/components/TinkerComponent.vue'));
const app = new Vue({
    el: '#app'
});
/*
var x=document.getElementById('app').offsetHeight;

var footer =document.getElementsById('footer');
if(footer.style.marginTop<50)
footer.style.marginBottom=-x;*/
/*
$(document).ready(function() {
    var divHeight = $('.footerr').css('height'); 
    $(document.body).css('margin-bottom',divHeight+'px');
   
});*/
//to make footer stick to bottom

window.addEventListener("load", activateStickyFooter);

function activateStickyFooter() {
  adjustFooterCssTopToSticky();  
  window.addEventListener("resize", adjustFooterCssTopToSticky);
}

function adjustFooterCssTopToSticky() {
  const footer = document.querySelector("#footer");
  const bounding_box = footer.getBoundingClientRect();
  const footer_height = bounding_box.height;
  const window_height = window.innerHeight;
  const above_footer_height = bounding_box.top - getCssTopAttribute(footer);
  if (above_footer_height + footer_height <= window_height) {
    const new_footer_top = window_height - (above_footer_height + footer_height);
    footer.style.top = new_footer_top + "px";
  } else if (above_footer_height + footer_height > window_height) {
    footer.style.top = null;
  }
}

function getCssTopAttribute(htmlElement) {
  const top_string = htmlElement.style.top;
  if (top_string === null || top_string.length === 0) {
    return 0;
  }
  const extracted_top_pixels = top_string.substring(0, top_string.length - 2);
  return parseFloat(extracted_top_pixels);
}


//get drop down value

$(function() {
  $('select[name="level"]').on('change', function () {
      var levelID = $(this).val();

      if (levelID) {
          $.get('/signup/'+levelID, function(data) {
              $('select[name="dep"]').empty();

              $('select[name="dep"]').append('<option value="">== select dept ==</option>');
              $.each(data,function(key, value) {
                  $('select[name="dep"]').append('<option value="' + key + '">' + value + '</option>');
              });
          }, 'json');
      } else {
          $('select[name="dep"]').empty();
      }
  });
});






/*
var level_id = ;
$.ajax({
  url: "serverScript.php",
  method: "POST",
  data: { "profile_viewer_uid": profile_viewer_uid }
})*/
