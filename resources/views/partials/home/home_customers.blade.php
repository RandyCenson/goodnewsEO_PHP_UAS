<section id="hero">
  <div class="container mt-0 mt-lg-5">
    <div class="row">
      <div class="col-md-6 pt-5 pt-lg-0 order-md-1 d-flex flex-column justify-content-center" data-aos="fade-up">
        <div>
          <h1>GoodnewsEO</h1>

          <p><b>Selamat Datang di GoodNews Organizer
          Selamat datang di GoodNews Organizer! Kami adalah mitra terbaik Anda 
          dalam merancang dan menyelenggarakan acara yang sempurna dan berkesan. 
          Dengan pengalaman luas dan tim yang berdedikasi, kami siap membantu Anda 
          mewujudkan visi acara Anda, baik itu acara korporat, pernikahan, pesta pribadi, atau acara sosial.</b> 
        </p>
            
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
      <div class="col-md-6 order-md-2 mt-5 mt-lg-0 pt-5 pt-lg-0 d-none d-md-block hero-img" data-aos="fade-left">
        <img src="{{ asset('images\home_cust\template2.jpg') }}" class="img-fluid" alt="Coffee">
        @can('is_admin')
        <a href="/edit/image/1">edit</a>
        @endcan
      </div>
    </div>
  </div>

</section>

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row">

        <div class="col-lg-5 col-md-6 d-none d-md-block">
          <div class="about-img" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('images\home_cust\template2.jpg') }}" alt="laracoffee">
            @can('is_admin')
            <a href="/edit/image/1">edit</a>
            @endcan
          </div>
        </div>

        <div class="col-lg-7 col-md-6">
          <div class="about-content" data-aos="fade-left" data-aos-delay="100">
            <h2>About GoodnewsEO</h2>
            <p>GoodNews Organizer adalah perusahaan penyedia layanan event organizer yang berdedikasi untuk 
              membantu klien dalam merancang, mengatur, dan menyelenggarakan acara yang sukses dan berkesan. Dengan pengalaman dan keahlian di bidang manajemen acara, 
              GoodNews Organizer menawarkan berbagai layanan yang dapat disesuaikan dengan kebutuhan dan anggaran klien, mulai dari acara korporat, 
              konferensi, seminar, hingga pernikahan, pesta ulang tahun, dan acara sosial lainnya.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="services" class="services section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Additional Information</h2>
      </div>

      <div class="row">
        <div class="col-md-12 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
          <div class="icon-box icon-box-pink">
            <div class="icon"><i class="fa fa-fw fa-dumpster"
                style="font-size: 48px;margin-bottom: 15px;line-height: 1;color:orange;"></i></div>
            <h4 class="title"><a href="">Why GoodnewsEo?</a></h4>
            <p class="description">LMenggunakan jasa GoodNews Organizer memiliki banyak keuntungan yang dapat membuat acara Anda lebih sukses dan berkesan. Berikut adalah beberapa alasan mengapa orang harus menggunakan jasa GoodNews Organizer:
Pengalaman dan Profesionalisme: Tim yang berpengalaman memastikan setiap detail acara dikelola dengan baik. <br>
1. Solusi Disesuaikan: Layanan yang dirancang sesuai kebutuhan dan anggaran klien. <br>
2. Kreativitas dan Inovasi: Membuat acara unik dan berkesan dengan ide-ide kreatif.
<br> 3. Jaringan Vendor Luas: Akses ke vendor terpercaya untuk kualitas terbaik.
<br> 4. Efisiensi Waktu dan Anggaran: Menghemat waktu dan biaya dengan manajemen yang efektif.
<br> 5. Manajemen Krisis: Penanganan cepat dan efektif terhadap masalah tak terduga.
<br> 6. Fokus pada Kepuasan Klien: Komitmen untuk memberikan layanan terbaik dan memastikan kepuasan klien.
<br> 7. Pengalaman Peserta Berkesan: Memberikan pengalaman yang menyenangkan dan tak terlupakan bagi peserta.
<br> 8. Reputasi Terpercaya: Reputasi baik di industri event organizer yang dapat diandalkan.
<br> Dengan GoodNews Organizer, Anda mendapatkan layanan profesional dan berkualitas tinggi, memastikan acara Anda berjalan sukses dan berkesan.</p>
           
          </div>
        </div>

        <div class="col-md-12 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box icon-box-cyan">
            <div class="icon"><i class="fa fa-basket-shopping"
                style="font-size: 48px;margin-bottom: 15px;line-height: 1;color:#3fcdc7;"></i></div>
            <h4 class="title"><a href="">Contact us</a></h4>
            <p class="description"> <b>Hubungi Kami,</b> <br>
            Kami siap membantu Anda merencanakan dan menyelenggarakan acara yang sempurna. <br>
            ✨BIG PROMO✨
<br> Let's Make It A Great One
<br> 🙌🏻 CEO by @nikojuniuss
<br> 🎉 Birthday Party
<br> 🪩 Prom Night, etc
<br>📍JABODETABEK
<br> 📞WA/Telp : 0812-2888-8448 (Indra)</p>
          
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
