const fetch = require('node-fetch');
const commandLineArgs = require('command-line-args')
const options = commandLineArgs([
    { name: 'type', alias: 't', type: String}
])

function main ()
{
    fetch(`https://apps.tweakbox.pro/enjoy/${options.type}.json`)
    .then(res => res.json())
    .then(print)
}


function print (res) {
    var chunks = chunk(res.data, 5)
    pauseLoop(chunks, c => {
        Promise.all(c.map(fetchDetails))
    }, 1, () => {
        console.log(JSON.stringify(chunks.flat()))
        process.exit()
    })
}

function fetchDetails(app)
{
    return new Promise((resolve, reject) => {
        fetch(`https://apps.tweakbox.pro/${options.type}/${app.TBAppSlug}`)
        .then(res => res.json())
        .then(res => {
            resolve(Object.assign(app, res.data))
        })
        .catch(err => {
            resolve(app)
        })
    })
}


function chunk(arr, size=1) {
    var j = arr.length
	var result = []
    for (var i=0; i < j; i += size) {
        result.push(arr.slice(i, i+size))
    }
    return result
}

function pauseLoop(arr, cb, ms, done) {
    var i = 0;
    var interval = setInterval(function(){
        var obj = arr[i];
        cb(obj)
        i++;
        if(i === arr.length) {
            clearInterval(interval);
            done()
        }
    }, ms);
}



main()
