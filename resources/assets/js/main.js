
import u from 'umbrellajs';
import "./autocomplete";
import PullToRefresh from 'pulltorefreshjs';
import { disablePageScroll, enablePageScroll, getScrollState } from 'scroll-lock';
import 'framework7-icons';
import lozad from 'lozad'

window.observer = lozad('.lazy-image', {
   loaded: function(el) {
       // Custom implementation on a loaded element
       console.log('loaded lazy image')
       el.classList.add('loaded');
   }
});

window.observer.observe();

var breakpoint = 768;
if (window.innerWidth < breakpoint) {
   (document.body.style.marginTop = document.querySelector("#nav-top-phone")?.offsetHeight || 0) + "px";
} else {
   (document.body.style.marginTop = document.querySelector("#nav-top-desktop")?.offsetHeight || 0) + "px";
}

const ptr = PullToRefresh.init({
   mainElement: 'body',
   onRefresh() {
      window.location.reload(true);
   }
})


u(".scroll-toggler").on('click', function () {
   console.log("toggle scroll")
   if (getScrollState()) {
      disablePageScroll()
   } else {
      enablePageScroll()
   }
})

// setTimeout(() => {
// u('#status-bar-style').attr('content', 'black')
// var mode = u("#status-bar-style").attr('content');
// alert(`You're in *${mode}**** mode`);
// }, 1000)

window.loadMoreApps = function (el, id = "apps") {
   var meta = document.head.querySelector('meta[name=page][content]')
   var currentPage = parseInt(meta.content)
   var nextPage = currentPage + 1
   if (window.location.href.includes('?')) {
      var url = window.location.href + "&html=true&page=" + nextPage
   } else {
      var url = window.location.href + "?html=true&page=" + nextPage
   }
   getJSON(url, function (err, doc) {
      if (err || typeof doc.body == "undefined") {
         el.innerHTML = "No more " + id + ". Try again?"
      } else {
         var apps = document.getElementById(id)
         apps.innerHTML += doc.body.innerHTML
         meta.setAttribute('content', nextPage.toString());

         (adsbygoogle = window.adsbygoogle || []).push({});
      }
   }, "document")
};

// setInterval(function () {
//    try {
//       (adsbygoogle = window.adsbygoogle || []).push({})
//    } catch (err) {
//       //
//    }

// }, 500)


window.onSearchInput = function (el) {
   window.searchinput = el.value.toLowerCase()
}
