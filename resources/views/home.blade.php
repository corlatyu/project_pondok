@extends('dashboard.layouts.main')

@section('content')
<!-- counter start -->
<section class="section bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center flex-wrap" id="counter">
            <div class="col-6 col-lg-3">
                <div class="text-center my-3 counter-box">
                    <div class="counter-content">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahSantriBeranda }}" data-purecounter-duration="1" class="purecounter" style="font-size: 2rem; font-weight: bold;"></span>
                        <p class="counter-name text-muted mb-0 text-uppercase" style="font-size: 1rem;">Total Santri</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="text-center my-3 counter-box">
                    <div class="counter-content">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahSantriAktifBeranda }}" data-purecounter-duration="1" class="purecounter" style="font-size: 2rem; font-weight: bold;"></span>
                        <p class="counter-name text-muted mb-0 text-uppercase" style="font-size: 1rem;">Santri Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="text-center my-3 counter-box">
                    <div class="counter-content">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahSantriAlumni }}" data-purecounter-duration="1" class="purecounter" style="font-size: 2rem; font-weight: bold;"></span>
                        <p class="counter-name text-muted mb-0 text-uppercase" style="font-size: 1rem;">Alumni</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="text-center my-3 counter-box">
                    <div class="counter-content">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahGuru }}" data-purecounter-duration="1" class="purecounter" style="font-size: 2rem; font-weight: bold;"></span>
                        <p class="counter-name text-muted mb-0 text-uppercase" style="font-size: 1rem;">Guru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- counter end -->

<style>
    .counter-box {
        border: 1px solid #ddd; /* Border color */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Padding inside the box */
    }


