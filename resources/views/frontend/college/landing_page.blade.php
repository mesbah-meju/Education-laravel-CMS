@extends('frontend.college.layouts.app')

@section('content')
<section class="special-announcement-section">
    <div class="container position-relative">
        <div class="marquee-title">
            <i class="fa fa-bell-o"></i>
            <span>বিশেষ ঘোষণা</span>
        </div>
        <div class="top-marquee">
            <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop()"
                onmouseout="this.start()">
                <ul>
                    <li class="d-flex">
                        @foreach($important_notices as $important_notice)
                        <a class="me-5" href="#" data-bs-toggle="modal" data-bs-target="#newsModal"
                            data-content="{{$important_notice->description}}"
                            onclick="showNewsModal(this)">
                            <div class="datenews">{{ \Carbon\Carbon::parse($important_notice->start_date)->format('F j, Y') }}</div>
                            {{$important_notice->title}}
                        </a>
                        @endforeach
                    </li>
                </ul>
            </marquee>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsModalLabel">বিশেষ ঘোষণা</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalContent">
                        <!-- Dynamic content will appear here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="slider-section position-relative">
    <div>
        <div id="schoolCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="@if(get_setting('caption_is_active') === '1')banner-overlay @endif"></div>
                    <img src="{{asset(get_setting('banner_slider_1_image'))}}" class="d-block w-100 banner-img" alt="School Banner">
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="@if(get_setting('caption_is_active') === '1')banner-overlay @endif"></div>
                    <img src="{{asset(get_setting('banner_slider_2_image'))}}" class="d-block w-100 banner-img" alt="School Banner">
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="@if(get_setting('caption_is_active') === '1')banner-overlay @endif"></div>
                    <img src="{{asset(get_setting('banner_slider_3_image'))}}" class="d-block w-100 banner-img" alt="School Banner">
                </div>
            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#schoolCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#schoolCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- CTA Overlay -->
        @if(get_setting('caption_is_active') === '1')
        <div class="carousel-caption-custom position-absolute top-50 start-50 translate-middle">
            <div class="container text-center text-md-start carousel-caption-box rounded-4">
                <h1 class="fw-bold display-4 text-white mb-3">
                    {{ get_setting('school_name') }}
                </h1>
                <p class="fs-5 text-white mb-4">
                    {{ get_setting('school_eiin') }} <br>
                    {{ get_setting('school_est') }}
                </p>
                <div>
                    <a href="{{ route('admission_info') }}" class="btn btn-primary btn-lg me-2 rounded-pill shadow">Admission</a>
                    <a href="{{ route('contact_us') }}" class="btn btn-outline-light btn-lg rounded-pill shadow">Contact Us</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>


