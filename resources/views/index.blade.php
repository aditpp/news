@extends('layout.main')

@section('title', 'Home')

@section('home', 'active')

@section('content')

<!-- Top News Start-->
<div class="top-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="tn-img">
                    <img src="https://asset.kompas.com/crops/eegtBTzC0yEioD2c_qHOT3TjVGQ=/0x741:2400x2341/750x500/data/photo/2023/06/19/648fd225dba91.jpg" />
                    <div class="tn-content">
                        <div class="tn-content-inner">
                            <a class="tn-date" href=""><i class="far fa-clock"></i>24-Jun-2023</a>
                            <a class="tn-title" target="_blank" href="https://tekno.kompas.com/read/2023/06/24/12150007/penyebab-aplikasi-tidak-kompatibel-di-play-store-yang-perlu-diketahui">Penyebab Aplikasi Tidak Kompatibel di Play Store yang Perlu Diketahui</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img class="news-image" src="https://akcdn.detik.net.id/community/media/visual/2022/10/01/marco-bezzecchi-motogp-thailand-motogp-thailand-2022-motogp-2022-mooney-vr46-racing-team_169.jpeg?w=700&q=90" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href=""><i class="far fa-clock"></i>24-Jun-2023</a>
                                    <a class="tn-title" target="_blank" href="https://sport.detik.com/moto-gp/d-6790410/hasil-kualifikasi-motogp-belanda-2023-bezzecchi-pole-bagnaia-kedua">Hasil Kualifikasi MotoGP Belanda 2023: Bezzecchi Pole, Bagnaia Kedua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img class="news-image" src="https://akcdn.detik.net.id/visual/2019/03/13/bb61e187-8be5-4bc4-9a56-a7e7390e1694_169.jpeg?w=715&q=90" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href=""><i class="far fa-clock"></i>25-Jun-2023</a>
                                    <a class="tn-title" target="_blank" href="https://www.cnbcindonesia.com/tech/20230625113100-37-449038/google-mau-hapus-gmail-lakukan-ini-agar-email-tak-hilang">Google Mau Hapus Gmail, Lakukan Ini Agar Email Tak Hilang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img class="news-image" src="https://akcdn.detik.net.id/visual/2021/06/30/beraktifitas-dimasa-ppkm-5_169.jpeg?w=650&q=90" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href=""><i class="far fa-clock"></i>24-Jun-2023</a>
                                    <a class="tn-title" target="_blank" href="https://www.cnnindonesia.com/gaya-hidup/20230622062201-255-965054/status-covid-19-berubah-apa-beda-pandemi-dan-endemi">Status Covid-19 Berubah, Apa Beda Pandemi dan Endemi?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img class="news-image" src="https://asset.kompas.com/crops/huFuUQoyqfznVQ6Tc_u8Hc8U9eQ=/0x0:968x645/750x500/data/photo/2021/01/18/60056ef104191.jpg" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href=""><i class="far fa-clock"></i>22-Jun-2023</a>
                                    <a class="tn-title" target="_blank" href="https://tekno.kompas.com/read/2023/06/22/13331517/generative-ai-bak-pisau-bermata-dua-untuk-keamanan-siber">Generative AI bak Pisau Bermata Dua untuk Keamanan Siber</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->


<!-- Category News Start-->
<div class="cat-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>Sports</h2>
                <div class="row cn-slider">

                    @foreach ($articles1->articles as $article1)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $article1->urlToImage }}" style="height: 200px" />
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>{{ substr($article1->publishedAt, 0, 10) }}</a>
                                        <a class="cn-title" href="{{ $article1->url }}" target="_blank">{{ substr($article1->title, 0, 50) }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>Technology</h2>
                <div class="row cn-slider">
                    @foreach ($articles2->articles as $article2)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $article2->urlToImage }}" style="height: 200px;"/>
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>{{ substr($article2->publishedAt, 0, 10) }}</a>
                                        <a class="cn-title" href="{{ $article2->url }}" target="_blank">{{ substr($article2->title, 0, 50) }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News End-->


<!-- Category News Start-->
<div class="cat-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>Business</h2>
                <div class="row cn-slider">
                    @foreach ($articles3->articles as $article3)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $article3->urlToImage }}" style="height: 200px;"/>
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>{{ substr($article3->publishedAt, 0, 10) }}</a>
                                        <a class="cn-title" href="{{ $article3->url }}" target="_blank">{{ substr($article3->title, 0, 50) }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>Entertainment</h2>
                <div class="row cn-slider">
                    @foreach ($articles4->articles as $article4)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $article4->urlToImage }}" style="height: 200px;"/>
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>{{ substr($article4->publishedAt, 0, 10) }}</a>
                                        <a class="cn-title" href="{{ $article4->url }}" target="_blank">{{ substr($article4->title, 0, 50) }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News End-->


<!-- Main News Start-->
<div class="main-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fas fa-align-justify"></i>Latest News</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mn-img">
                                    <img src="https://akcdn.detik.net.id/visual/2020/09/01/ilustrasi-twitter-1_169.jpeg?w=650&q=90" />
                                </div>
                                <div class="mn-content">
                                    <a class="mn-title" href="">Twitter Sempat Down di Puluhan Negara, Ada Apa Elon?</a>
                                    <a class="mn-date" href=""><i class="far fa-clock"></i>02-Jul-2023</a>
                                    <p>Puluhan negara sempat tak bisa mengakses atau setidaknya mendapat feed 
                                        terbaru dan kolom komentar di Twitter. Pemilik platform Elon Musk mengaku mengeluarkan pembatan baru...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                @foreach ($articles->articles as $index => $article)
                                    @if ($index < 5)
                                        <div class="mn-list">
                                            <div class="mn-img">
                                                <img src="{{ $article->urlToImage }}" />
                                            </div>
                                            <div class="mn-content">
                                                <a class="mn-title" href="">{{ substr($article->title, 0, 50) }}..</a>
                                                <a class="mn-date" href=""><i class="far fa-clock"></i>{{ substr($article->publishedAt, 0, 10) }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Category</h2>
                        <div class="category">
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">National</a></li>
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">International</a></li>
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Economics</a></li>
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Politics</a></li>
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Lifestyle</a></li>
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Technology</a></li>
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Trades</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Tags</h2>
                        <div class="tags">
                            <a href="">National</a>
                            <a href="">International</a>
                            <a href="">Economics</a>
                            <a href="">Politics</a>
                            <a href="">Lifestyle</a>
                            <a href="">Technology</a>
                            <a href="">Trades</a>
                            <a href="">National</a>
                            <a href="">International</a>
                            <a href="">Economics</a>
                            <a href="">Politics</a>
                            <a href="">Lifestyle</a>
                            <a href="">Technology</a>
                            <a href="">Trades</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News End-->


<script>
    // Fungsi untuk mengklik tombol secara otomatis
    function autoclickButton() {
        document.getElementById('autoclick').click();
    }

    // Membaca event saat halaman selesai dimuat
    window.onload = function() {
        // Panggil fungsi autoclickButton() setelah halaman selesai dimuat
        autoclickButton();
        // Matikan pembaruan halaman setelah pemuatan pertama
        clearInterval(refreshInterval);
    };

    // Membaca event saat tombol diklik
    document.getElementById('autoclick').addEventListener('click', function() {
        console.log('Button clicked!');
    });

    // Pembaruan halaman setiap 5 detik
    var refreshInterval = setInterval(function() {
        location.reload();
    }, 5000);
</script>
@endsection