</style>


     <!-- About start -->
     <section class="section bg-light" id="pendaftaran">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6 text-center">
                    <h6 class="subtitle">INFORMASI PENDAFTARAN</h6>
                    <h2 class="title">المعهد الديني أالأخيار</h2>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-4">
                    <div class="mt-5">
                        <div class="about-icon ms-3">
                        </div>
                        <h5 class="fs-22 mt-4 pt-3 mb-3">Madrasah Ibtidaiyah (MI)</h5>
                        <p class="text-muted">Jenjang pendidikan dasar dengan fokus pada pendidikan agama Islam.</p>
                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalMI">More About <i class="mdi mdi-arrow-right fs-14 ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-5">

                        <h5 class="fs-22 mt-4 pt-3 mb-3">Madrasah Tsanawiyah (MTs)</h5>
                        <p class="text-muted">Jenjang pendidikan menengah pertama dengan pendidikan umum dan agama.</p>
                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalMTs">More About <i class="mdi mdi-arrow-right fs-14 ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-5">

                        <h5 class="fs-22 mt-4 pt-3 mb-3">Madrasah Aliyah (MA)</h5>
                        <p class="text-muted">Jenjang pendidikan menengah atas dengan fokus pada ilmu agama dan umum.</p>
                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalMA">More About <i class="mdi mdi-arrow-right fs-14 ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-5">

                        <h5 class="fs-22 mt-4 pt-3 mb-3">SMP</h5>
                        <p class="text-muted">Sekolah Menengah Pertama dengan pengembangan karakter dan akhlak.</p>
                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalSMP">More About <i class="mdi mdi-arrow-right fs-14 ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-5">

                        <h5 class="fs-22 mt-4 pt-3 mb-3">SMA</h5>
                        <p class="text-muted">Sekolah Menengah Atas dengan persiapan untuk pendidikan tinggi.</p>
                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalSMA">More About <i class="mdi mdi-arrow-right fs-14 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    
 <!-- Modal MI -->
 <div class="modal fade" id="modalMI" tabindex="-1" aria-labelledby="modalMILabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMILabel">Madrasah Ibtidaiyah (MI)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Madrasah Ibtidaiyah adalah jenjang pendidikan dasar yang setara dengan sekolah dasar (SD) dengan penekanan pada pendidikan agama Islam. Kurikulum MI mencakup pelajaran umum dan agama, yang bertujuan membentuk karakter siswa yang berakhlak mulia dan memiliki pengetahuan dasar yang kuat.
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/082932403284" target="_blank" class="btn btn-success">Hubungi Kami di WhatsApp</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal MTs -->
<div class="modal fade" id="modalMTs" tabindex="-1" aria-labelledby="modalMTsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMTsLabel">Madrasah Tsanawiyah (MTs)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Madrasah Tsanawiyah adalah jenjang pendidikan menengah pertama yang setara dengan SMP. MTs memberikan pendidikan umum dan agama dengan tujuan mengembangkan potensi siswa secara menyeluruh, baik dalam aspek akademik maupun spiritual.
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/082932403284" target="_blank" class="btn btn-success">Hubungi Kami di WhatsApp</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal MA -->
<div class="modal fade" id="modalMA" tabindex="-1" aria-labelledby="modalMALabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMALabel">Madrasah Aliyah (MA)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Madrasah Aliyah adalah jenjang pendidikan menengah atas yang setara dengan SMA. MA menekankan pada pendidikan agama Islam serta ilmu pengetahuan umum, membekali siswa dengan pengetahuan dan keterampilan yang diperlukan untuk melanjutkan ke pendidikan tinggi atau memasuki dunia kerja.
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/082932403284" target="_blank" class="btn btn-success">Hubungi Kami di WhatsApp</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SMP -->
<div class="modal fade" id="modalSMP" tabindex="-1" aria-labelledby="modalSMPLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSMPLabel">SMP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sekolah Menengah Pertama (SMP) di Pondok Al-Akhyar menawarkan pendidikan umum dengan penekanan pada pengembangan karakter dan akhlak siswa. Kurikulum yang komprehensif dan kegiatan ekstrakurikuler yang beragam membantu siswa mengembangkan bakat dan minat mereka.
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/082932403284" target="_blank" class="btn btn-success">Hubungi Kami di WhatsApp</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SMA -->
<div class="modal fade" id="modalSMA" tabindex="-1" aria-labelledby="modalSMALabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSMALabel">SMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sekolah Menengah Atas (SMA) di Pondok Al-Akhyar menawarkan pendidikan umum yang komprehensif dengan fokus pada persiapan siswa untuk pendidikan tinggi. Program pendidikan yang disesuaikan dengan kebutuhan siswa membantu mereka mencapai potensi maksimal dan siap menghadapi tantangan masa depan.
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/082932403284" target="_blank" class="btn btn-success">Hubungi Kami di WhatsApp</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    </section>

    <section class="hero-5" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h1 class="mb-4 display-5 fw-semibold">Pendaftaran Online Santri Baru Pondok Al-Akhyar</h1>
                    <p class="text-muted fs-17">Bergabunglah dengan Pondok Pesantren Al-Akhyar untuk mendapatkan pendidikan agama dan umum yang berkualitas. Isi formulir di bawah ini untuk mendaftar sebagai santri baru.</p>
                    <a href="javascript:void(0);" class="btn btn-lg btn-gradient-success mt-4 mb-4 mb-lg-0">Download Formulir <i class="mdi mdi-arrow-right fs-14 ms-1"></i></a>
                </div>
    
                <div class="col-md-8 col-lg-5 offset-lg-1">
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <h5 class="border-bottom fs-22 pb-3 mb-4">Formulir Pendaftaran Santri</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="formFullname" class="form-label text-muted fs-14">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="formFullname" placeholder="Nama...">
                                </div>
                                <div class="mb-3">
                                    <label for="formBirthdate" class="form-label text-muted fs-14">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="formBirthdate">
                                </div>
                                <div class="mb-3">
                                    <label for="formAddress" class="form-label text-muted fs-14">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="formAddress" placeholder="Alamat...">
                                </div>
                                <div class="mb-3">
                                    <label for="formPhone" class="form-label text-muted fs-14">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="formPhone" placeholder="Nomor Telepon...">
                                </div>
                                <div class="mb-3">
                                    <label for="formEmail" class="form-label text-muted fs-14">Alamat Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="formEmail" placeholder="Email...">
                                </div>
                                <div class="mb-4">
                                    <label for="formParentName" class="form-label text-muted fs-14">Nama Orang Tua/Wali <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="formParentName" placeholder="Nama Orang Tua/Wali...">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- About end -->

   <!-- Galeri Kami start -->
