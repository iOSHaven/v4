<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>ConsentText</key>
	<dict>
		<key>default</key>
		<string>Install if you want a better experience.</string>
	</dict>
	<key>HasRemovalPasscode</key>
	<false/>
	<key>PayloadContent</key>
	<array>
		<dict>
			<key>FullScreen</key>
			<true/>
			<key>Icon</key>
			<data>{{ base64_encode(file_get_contents(public_path("/favicons/apple-touch-icon.png"))) }}</data>
			<key>IsRemovable</key>
			<true/>
			<key>Label</key>
			<string>IOS Haven</string>
			<key>PayloadDescription</key>
			<string>Configures settings for a web clip</string>
			<key>PayloadDisplayName</key>
			<string>Web Clip</string>
			<key>PayloadIdentifier</key>
			<string>com.apple.webClip.managed.9D095E68-FFAF-42AA-A8EB-ACD014D7CD62</string>
			<key>PayloadType</key>
			<string>com.apple.webClip.managed</string>
			<key>PayloadUUID</key>
			<string>9D095E68-FFAF-42AA-A8EB-ACD014D7CD62</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>Precomposed</key>
			<true/>
			<key>URL</key>
			<string>{{ url('/apps') }}</string>
		</dict>
	</array>
	<key>PayloadDescription</key>
	<string>A better experience for IOS Haven</string>
	<key>PayloadDisplayName</key>
	<string>IOS Haven</string>
	<key>PayloadIdentifier</key>
	<string>co.ioshaven.webapp</string>
	<key>PayloadOrganization</key>
	<string>IOS Haven</string>
	<key>PayloadRemovalDisallowed</key>
	<false/>
	<key>PayloadType</key>
	<string>Configuration</string>
	<key>PayloadUUID</key>
	<string>7EE7BCC9-1073-4B79-9566-CED59CECFC9C</string>
	<key>PayloadVersion</key>
	<integer>1</integer>
</dict>
</plist>