<section class="welcome-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- About Intro -->
            <div class="col-md-4 d-flex align-items-center">
                <div class="about-intro text-white">
                    <div class="sec-title mb-4">
                        <div class="subtitle">Welcome To</div>
                        <h3 class="title mb-3">
                            <span>{{get_setting('school_name')}}</span>
                        </h3>
                        <div class="desc">
                            {{ \Illuminate\Support\Str::words(get_setting('about_us_description'), 70, '...') }}
                        </div>
                    </div>
                    <div class="btn-part">
                        <a class="btn btn-outline-primary rounded-pill px-4 py-2" href="#">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            @php
            use Illuminate\Support\Str;

            $headteacherMessage = get_setting('headmaster_speech');

            $chairmanMessage = get_setting('secretary_speech');

            $headteacherPreview = Str::words(strip_tags($headteacherMessage), 30, '...');
            $chairmanPreview = Str::words(strip_tags($chairmanMessage), 30, '...');

            if (Str::endsWith($headteacherPreview, '...')) {
            $previewWithoutEllipsis = Str::replaceLast('...', '', $headteacherPreview);
            } else {
            $previewWithoutEllipsis = $headteacherPreview;
            }

            if (Str::endsWith($chairmanPreview, '...')) {
            $previewChairmanWithoutEllipsis = Str::replaceLast('...', '', $chairmanPreview);
            } else {
            $previewChairmanWithoutEllipsis = $chairmanPreview;
            }

            $headteacherRemaining = trim(str_replace($previewWithoutEllipsis, '', $headteacherMessage));
            $chairmanRemaining = trim(str_replace($previewChairmanWithoutEllipsis, '', $chairmanMessage));
            @endphp

            <div class="col-md-8">
                <!-- Headteacher Message -->
                <div class="p-3 rounded shadow-sm d-flex flex-md-row flex-column align-items-center bg-soft-blue mb-3">
                    <div class="image-wrap me-md-3 mb-3 mb-md-0">
                        <img src="{{asset(get_setting('headmaster_image') )}}"
                            alt="প্রধান শিক্ষকের ছবি" class="img-fluid rounded message-img" />
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="mb-2" style="color: #00465b;">অধ‌্যক্ষের বাণী</h5>
                        <p class="desc mb-2" style="line-height: 1.7;">
                            {!! nl2br(e($headteacherPreview)) !!}
                            @if($headteacherRemaining)
                            <span id="headteacherMore" class="collapse">
                                {!! nl2br(e($headteacherRemaining)) !!}
                            </span>
                            <a href="#" class="text-danger ms-1" data-bs-toggle="collapse"
                                data-bs-target="#headteacherMore" aria-expanded="false" data-toggle-type="readmore" aria-controls="headteacherMore"
                                onclick="toggleReadMore(this); return false;">
                                আরও পড়ুন
                            </a>
                            @endif
                        </p>
                        <div class="mt-2">
                            <strong class="text-dark">{{ get_setting('headmaster_name') ?? 'Principal/ Headmaster' }}</strong><br />
                            <strong class="text-dark">- {{ get_setting('school_name') ?? 'school name' }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Chairman Message -->
                <div
                    class="p-3 rounded shadow-sm d-flex flex-md-row flex-column align-items-center bg-soft-secondary mb-3">
                    <div class="image-wrap me-md-3 mb-3 mb-md-0">
                        <img src="{{asset(get_setting('secretary_image') )}}"
                            alt="সভাপতির ছবি" class="img-fluid rounded message-img" />
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="mb-2" style="color: #660000;">সভাপতির বাণী</h5>
                        <p class="desc mb-2" style="line-height: 1.7;">
                            {!! nl2br(e($chairmanPreview)) !!}
                            @if($chairmanRemaining)
                            <span id="chairmanMore" class="collapse">
                                {!! nl2br(e($chairmanRemaining)) !!}
                            </span>
                            <a href="#" class="text-danger ms-1" data-bs-toggle="collapse" data-toggle-type="readmore"
                                data-bs-target="#chairmanMore" aria-expanded="false" aria-controls="chairmanMore"
                                onclick="toggleReadMore(this); return false;">
                                আরও পড়ুন
                            </a>
                            @endif
                        </p>
                        <div>
                            <strong class="text-dark">{{ get_setting('secretary_name') ?? 'Secretary' }}</strong><br />
                            <strong class="text-dark">- {{ get_setting('school_name') ?? 'school name' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- ✅ Institution history -->
<section class="institution-information-section">
    <div class="container">
        <div class="row" style="padding: 0px;">
            <div class="col-md-9">
                <div class="col-md-12" style="padding: 0px; margin: 0px;">
                    <div class="history-school mb-2">
                        <h3>{{get_setting('school_history_title')}}</h3>
                    </div>
                </div>
                <div class="px-2 align-items-center">
                    <div class="row py-2 bg-white rounded shadow-sm align-items-center">
                        <div class="col-md-4">
                            <img src="{{asset(get_setting('school_history_image') )}}"
                                class="img-fluid image-size" />
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 p-0" style="font-size: 16px; color:#000; text-align: justify;">
                                {{get_setting('school_history_description')}}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Info Cards -->
                <div class="row" style="margin-top: 30px;">
                    <!-- Card 1 -->
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="card-header-custom">ছাত্রছাত্রীদের তথ্য</div>
                            <div class="card-body-custom">
                                <div class="card-icon">
                                    <img src="{{ asset('/public/assets/icons/students_Information.png') }}"
                                        alt="Icon">
                                </div>
                                <div class="card-list">
                                    <ul>
                                        <li><a href="{{ route('total_students') }}">ছাত্রছাত্রীর আসন সংখ্যা</a></li>
                                        <li><a href="{{ route('total_students') }}">ভর্তি তথ্য</a></li>
                                        <li><a href="{{ route('notice') }}">নোটিশ</a></li>
                                        <li><a href="{{ route('routine') }}">রুটিন</a></li>
                                        <li><a href="{{get_setting('youtube_link')}}">অনলাইন ক্লাস লিংক</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="card-header-custom" style="background-color: #660000;">শিক্ষকদের তথ্য</div>
                            <div class="card-body-custom">
                                <div class="card-icon">
                                    <img src="{{ asset('/public/assets/icons/teachers_Information.png') }}" alt="Icon">
                                </div>
                                <div class="card-list">
                                    <ul>
                                        <li><a href="{{ route('teacher_team') }}">শিক্ষকবৃন্দ</a></li>
                                        <li><a href="#">শূণ্যপদের তালিকা</a></li>
                                        <li><a href="{{ route('head_master') }}">প্রধান শিক্ষক</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="card-header-custom" style="background-color: #00465b;">ডাউনলোড</div>
                            <div class="card-body-custom">
                                <div class="card-icon">
                                    <img src="{{ asset('/public/assets/icons/download.png') }}" alt="Icon">
                                </div>
                                <div class="card-list">
                                    <ul>
                                        <li><a href="{{ route('routine') }}">এসএসসি পরীক্ষার রুটিন
                                                ডাউনলোড</a></li>
                                        <li><a href="#">ছুটির নোটিশ ডাউনলোড</a></li>
                                        <li><a href="{{ route('admission_info') }}">ভর্তি ফরম ডাউনলোড</a></li>
                                        <li><a href="{{ route('routine') }}">পরীক্ষার রুটিন ডাউনলোড</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="card-header-custom" style="background-color: #660000;">একাডেমীক তথ্য</div>
                            <div class="card-body-custom">
                                <div class="card-icon">
                                    <img src="{{ asset('/public/assets/icons/academic_Information.png') }}" alt="Icon">
                                </div>
                                <div class="card-list">
                                    <ul>
                                        <li><a href="{{ route('notice') }}">নোটিশ</a></li>
                                        <li><a href="#">কক্ষ সংখ্যা</a></li>
                                        <li><a href="#">ছুটির তালিকা</a></li>
                                        <li><a href="#">মাল্টিমিডিয়া ক্লাসরুম</a></li>
                                        <li><a href="{{ route('total_students') }}">ছাত্রছাত্রীর আসন সংখ্যা</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <section class="rounded" style="background-color: #00465b; padding: 40px 0;">
                    <div class="container text-center">
                        <h5 style="color: #ffffff; font-size: 18px;">ম্যানেজিং কমিটি</h5>
                        <h3 style="color: #ffffff; font-size: 24px; font-weight: 500;">আমাদের সফল ম্যানেজিং কমিটি</h3>

                        <div class="row justify-content-center mt-4 g-3">

                            @foreach($committees as $committee)
                            <div class="col-sm-6 col-md-3">
                                <div style="background: #ffffff; padding: 10px; border-radius: 8px;">
                                    <img src="{{asset($committee->photo_path)}}"
                                        alt="{{$committee->name}}" class="img-fluid rounded mb-2"
                                        style="height: 160px; object-fit: cover;">
                                    <h6 style="margin: 0; color: #660000;">{{$committee->name}}</h6>
                                    <small style="color: #00465b;">{{$committee->designation}}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3">
                <div class="list-button">
                    <ul>
                        <li>
                            <a href="{{ route('admission_info') }}" class="button"><i class="fa fa-arrow-circle-o-right"></i>ভর্তি তথ্য</a>
                        </li>
                        <li>
                            <a href="{{ route('admission_info') }}" class="button"><i class="fa fa-arrow-circle-o-right"
                                    aria-hidden="true"></i>ভর্তি ফরম</a>
                        </li>
                        <li><a href="{{ route('image_category') }}" class="button"><i class="fa fa-arrow-circle-o-right"
                                    aria-hidden="true"></i>ফটোগ্যালারী</a>
                        </li>
                        <li>
                            <a href="{{ route('image_category') }}" class="button"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>ভিডিও গ্যালারী</a>
                        </li>
                    </ul>
                </div>

                <div class="notice-board">
                    <h3>নোটিশ বোর্ড</h3>
                    <div class="content-notice">
                        <ul class="notice-list mb-0">
                            @foreach($notices as $notice)
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#noticeModal"
                                    data-title="{{ $notice->title }}" data-date="{{ $notice->start_date }}"
                                    data-description="{{ $notice->description }}" onclick="showNoticeModal(this)">
                                    <div class="datenews">{{ \Carbon\Carbon::parse($notice->start_date)->format('F j, Y') }}
                                    </div>
                                    {{ $notice->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- notice Modal -->
                <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow-lg rounded-3">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="noticeModalLabel">নোটিশ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 id="modalNoticeTitle" class="fw-semibold mb-3"></h5>
                                <small id="modalNoticeDate" class="text-muted d-block mb-2"></small>
                                <p id="modalNoticeContent" class="mb-0"></p>
                            </div>
                            <div class="modal-footer bg-light">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বন্ধ করুন</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="official-link">
                    <h3>অফিসিয়াল লিংক</h3>
                    <ul>
                        @foreach($officiallinks as $officiallink)
                        <li><a href="{{ $officiallink->link_url }}" target="_blank"><i
                                    class="fa fa-arrow-circle-o-right"
                                    aria-hidden="true"></i>{{$officiallink->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>


                <div class="important-info">
                    <h3>গুরুত্বপূর্ণ তথ্য</h3>
                    <ul>
                        @foreach($importantinformationlinks as $importantinformationlink)
                        <li><a href="{{ $importantinformationlink->link_url }}" target="_blank"><i
                                    class="fa fa-arrow-circle-o-right"
                                    aria-hidden="true"></i>{{$importantinformationlink->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>



                <div class="official-link" style="border: 1px solid #000;">
                    <h3 style="background:#ffffff; color:#000;">FAQs</h3>
                    <div class="accordion" id="faqAccordion">
                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}" style="font-size: 1rem; font-weight: 500;">
                                    {{ $faq->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="font-size: 0.8rem; line-height: 1.4; max-height: 5.5em; overflow: hidden; text-overflow: ellipsis;">
                                    {!! nl2br(e($faq->description)) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- ✅ Teachers Team Section -->
<section class="teachers-team-section">
    <div class="container mb-5">
        <div class="row">
            <div class="testimonial-section" id="testimonial">
                <div class="col-md-12">
                    <div class="services-title text-center mt-5">
                        <h5 style="font-size:20px; color: #000;">শিক্ষক</h5>
                        <h2 class="text-lg mt-3" style="font-size: 30px;font-weight: 500; color: #000;">আমাদের সম্মানিত শিক্ষক মণ্ডলী</h2>
                    </div>
                </div>

                <div id="teacherCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">
                        @foreach($teachers->chunk(4) as $chunkIndex => $teacherChunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="container">
                                <div class="row justify-content-center">
                                    @foreach($teacherChunk as $teacher)
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="teacher-card text-center rounded" style="cursor:pointer;"
                                            data-bs-toggle="modal" data-bs-target="#teacherModal"
                                            data-name="{{ $teacher->name }}"
                                            data-designation="{{ $teacher->designation->name }}"
                                            data-photo="{{ asset($teacher->photo_path) }}"
                                            data-qualification="{{ $teacher->qualification }}"
                                            data-biography="{{ $teacher->biography }}"
                                            data-join_date="{{ \Carbon\Carbon::parse($teacher->join_date)->format('d M Y') }}">
                                            <img src="{{ asset($teacher->photo_path) }}" alt="Teacher"
                                                class="teacher-img">
                                            <div class="teacher-info mt-3">
                                                <h4>{{ $teacher->name }}</h4>
                                                <p>{{ $teacher->designation->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#teacherCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#teacherCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="btn-part d-flex justify-content-center">
                        <a class="btn btn-outline-primary rounded-pill px-4 py-2" href="{{ route('teacher_team') }}">আরও
                            দেখুন</a>
                    </div>

                <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow rounded-3">

                            <!-- Modal Header -->
                            <div class="modal-header py-3 px-4 rounded-top">
                                <h5 class="modal-title fw-bold fs-4" id="teacherModalLabel">Teacher Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body px-4 py-4">

                                <!-- Flex container: photo on left, info on right -->
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4 mb-4">

                                    <!-- Teacher Photo -->
                                    <img id="modalTeacherPhoto" src="" alt="Teacher Photo"
                                        class="rounded shadow-sm flex-shrink-0"
                                        style="width: 140px; height: 140px; object-fit: cover;" />

                                    <!-- Info container -->
                                    <div class="text-center text-md-start">
                                        <h4 id="modalTeacherName" class="fw-bold mb-2"></h4>
                                        <p id="modalTeacherDesignation" class="mb-1"></p>
                                        <p id="modalTeacherQualification" class="mb-1"></p>
                                        <p id="modalTeacherJoinDate" class="mb-0"></p>
                                    </div>
                                </div>

                                <!-- Biography section -->
                                <section>
                                    <h6 class="fw-semibold mb-3">Biography</h6>
                                    <p id="modalTeacherBiography" class="mb-0"
                                        style="white-space: pre-wrap; line-height: 1.5; text-align: justify;"></p>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only target toggles with data-toggle-type="readmore"
        const toggles = document.querySelectorAll('[data-bs-toggle="collapse"][data-toggle-type="readmore"]');

        toggles.forEach(function(link) {
            const targetSelector = link.getAttribute('data-bs-target');
            const target = document.querySelector(targetSelector);

            if (!target) return;

            target.addEventListener('shown.bs.collapse', function() {
                link.textContent = 'কম পড়ুন';
            });

            target.addEventListener('hidden.bs.collapse', function() {
                link.textContent = 'আরও পড়ুন';
            });
        });
    });


    function showNoticeModal(element) {
        const title = element.getAttribute('data-title');
        const date = element.getAttribute('data-date');
        const description = element.getAttribute('data-description');

        document.getElementById('modalNoticeTitle').innerText = title;
        document.getElementById('modalNoticeDate').innerText = date;
        document.getElementById('modalNoticeContent').innerText = description;
    }

    $(document).ready(function() {
        $('#teacherModal').on('show.bs.modal', function(event) {
            let trigger = $(event.relatedTarget);
            let name = trigger.data('name');
            let designation = trigger.data('designation');
            let photo = trigger.data('photo');
            let qualification = trigger.data('qualification');
            let biography = trigger.data('biography');
            let joinDate = trigger.data('join_date');

            let modal = $(this);
            modal.find('#modalTeacherName').text(name);
            modal.find('#modalTeacherDesignation').text(designation);
            modal.find('#modalTeacherPhoto').attr('src', photo);
            modal.find('#modalTeacherQualification').text("Qualification: " + qualification);
            modal.find('#modalTeacherJoinDate').text("Joined on: " + joinDate);
            modal.find('#modalTeacherBiography').text(biography);
        });
    });
</script>
@endsection