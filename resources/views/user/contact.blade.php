@extends('user.base')
    
    <!-- section-navbar -->
        @section('konten')
    <!--end section-navbar -->
    <div class="gambar">
      <img src="./images/logo.jpg" alt="" class="img-responsive gambar-navbar">
  </div>

     <!-- section utama contact -->
     <div class="container">
        <div class="contact">
            <div class="row g-4">
                <div class="col-md-4">
                  <div class="card-kontak">
                      <div class="card-body-kontak">
                        <div class="kontak">
                          <h4>Hubungi Kami</h4>
                          <p>SMS / Whatsapp :</p>
                          <div class="d-flex isi-kontak">
                            <i class="bi bi-whatsapp"></i>
                            <p>Admin 1 : 082347618267</p>
                          </div>
                          <div class="d-flex isi-kontak">
                            <i class="bi bi-whatsapp"></i>
                            <p>Admin 2 : 082347618267</p>
                          </div>
                          <hr class="garis-kontak">
                          <P>Email :</P>
                          <div class="d-flex isi-kontak">
                            <i class="bi bi-envelope-open"></i>
                            <p>Tunas-Muda@gmail.com</p>
                          </div>
                          <hr class="garis-kontak">
                          <P>lokasi :</P>
                          <div class="d-flex isi-kontak">
                            <i class="bi bi-geo-alt"></i>
                            <p>Watugede, Jatisrono, Wonogiri </p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                    <div class="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.77295509469!2d111.13064661450913!3d-7.813841879752716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7987197944a335%3A0xacbf4fd7c7ccdb21!2sKabupaten%20Wonogiri%2C%20Jawa%20Tengah%2057691!5e0!3m2!1sid!2sid!4v1649315459732!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="gambar-map"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section utama contact -->
    
    @endsection
