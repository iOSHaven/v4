const plist = require('simple-plist');
const fetch = require('node-fetch');
const commandLineArgs = require('command-line-args')
const options = commandLineArgs([
    { name: 'url', alias: 'u', type: String}
])

function main () 
{
    fetch(decodeURIComponent(options.url))
    .then(res => res.text())
    .then(parsePlist)
}

function parsePlist(plistString)
{
    var plistJSON = plist.parse(plistString);
    var {items} = plistJSON
    var metadata = items[0].metadata
    var assets = items[0].assets
    console.dir(assets, {depth: null, colors: true})
    console.table(metadata)
    
    fetch(`http://itunes.apple.com/lookup?bundleId=${metadata['bundle-identifier']}`)
    .then(res => res.json())
    .then(handleAppleData)
}

function handleAppleData(data) {
    console.dir(data, {depth: null, colors: true})
}


main()

