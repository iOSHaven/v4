
import u from 'umbrellajs';
import "./autocomplete";
import PullToRefresh from 'pulltorefreshjs';
import { disablePageScroll, enablePageScroll, getScrollState } from 'scroll-lock';

var breakpoint = 768;
if (window.innerWidth < breakpoint) {
   document.body.style.marginTop = document.querySelector("#nav-top-phone").offsetHeight + "px";
} else {
   document.body.style.marginTop = document.querySelector("#nav-top-desktop").offsetHeight + "px";
}

const ptr = PullToRefresh.init({
   mainElement: 'body',
   onRefresh() {
      window.location.reload();
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

window.loadMoreApps = function(el) {
   var meta =  document.head.querySelector('meta[name=page][content]')
   var currentPage = parseInt(meta.content)
   var nextPage = currentPage + 1
   if (window.location.href.includes('?')) {
     var url = window.location.href + "&html=true&page=" + nextPage
   } else {
     var url = window.location.href + "?html=true&page=" + nextPage
   }
   getJSON(url, function (err, doc) {
      if (err || typeof doc.body == "undefined") {
         el.innerHTML = "No more apps. Try again?"
      } else {
         var apps = document.getElementById('apps')
         apps.innerHTML += doc.body.innerHTML
         meta.setAttribute('content', nextPage.toString())
      }
   }, "document")
};



