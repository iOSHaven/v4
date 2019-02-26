

(function () {
    var nav = document.querySelector('nav.fixed')
    var dropnav = document.querySelector('.dropnav')
    var height = nav.getBoundingClientRect().height
    var progress = document.getElementById('read-progress')
    var fn = () => {
      var height2 = nav.getBoundingClientRect().height
      var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
      var winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      var scrolled = (winScroll / winHeight) * 100;

      if (progress) {
         progress.style.width = scrolled + "%";
      }
      console.log(height2, height)
      // if (height2 != height) {
         document.body.style['margin-top'] = height2 + 'px'
      // }
      if (window.pageYOffset > height2) {
          nav.classList.add('bg-white', 'text-dark')
          nav.classList.remove('bg-blue', 'text-white')
          dropnav.classList.remove('bg-white', 'text-dark')
          dropnav.classList.add('bg-blue', 'text-white')
      } else {
          nav.classList.remove('bg-white', 'text-dark')
          nav.classList.add('bg-blue', 'text-white')
          dropnav.classList.add('bg-white', 'text-dark')
          dropnav.classList.remove('bg-blue', 'text-white')
      }
      height = height2
    }
    fn()
    window.addEventListener('scroll', fn)
    window.addEventListener('resize', fn)
})();

(function () {
   if (!window.Waves) return;
   new Waves({
      canvas: 'waves',
      waveCount: 5,
      backgroundColor: '#3EB5F7',
      backgroundBlendMode: 'source-over',
      waveBlendMode: 'screen',
      scale: 0.5,
   }, {
      color: 'yellow',
      amplitude: 30,
   }, {
      color: 'cyan',
      amplitude: 20,
   }, {
      color: '#3EB5F7',
      amplitude: 30,
   })

   $('#waves').parent().css('margin-bottom', '6rem')

})();
