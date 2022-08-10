<?php
$UDID = $_GET['UDID'] ?? 'unknown';
$DEVICE_PRODUCT = $_GET['DEVICE_PRODUCT'] ?? 'unknown';
$DEVICE_VERSION = $_GET['DEVICE_VERSION'] ?? 'unknown';
$DEVICE_NAME = $_GET['DEVICE_NAME'] ?? 'unknown';

$subject = 'This is my UDID from iOS device';
$body = "Hello<br /> This is my UDID: $UDID <br />";
$body .= "Device product: $DEVICE_PRODUCT <br />";
$body .= "Device version: $DEVICE_VERSION <br />";
$body .= "Device name: $DEVICE_NAME <br />";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UDID</title>
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <div>
            <h1>Knowing the UDID of my iOS device</h1>
                <p>UDID: <?= $UDID ?></p>
                <p>Device product: <?= $DEVICE_PRODUCT; ?></p>
                <p>Device version: <?= $DEVICE_VERSION; ?></p>
                <p>Device name: <?= $DEVICE_NAME; ?></p>

                <p>Step 2: Send the information by email:</p>
                <p>
                    <a href="mailto:?subject=<?= $subject ?>&body=<?= $body ?>">Give me tap</a>
                </p>
        </div>
    </body>
</html>