@extends('layouts.frontend.master')
@section('title')
SHM Store| Feedback
@endsection
@section('content')

<div class="l-inner">
    <div class="feedback-form"> 
      <form name="feedback" method="POST" action="">
          @csrf
          <p class="feedback-p"><sup>**</sup>You can freely advise us on our service and products!<sup>**</sup></p> 
          <div class="input-gp"> 
            <div class="input-row1 clearfix">
              <div class="input-col">
                <label for="name">Name</label><br>
                <input type="text" class="name" name="name" placeholder="Your Name.....">
              </div>
              <div class="input-col">
                <label for="email">Email</label><br>
                <input type="email" id="email" class="email" name="email" placeholder="Your Email.....">
              </div>
            </div>

            <div class="input-msg"> 
              <label for="message">Message</label><br>
              <textarea class="messgae" name="messgae" rows="7" placeholder="Text...."></textarea>
            </div>

            <div class="btn-gp">
              <button class="btn-submit" name="send">Send</button>
              <p class="cmn-p"><sup>*</sup>We appreciate you taking the time to review our service!<sup>*</sup></p>
            </div>
          </div>
        </form>
    </div> 
  </div>

@endsection