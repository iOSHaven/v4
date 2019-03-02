function render(str, data={}) {
    var fn = new Function("obj", `
          var p = [];
          var print = function () {
              p.push.apply(p, arguments);
          };
          with (obj) {
              p.push('${
                  str.replace(/[\r\t\n]/g, " ")
                  .split("<%").join("\t")
                  .replace(/((^|%>)[^\t]*)'/g, "$1\r")
                  .replace(/\t=(.*?)%>/g, "',$1,'")
                  .split("\t").join("');")
                  .split("%>").join("p.push('")
                  .split("\r").join("\\'")
              }');
          };
          return p.join('');
      `);
    res = fn(data)
    console.log(res)
    return res
  }

function autocomplete (id, cb=null) {

    var getJSON = function(url, callback, type='json') {
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
    };

    var el = document.getElementById(id);
    var url = el.dataset.fetch;
    var result = el.dataset.result;
    var resultEl = document.getElementById(result)
    var template = el.dataset.template;
    getJSON(url, function (err, json) {
        if (err) return;
        // console.log({json})
        getJSON(template, function (err, tmpl) {
            if (err) return;
            // console.log({tmpl})
            if (cb && Array.isArray(json)) {
                el.addEventListener("keyup", function (e) {
                    if (!el.value || el.value.length < 2) return resultEl.innerHTML = ""
                    // console.log(json.length)
                    var $json = json.slice()
                    modified = cb.call(undefined, e, el, $json) || $json
                    // console.log(modified.length)
                    var res = modified.map(item => render(tmpl, item)).join("")
                    // console.log(res)
                    resultEl.innerHTML = res
                });
                
            }
        }, 'text')
    })
}

window.autocomplete = autocomplete