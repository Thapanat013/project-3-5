<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('pro/css/style.css') }}">
    <title>กุ้งเผาเตาปูน</title>
</head>

<body>
    <nav class="hidden ">
        <div class="container">
            <div class="nav-menu">
                <div>
                    <li><a href="#Home">กุ้งเผาเตาปูน</a></li>
                </div>
                <ul>
                    <li><a href="#Home">หน้าแรก</a></li>
                    <li><a href="#About">เกี่ยวกับเรา</a></li>
                    <li><a href="#MenuGroup">เมนูอาหาร</a></li>
                    <li><a href="#contracts">ติดต่อเรา</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <section id="Home">
        <div class="Home-BG">
            <img src="{{ asset('pro/Img/logo1.jpg') }}" alt="background">
        </div>
        <div class="carousel-caption"></div>
    </section>

    <section id="About">
        <div class="container">
            <h1 class="about-header" style="color: #ff7d29 ;">เกี่ยวกับเรา</h1>
            <div class="about-content">
                <div class="about-image">
                    <img src="{{ asset('pro/Img/about-img.png') }}" alt="About Image" class="about-img">
                </div>
                <div class="about-text">
                    <p>ร้านกุ้งเผาเตาปูน
                        ก่อตั้งขึ้นด้วยความตั้งใจที่จะมอบประสบการณ์การรับประทานอาหารทะเลที่สดใหม่และรสชาติยอดเยี่ยมให้กับลูกค้าทุกท่าน
                        เราคัดสรรกุ้งและอาหารทะเลคุณภาพเยี่ยมจากแหล่งธรรมชาติ พร้อมทั้งนำมาปรุงสดๆ
                        ด้วยวิธีการย่างเตาถ่านแบบโบราณ ซึ่งช่วยให้รสชาติหอมหวาน
                        และเนื้อกุ้งยังคงความสดชุ่มฉ่ำไว้เป็นอย่างดี เรามีเมนูอาหารที่หลากหลายทั้งกุ้งเผา ปูทะเล
                        ปลาหมึกย่าง และอาหารจานเด็ดอื่นๆ ที่จะทำให้คุณได้รับประสบการณ์การทานอาหารทะเลที่ไม่เหมือนใคร
                        ในบรรยากาศอบอุ่นและเป็นกันเอง</p>
                </div>
            </div>
        </div>
    </section>

    @foreach ($category as $key => $data)
        @if ($data->product->isNotEmpty())
            <section id="MenuGroup">
                <div class="menu-group">
                    <h1 class="menu-group">{{ $data->name }}</h1>
                    <div class="slider-container">
                        <div class="slider" data-slider-id="slider-{{ $key }}">
                            @foreach ($data->product as $product)
                                <div class="menu-group-item-col">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    <h3>{{ $product->name }}</h3>
                                    <p>{{ $product->detail }}</p>
                                    <p>ราคา {{ $product->price }} บาท</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="menu-btn">
                            <button class="prevBtn" data-slider-id="slider-{{ $key }}">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="nextBtn" data-slider-id="slider-{{ $key }}">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <section id="contracts">
        <div class="contracts">
            <h1> ติดต่อเรา</h1>
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3874.2941695491277!2d100.5366318!3d13.8213663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDQ5JzE2LjkiTiAxMDDCsDMyJzExLjkiRQ!5e0!3m2!1sth!2sth!4v1731089464483!5m2!1sth!2sth"
            width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-item">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="#">Phone: 123-456-7890</a></li>
                    <li><a href="#">Email: info@restaurant.com</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <h4>Operating Hours</h4>
                <ul>
                    <li>Monday - Thursday: 4:30pm - 11:30pm</li>
                    <li>Friday - Saturday: 4:30pm - 11:59pm</li>
                    <li>Sunday: 5:00pm - 11:30pm</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p><a href="{{ route('login') }}" class="btn custom-orange">เข้าสู่ระบบ</a>
            </p>
            <p>&copy; 2024 Restaurant Name. All rights reserved. | <a href="#">Privacy Policy</a></p>
        </div>
    </footer>

    <script src="{{ asset('pro/js/script.js') }}"></script>

</body>

</html>
