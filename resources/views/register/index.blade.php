@extends('layouts.base')

@section('title', 'Pengajuan barang dan jasa')

@section('content')


  <main class="main">


    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
    </section><!-- /Call To Action Section -->

        <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Register</h2>
        <p>Silahkan Daftarkan Usaha Kamu Disini</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

             <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    A simple danger alert—check it out!

                <ul>
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif


          <div class="col-lg-12">
            <form action="/register" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Nama Usaha</label>
                  <input type="text" name="name" id="nama_usaha" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required="">
                </div>


                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="10" id="alamat" required=""></textarea>
                </div>

                  <div class="col-md-6">
                  <label for="name-field" class="pb-2">No NPWP</label>
                  <input type="text" name="name" id="npwp" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required="">
                </div>


                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your register has been sent. Thank you!</div>

                  <button type="submit">Register</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
  </main>
  @endsection
