<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSubmission;
use Mail;
use GuzzleHttp\Client;
use Auth;


class ContactController extends Controller
{
    public function view ($type="index") {
      // Types include: general, request, bug
      return view("contact.$type");
    }

    public function send ($type, Request $r) {
      $r->validate([
        'g-recaptcha-response' => 'required|captcha'
      ]);
      $data = [];
      foreach ($r->all() as $key => $value) {
        if (!in_array($key, ["_token", "query_string", "g-recaptcha-response"])) {
          $data[str_replace("-", " ", $key)] = $value;
        }
      }

      $client = new Client();

      $payload = [
        "username" => "**$type** iOS Haven",
        "embeds" => [
          [
            "title" => $r->title,
            "description" => $r->message,
            "footer" => [],
          ]
        ]
      ];

      if (Auth::check()) {
        $payload["embeds"][0]["footer"] = [
          "text" => Auth::user()->username,
          "icon_url" => "https://ioshaven.co/ios-white.png"
        ];
      }


      $response = $client->post(env("DISCORD_WEBHOOK"), [
        "json" => $payload
      ]);
 
      Mail::to('ioshavenco@gmail.com')
          ->send(new ContactSubmission($data));
      // return view('emails.contactSubmission')->with(['data' => $data]);
      return view('contact.success')->with(['data' => $data]);
    }
}
