// ;(function () {
//   function domReady (f) { /in/.test(document.readyState) ? setTimeout(domReady, 16, f) : f() }
//
//
//   /* 0-timeout to get the already changed text */
//
//
//   domReady(function () {
//
//   })
// }())

function resize (event) {
  event.target.style.height = 'auto'
  event.target.style.height = event.target.scrollHeight + 'px'
}

function delayedResize (event) {
  window.setTimeout(resize, 0, event)
}

function textareaScan () {
  var textareas = document.querySelectorAll('textarea[auto-resize]')

  for (var i = 0, l = textareas.length; i < l; ++i) {
    var el = textareas.item(i)

    el.addEventListener('change', resize, false)
    el.addEventListener('cut', delayedResize, false)
    el.addEventListener('paste', delayedResize, false)
    el.addEventListener('drop', delayedResize, false)
    el.addEventListener('keydown', delayedResize, false)
  }
}

window.onload = textareaScan
