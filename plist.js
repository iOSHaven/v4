const plist = require('simple-plist');
const fetch = require('node-fetch');
const commandLineArgs = require('command-line-args')
const options = commandLineArgs([
    { name: 'url', alias: 'u', type: String}
])

function main ()
{
    if (options.url.includes("itms-services")) {
        options.url = options.url.split("url=")[1];
    }
    console.log(decodeURIComponent(options.url))
    fetch(decodeURIComponent(options.url))
    .then(res => res.text())
    .then(parsePlist)
}

function parsePlist(plistString)
{
    var plistJSON = plist.parse(plistString);
    // console.dir(plistJSON, {depth: null, colors: true});
    var {items} = plistJSON
    var metadata = items[0].metadata
    var assets = items[0].assets
    // console.dir(assets, {depth: null, colors: true})
    // console.table(metadata)

    fetch(`http://itunes.apple.com/lookup?bundleId=${metadata['bundle-identifier']}`)
    .then(res => res.text())
    .then(handleAppleData)
}

function handleAppleData(data) {
    console.log(data.trim())
}


main()
