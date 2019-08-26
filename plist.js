const plist = require('simple-plist');
const fetch = require('node-fetch');
const commandLineArgs = require('command-line-args')
const https = require('https')
const exec = require('child-process-promise').exec
const fs = require('fs')


const options = commandLineArgs([
    { name: 'url', alias: 'u', type: String}
])

function main ()
{
    if (options.url.includes('.ipa')) {
        return handleIPALink(options.url)
    }
    else if (options.url.includes("itms-services")) {
        options.url = options.url.split("url=")[1];
    }

    var url = decodeURIComponent(options.url)

    https.get(url, (resp) => {
      let data = '';

      // A chunk of data has been recieved.
      resp.on('data', (chunk) => {
        data += chunk;
      });

      // The whole response has been received. Print out the result.
      resp.on('end', () => {
        parsePlist(data)
      });

    }).on("error", (err) => {
      console.log("Error: " + err.message);
    });
}

async function parsePlist(plistString)
{
    // console.log(plistString)
    var plistJSON = plist.parse(plistString);

    var {items} = plistJSON
    var metadata = items[0].metadata
    var assets = items[0].assets
    var appledata = await fetchDataByBundleId(metadata['bundle-identifier'])
    appledata.version = metadata['bundle-version']
    appledata['ipaurl'] = assets.filter(o => o.kind == 'software-package')[0].url
    // console.dir()
    printData(appledata)
}

function fetchDataByBundleId (bundleId) {
    return new Promise((resolve, reject) => [
        fetch(`http://itunes.apple.com/lookup?bundleId=${bundleId}`)
        .then(res => res.json())
        .then(data => {
            if (data.results.length > 0) {
                resolve(data.results[0]);
            } else {
                resolve({})
            }
        })
    ])
}

function printData(data) {
    console.log(JSON.stringify(data))
}


function plistToJson(path) {
    return new Promise(function(resolve, reject) {
      plist.readFile(path, function (err, data) {
        if (err) return reject(err)
        else return resolve(data)
      })
    });
  }
  

async function handleIPALink(link) {
    var pid = process.pid;
    // var pid = 17442;
    var ipafilename = "download-" + pid + ".ipa";
    var ipapath = "/tmp/" + ipafilename;
    if (!fs.existsSync(ipapath)) {
        var { stdout } = await exec(`wget -O ${ipapath} ${link}`);
    }
    
    var { stdout } = await exec(`unzip -l "${ipapath}" | tr -s ' ' | cut -d ' ' -f5- | grep 'Payload/.*app/$'`)
    var plistPath = stdout.trim() + 'Info.plist';
    var ipaplistpath = ipapath + '.plist';
    var { stdout } = await exec(`unzip -p "${ipapath}" "${plistPath}" > "${ipaplistpath}"`)

    var json = await plistToJson(ipaplistpath)
    // console.log(json.CFBundleIdentifier)
    var appledata = await fetchDataByBundleId(json.CFBundleIdentifier)
    appledata.version = json.CFBundleShortVersionString
    
    fs.unlinkSync(ipapath);
    fs.unlinkSync(ipaplistpath);
    printData(appledata)
}


main()