function updateAppSearch(val) {
  $('.app').hide();
  val.forEach(v => {
    $('.app').each(function () {
      if(v.uid === $(this).data('uid')) $(this).show()
    })
  })
}


module.exports = updateAppSearch
