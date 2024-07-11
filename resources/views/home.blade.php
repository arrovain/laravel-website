@extends('layouts.app')

@section('content')
<section class="news-section">
    <h2>HABERLER</h2>
    <p>Sigortacılığımıza en değerli sigortacılarımıza çözümlerimiz en uygun şartlarla sunmayı kuruluş ve hizmet felsefemiz olarak benimsedik. Bağımsızlığın en önemeli nedeni, her biri kendi alanında uzman olan çalışanlarımızdır.</p>
    
    <div class="news-grid">
        @foreach($news as $item)
        <div class="news-item">
            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
            <h3>{{ $item->title }}</h3>
            <p>{{ Str::limit($item->content, 100) }}</p>
            <a href="#" class="btn btn-primary">Devamını oku</a>
        </div>
        @endforeach
    </div>
</section>

<footer>
    <div class="social-media">
        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
    </div>
    
    <div class="footer-content">
        <div class="company-info">
            <img src="{{ asset('images/hercan-logo.png') }}" alt="Hercan Logo">
            <p>2014 yılında kurulan şirketimiz Türkiye Genelinde 100'den fazla şubesi ve +25 acentesiği ile 10 yıldır sigortacılık sektöründe hizmet vermeye devam etmektedir.</p>
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        
        <div class="blog">
            <h3>Blog</h3>
            <ul>
                @foreach($news as $item)
                <li><a href="#">{{ $item->title }}</a></li>
                @endforeach
            </ul>
        </div>
        
        <div class="contact-info">
            <h3>İletişim Bilgileri</h3>
            <p><i class="fas fa-map-marker-alt"></i> Gevher Nesibe Mah.Tuğba Sok No:1, İç Merkez No 21 38015 Kocasinan/KAYSERİ</p>
            <p><i class="fas fa-envelope"></i> info@tercan.com.tr</p>
            <p><i class="fas fa-phone"></i> Telefon: +90 (352) 231 43 43</p>
            <p>Kampanyalarımızdan ve genel bültenlerimizden haberdar olmak için e-posta listemize kayıt olun!</p>
            <a href="#" class="btn btn-primary">Kayıt Olun</a>
        </div>


        ı
    </div>
    
    <div class="copyright">
        <p>Telif Hakkı © 2024 Tercan Sigorta </p>
        <p>Tüm Hakları Saklıdır.</p>
    </div>
</footer>
@endsection