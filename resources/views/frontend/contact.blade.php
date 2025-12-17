@extends('frontend/layouts/frontend-master', ['title' => 'Contact-Us'])

@section('frontend')

  <x-breadcrumb title="Contact Us" current="Contact" />
  <!-- End breadcrumb -->

  <div class="lonyo-section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="lonyo-default-content">
            <h2>Just say hello. Here's how to reach us</h2>
            <p class="max-w616">Have a question? We have the answer. Whether you need technical support or want to know
              more about this tool.</p>
            <div class="mt-50">
              <div class="lonyo-contact-us-info-item ">
                <div class="lonyo-contact-us-icon">
                  <a href="mailto:name@email.com"><img src="{{ asset('frontend') }}/assets/images/contact-us/email.svg"
                      alt=""></a>
                </div>
                <div class="lonyo-contact-us-content">
                  <a href="mailto:name@email.com">
                    <h4>Send Email:</h4>
                    <p>{{ $settings['site_email'] ?? 'Support@gmail.com' }}</p>
                  </a>
                </div>
              </div>
              <div class="lonyo-contact-us-info-item ">
                <div class="lonyo-contact-us-icon">
                  <a href="mailto:name@email.com"><img src="{{ asset('frontend') }}/assets/images/contact-us/phone.svg"
                      alt=""></a>
                </div>
                <div class="lonyo-contact-us-content">
                  <a href="mailto:name@email.com">
                    <h4>Phone Call:</h4>
                    <p>{{ $settings['site_phone'] ?? '+088-345-9876' }}</p>
                  </a>
                </div>
              </div>
              <div class="pb-0 lonyo-contact-us-info-item">
                <div class="lonyo-contact-us-icon">
                  <a href="mailto:name@email.com"><img src="{{ asset('frontend') }}/assets/images/contact-us/email.svg"
                      alt=""></a>
                </div>
                <div class="lonyo-contact-us-content">
                  <h4>Find Us:</h4>
                  <p>Open google maps</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="lonyo-contact-box box2" data-aos="fade-up" data-aos-duration="700">
            <h4>Fill the form below</h4>
            <form action="{{ route('contact.message')}}" method="POST" id="contactForm">
              @csrf
              <div class="lonyo-main-field">
                <p>Full name*</p>
                <input type="text" placeholder="Enter your name" name="name" id="name">
              </div>
              <div class="lonyo-main-field">
                <p>Email address*</p>
                <input type="email" placeholder="Your email address" name="email" id="email">
              </div>
              <p>Message</p>
              <div class="lonyo-main-field-textarea">
                <textarea class="button-text" name="message" id="message"
                  placeholder="Write your message here..."></textarea>
              </div>
              <button class="lonyo-default-btn extra-btn d-block" type="submit">Send your Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end -->
  <div class="responsive-map">
    {{-- <iframe class="lonyo-contact-us-map"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23329.023732868194!2d90.39248976764976!3d23.770650831777527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e1!3m2!1sen!2sbd!4v1764259280744!5m2!1sen!2sbd"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

       <iframe class="lonyo-contact-us-map" src="{{ $settings['site_map'] ?? 'https://www.google.com/maps/embed?pb=default' }}"
                                   width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <div class="lonyo-section-padding4 section">
    <div class="container">
      <div class="lonyo-section-title center">
        <h2>Find answers to all questions below</h2>
      </div>
      <div class="lonyo-faq-wrap1">
        <div class="lonyo-faq-item item2 open" data-aos="fade-up" data-aos-duration="500">
          <div class="lonyo-faq-header">
            <h4>Is my financial data safe and secure?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures
              to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="700">
          <div class="lonyo-faq-header">
            <h4>Can I link multiple bank accounts and credit cards?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures
              to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="900">
          <div class="lonyo-faq-header">
            <h4>How does the app help me stick to my budget?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures
              to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="1100">
          <div class="lonyo-faq-header">
            <h4>Can I track my investments with the app?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures
              to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="1300">
          <div class="lonyo-faq-header">
            <h4>Is the app free, or are there subscription fees?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures
              to protect your sensitive information.</p>
          </div>
        </div>
      </div>
      <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
        <a class="lonyo-default-btn faq-btn2" href="contact-us.html">Can't find your answer,</a>
      </div>
    </div>
  </div>
  <!-- end faq -->

  <div class="lonyo-content-shape">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape2.svg" alt="">
  </div>

  <section class="lonyo-cta-section bg-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
            <img src="{{ asset('frontend') }}/assets/images/v1/cta-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
            <h2>Start a new level of money management</h2>
            <p>Our finance apps and software are powerful tools for managing personal or business finances, helping users
              stay organized, track financial health, and make informed decisions.</p>
            <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
              <ul>
                <li>
                  <a href="https://www.apple.com/app-store/"><img
                      src="{{ asset('frontend') }}/assets/images/v1/app-store.svg" alt=""></a>
                </li>
                <li>
                  <a href="https://playstore.com/"><img src="{{ asset('frontend') }}/assets/images/v1/play-store.svg"
                      alt=""></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end cta -->

@endsection

@push('frontend-js')
  <script>

    // @if(Session::has('message'))
      //   Swal.fire({
      //     position: "top-center",
      //     icon: "success",
      //     title: "Your work has been saved",
      //     showConfirmButton: false,
      //     timer: 2500
      //   });
    // @endif

    // axios.post('contact-us/message', {
    //   name: name,
    //   email: email,
    //   message: message,
    // }).then(function (response) {
    //   alert('Comment sent successfully ✅');

    //   // clear form
    //   document.getElementById('commentForm').reset();
    //  // document.getElementById('parent_id').value = "";

    //   // optional: reload comment section
    //   location.reload();
    // })
    //   .catch(function (error) {
    //     console.log(error);
    //     alert('Something went wrong ❌');
    //   });


    document.getElementById('contactForm').addEventListener('submit', function (e) {
      e.preventDefault();

      let name = document.getElementById('name').value;
      let email = document.getElementById('email').value;
      let message = document.getElementById('message').value;

      axios.post('contact-us/message', {
        name: name,
        email: email,
        message: message
      })
        .then(function (response) {
          // alert('Message sent successfully ✅');
          Swal.fire({
            //     position: "top-center",
            icon: 'success',
            title: response.data.message,
            text: '✅ Thank you for contacting us.',
            showConfirmButton: true,
            timer: 2000
          });

          // Clear form
          document.getElementById('contactForm').reset();
        })
        .catch(function (error) {
          // alert('Something went wrong ❌');
          Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: '❌ Something went wrong. Please try again.',
          });
          console.log(error);
        });
    });

  </script>
@endpush