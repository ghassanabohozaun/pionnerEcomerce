<section id="hero" class="hero  " style="margin-bottom: 100px">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper hero-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide  "
                    style="background:url( {!! asset('uploads/sliders/' . $slider->photo) !!}) no-repeat center center; background-size: cover;">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">UP TO <span class="wrapper-inner-title">70%</span> OFF
                                    </h5>
                                    <h1 class="wrapper-details">{{ $slider->title }}</h1>
                                    <a href="{{ route('website.index') }}" class="shop-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
