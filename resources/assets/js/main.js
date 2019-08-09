
import "./autocomplete"

// (function () {
//     var nav = document.querySelector('nav.fixed')
//     var dropnavs = document.querySelectorAll('.dropnav')
//     var height = nav.getBoundingClientRect().height
//     var progress = document.getElementById('read-progress')
//     var fn = () => {
//       var height2 = nav.getBoundingClientRect().height
//       var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
//       var winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
//       var scrolled = (winScroll / winHeight) * 100;

//       if (progress) {
//          progress.style.width = scrolled + "%";
//       }
//       // console.log(height2, height)
//       // if (height2 != height) {
//          document.body.style['margin-top'] = height2 + 'px'
//       // }
//       if (window.pageYOffset > height2) {
//           nav.classList.add('bg-white', 'text-dark')
//           nav.classList.remove('bg-blue', 'text-white')
//           Array.from(dropnavs).forEach(dropnav => {
//             dropnav.classList.remove('bg-white', 'text-dark')
//             dropnav.classList.add('bg-blue', 'text-white')
//           })
//       } else {
//           nav.classList.remove('bg-white', 'text-dark')
//           nav.classList.add('bg-blue', 'text-white')
//           Array.from(dropnavs).forEach(dropnav => {
//             dropnav.classList.add('bg-white', 'text-dark')
//             dropnav.classList.remove('bg-blue', 'text-white')
//           })
//       }
//       height = height2
//     }
//     fn()
//     window.addEventListener('scroll', fn)
//     window.addEventListener('resize', fn)
// })();

// (function () {
//    if (!window.Waves) return;
//    new Waves({
//       canvas: 'waves',
//       waveCount: 5,
//       backgroundColor: '#3EB5F7',
//       backgroundBlendMode: 'source-over',
//       waveBlendMode: 'screen',
//       scale: 0.5,
//    }, {
//       color: 'yellow',
//       amplitude: 30,
//    }, {
//       color: 'cyan',
//       amplitude: 20,
//    }, {
//       color: '#3EB5F7',
//       amplitude: 30,
//    })

//    $('#waves').parent().css('margin-bottom', '6rem')

// })();

window.loadMoreApps = function(el) {
   var meta =  document.head.querySelector('meta[name=page][content]')
   var currentPage = parseInt(meta.content)
   var nextPage = currentPage + 1
   if (window.location.href.includes('?')) {
     var url = window.location.href + "&json=true&page=" + nextPage
   } else {
     var url = window.location.origin + "/apps?json=true&page=" + nextPage
   }
   getJSON(url, function (err, json) {
      if (err) {
         el.innerHTML = "No more apps. Try again?"
         el.className = "btn btn-red"
      } else {
         getJSON(el.dataset.template, function (err, template) {
            if (err) {
               el.innerHTML = "Template Error. Try again?"
               el.className = "btn btn-red"
            }
            var apps = document.getElementById('apps')
            apps.innerHTML += json.apps.data.map(app => render(template, app)).join("")
            meta.setAttribute('content', nextPage.toString())
         }, 'text')

      }
   })
};

(function (){
  // var i = setInterval(function () {
  //   console.clear()
  //   console.log("%cHello!", "color: #3EB5F7; text-shadow: 0px 2px black; -webkit-text-stroke: 1px black; font-size: 60px;font-weight:bold;");
  //   console.log("%cDo you want to help develop this website?", "font-size: 20px;")
  //   console.log("%cIf you do, then contact @wizardzeb on Twitter.", "font-size: 20px;")
  // }, 1000)
  // setTimeout(function () {
  //   clearInterval(i)
  // }, 10000)

})();

