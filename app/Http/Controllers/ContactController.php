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
      $data = [];
      foreach ($r->all() as $key => $value) {
        if ($key !== '_token' && $key !== 'query_string') {
          $data[str_replace("-", " ", $key)] = $value;
        }
      }
      Mail::to('ioshavenco@gmail.com')
          ->send(new ContactSubmission($data));
      return view('contact.success')->with(['data' => $data]);
    }
}