<section class="section" id="galeri">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 col-lg-6 text-center">
                <h6 class="subtitle">Galeri Kami</h6>
                <h2 class="title">Momen Berharga di Pondok Pesantren Al-Akhyar</h2>                    
            </div>
        </div>

        <div class="row">
            <ul class="col busi-container-filter categories-filter text-center" id="filter">
                <li><a class="categories tab-active" onclick="filterSelection('all')">Semua Kegiatan</a></li>
                <li><a class="categories tab-active" onclick="filterSelection('kegiatan')">Kegiatan Santri</a></li>
                <li><a class="categories tab-active" onclick="filterSelection('acara')">Acara Khusus</a></li>
                <li><a class="categories tab-active" onclick="filterSelection('lingkungan')">Lingkungan Pondok</a></li>
                <li><a class="categories tab-active" onclick="filterSelection('prestasi')">Prestasi</a></li>
            </ul>
        </div>

        <!-- Galeri -->
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4 filter-box kegiatan acara">
                <div class="card item-box rounded mt-4 overflow-hidden">
                    <div class="position-relative">
                        <img class="item-container img-fluid" src="{{ asset ('landing/images/agency/project-img/gambar1.jpg') }}" alt="Kegiatan Santri" />
                        <div class="item-mask mfp-image" data-src="{{ asset ('landing/images/agency/project-img/gambar1.jpg') }}" data-gallery="myGal"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="fs-18 mb-1">Kegiatan Santri di Hari Raya</h5>
                        <p class="text-muted mb-0">Kegiatan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 filter-box acara">
                <div class="card item-box rounded mt-4">
                    <div class="position-relative">
                        <img class="item-container img-fluid rounded" src="{{ asset ('landing/images/agency/project-img/gambar2.jpg') }}" alt="Acara Khusus" />
                        <div class="item-mask mfp-image" data-src="{{ asset ('landing/images/agency/project-img/gambar2.jpg') }}" data-gallery="myGal"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="fs-18 mb-1">Acara Wisuda Santri</h5>
                        <p class="text-muted mb-0">Acara Khusus</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 filter-box lingkungan">
                <div class="card item-box rounded mt-4">
                    <div class="position-relative">
                        <img class="item-container img-fluid rounded" src="{{ asset ('landing/images/agency/project-img/gambar3.jpg') }}" alt="Lingkungan Pondok" />
                        <div class="item-mask mfp-image" data-src="{{ asset ('landing/images/agency/project-img/gambar3.jpg') }}" data-gallery="myGal"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="fs-18 mb-1">Lingkungan Pondok Pesantren</h5>
                        <p class="text-muted mb-0">Lingkungan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 filter-box prestasi">
                <div class="card item-box rounded mt-4">
                    <div class="position-relative">
                        <img class="item-container img-fluid rounded" src="{{ asset ('landing/images/agency/project-img/gambar4.jpg') }}" alt="Prestasi" />
                        <div class="item-mask mfp-image" data-src="{{ asset ('landing/images/agency/project-img/gambar4.jpg') }}" data-gallery="myGal"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="fs-18 mb-1">Prestasi Santri di Kompetisi</h5>
                        <p class="text-muted mb-0">Prestasi</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-xl-4 filter-box acara">
                <div class="card item-box rounded mt-4">
                    <div class="position-relative">
                        <img class="item-container img-fluid rounded" src="{{ asset ('landing/images/agency/project-img/gambar5.jpg') }}" alt="Acara Khusus" />
                        <div class="item-mask mfp-image" data-src="{{ asset ('landing/images/agency/project-img/gambar5.jpg') }}" data-gallery="myGal"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="fs-18 mb-1">Acara Bazar Kegiatan Sosial</h5>
                        <p class="text-muted mb-0">Acara Khusus</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 filter-box lingkungan">
                <div class="card item-box rounded mt-4">
                    <div class="position-relative">
                        <img class="item-container img-fluid rounded" src="{{ asset ('landing/images/agency/project-img/gambar6.jpg') }}" alt="Lingkungan Pondok" />
                        <div class="item-mask mfp-image" data-src="{{ asset ('landing/images/agency/project-img/gambar6.jpg') }}" data-gallery="myGal"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="fs-18 mb-1">Pemandangan Pondok Pesantren</h5>
                        <p class="text-muted mb-0">Lingkungan</p>
                    </div>
                </div>
            </div>


        </div>
    </div>       
 </div>
    </div>
</section>
<!-- Galeri Kami end -->


   <!-- Testimonials start -->
