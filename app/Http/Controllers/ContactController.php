<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSubmission;
use Mail;

class ContactController extends Controller
{
    public function view ($type) {
      // Types include: general, request, bug
      return view("contact.$type");
    }

    public function send (Request $r) {
      $r->validate([
        'g-recaptcha-response' => 'required|captcha'
      ]);
      $data = [];
      foreach ($r->all() as $key => $value) {
        if (!in_array($key, ["_token", "query_string", "g-recaptcha-response"])) {
          $data[str_replace("-", " ", $key)] = $value;
        }
      }
      Mail::to('ioshavenco@gmail.com')
          ->send(new ContactSubmission($data));
      // return view('emails.contactSubmission')->with(['data' => $data]);
      return view('contact.success')->with(['data' => $data]);
    }
}
