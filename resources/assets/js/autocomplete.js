function render(str, data={}) {
    var newhtml = str
    Object.keys(data).forEach(key => {
        var expr = "{%= " + key + " =%}";
        var re = new RegExp(expr, "g");
        newhtml = newhtml.replace(re, data[key]);
    })
    return newhtml
}

function getJSON (url, callback, type='json') {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = type;
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
}

function autocomplete (id, cb=null) {
    var el = document.getElementById(id);
    var url = el.dataset.fetch;
    var result = el.dataset.result;
    var resultEl = document.getElementById(result)
    var template = el.dataset.template;
    getJSON(url, function (err, json) {
        if (err) return;
        getJSON(template, function (err, tmpl) {
            if (err) return;
            if (cb && Array.isArray(json)) {
                el.addEventListener("keyup", function (e) {
                    if (!el.value || el.value.length < 2) return resultEl.innerHTML = ""
                    var $json = json.slice()
                    modified = cb.call(undefined, e, el, $json) || $json
                    var res = modified.map(item => render(tmpl, item)).join("")
                    resultEl.innerHTML = res
                });
                
            }
        }, 'text')
    })
}

window.autocomplete = autocomplete
window.getJSON = getJSON
window.render = render