<section class="section testi-bg" id="testimonial">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 col-lg-6 text-center">
                <h6 class="subtitle text-dark">Testimoni</h6>
                <h2 class="title">Pendapat Santri dan Orang Tua</h2>
                <p class="text-muted">Kami senantiasa berusaha memberikan yang terbaik bagi para santri dan mendapatkan umpan balik yang berharga dari mereka.</p>
            </div>
        </div>

        <div class="row testi-row">
            <div class="col-12">
                <!-- Swiper -->
                <div class="clients-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <img src="{{ asset ('landing/images/users/user-1.jpg') }}" alt="" class="rounded-circle shadow-lg" width="60" />
                                    <h5 class="my-4 pt-2 fs-18 lh-base">" Saya sangat senang dengan pendidikan yang diberikan di Pondok Pesantren Al-Akhyar. Guru-gurunya sangat peduli dan berpengalaman."</h5>

                                    <h6 class="mb-0">Ahmad Fauzi</h6>
                                    <p class="mb-0">Santri</p>
                                    <div class="position-absolute bottom-0 end-0">
                                        <img src="{{ asset ('landing/images/agency/quote.png') }}" alt="" height="45" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <img src="{{ asset ('landing/images/users/user-2.jpg') }}" alt="" class="rounded-circle shadow-lg" width="60" />
                                    <h5 class="my-4 pt-2 fs-18 lh-base">" Lingkungan yang kondusif dan mendukung perkembangan anak saya. Saya sangat puas dengan program-program yang ada di sini.”</h5>

                                    <h6 class="mb-0">Nurul Aini</h6>
                                    <p class="mb-0">Orang Tua</p>
                                    <div class="position-absolute bottom-0 end-0">
                                        <img src="{{ asset ('landing/images/agency/quote.png') }}" alt="" height="45" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <img src="{{ asset ('landing/images/users/user-3.jpg') }}" alt="" class="rounded-circle shadow-lg" width="60" />
                                    <h5 class="my-4 pt-2 fs-18 lh-base">" Program Tahfidz di Pondok Pesantren Al-Akhyar sangat membantu saya dalam menghafal Al-Quran."</h5>

                                    <h6 class="mb-0">Rina Salsabila</h6>
                                    <p class="mb-0">Santri</p>
                                    <div class="position-absolute bottom-0 end-0">
                                        <img src="{{ asset ('landing/images/agency/quote.png') }}" alt="" height="45" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials end -->




<!-- team start -->
<section class="section" id="team">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 col-lg-6 text-center">
                <h6 class="subtitle">Tim Kami</h6>
                <h2 class="title">Tim Hebat di Pondok Pesantren Al-Akhyar</h2>
                <p class="text-muted">Kami memiliki tim yang berdedikasi dan berpengalaman untuk mendidik dan membimbing santri menuju masa depan yang cerah.</p>
            </div>
        </div>

        <div class="team-carousel">
            <div class="team-item">
                <div class="team-bg rounded text-center">
                    <img src="{{ asset ('landing/images/agency/team/human.png') }}" alt="Ustadz Ahmad" class="img-fluid" />
                </div>
                <h5 class="fs-18 mb-0 mt-3">Ustadz Ahmad</h5>
                <p class="text-muted fs-15 mb-4 mb-lg-0">Pimpinan Pondok</p>
            </div>
            <div class="team-item">
                <div class="team-bg rounded text-center">
                    <img src="{{ asset ('landing/images/agency/team/human.png') }}" alt="Ustadzah Nurul" class="img-fluid" />
                </div>
                <h5 class="fs-18 mb-0 mt-3">Ustadzah Nurul</h5>
                <p class="text-muted fs-15 mb-4 mb-lg-0">Kepala Sekolah</p>
            </div>
            <div class="team-item">
                <div class="team-bg rounded text-center">
                    <img src="{{ asset ('landing/images/agency/team/human.png') }}" alt="Ustadz Ali" class="img-fluid" />
                </div>
                <h5 class="fs-18 mb-0 mt-3">Ustadz Ali</h5>
                <p class="text-muted fs-15 mb-4 mb-lg-0">Guru Tahfidz</p>
            </div>
            <div class="team-item">
                <div class="team-bg rounded text-center">
                    <img src="{{ asset ('landing/images/agency/team/human.png') }}" alt="Ustadzah Siti" class="img-fluid" />
                </div>
                <h5 class="fs-18 mb-0 mt-3">Ustadzah Siti</h5>
                <p class="text-muted fs-15 mb-4 mb-lg-0">Guru Agama</p>
            </div>
        </div>
    </div>
</section>
<!-- team end -->

<br>
<br>
<br>
<!-- team end -->


@endsection
