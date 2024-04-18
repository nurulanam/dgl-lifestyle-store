@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $channel->home_seo['meta_title'] ?? '' }}" />

    <meta name="description" content="{{ $channel->home_seo['meta_description'] ?? '' }}" />

    <meta name="keywords" content="{{ $channel->home_seo['meta_keywords'] ?? '' }}" />
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{  $channel->home_seo['meta_title'] ?? '' }}
    </x-slot>
    <!-- custom banner  -->
    {{-- <div class="main-banner w-full grid grid-cols-12 gap-3 min-h-[640px] ps-[60px]">
        <div class="col-span-1 flex justify-center items-center">
            <p class="-rotate-90 inline-block text-7xl">03 / 04</p>
        </div>
        <div class="col-span-3">
            <img src="{{ asset('themes/shop/store/fixedImg/banner/home-banner-1.jpg') }}" class="h-full object-cover" alt="">
        </div>
        <div class="col-span-3">
            <img src="{{ asset('themes/shop/store/fixedImg/banner/home-banner-2.jpg') }}" class="h-full object-cover" alt="">
        </div>
        <div class="col-span-5">
            <img src="{{ asset('themes/shop/store/fixedImg/banner/home-banner-3.jpg') }}" class="h-full object-cover" alt="">
        </div>
    </div>
     --}}
    <section class="min-h-screen md:min-h-[1280px] flex items-start justify-start pt-[20vh] md:pt-[35vh] bg-home-hero bg-cover bg-no-repeat bg-center">
        <p class="txt-time -rotate-90 inline-block text-white text-7xl">00 / 00</p>
    </section>

    {{-- shop by category  --}}
    <section class="shop-by-category pt-10 md:pt-20 pb-5 bg-neutral-500">
        <div class="px-5 pb-6">
            <h2 class="h-outline text-3xl md:text-4xl text-white font-semibold">TRENDING: Essential Items</h2>
            <p class="py-3 text-white">Our essentials items range from Bathroom essicials | SMART decor electronics | Modern Furniture items - and so much more Multiple customization options are also avaliable.</p>
        </div>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 md:col-span-4">
                <a href="/smart-mirrors" class="text-decoration-none">
                    <img src="{{ asset('themes/shop/store/fixedImg/featured-thumb/smart-mirror.jpg') }}" class="w-full" alt="smart-mirror.jpg">
                    <div class="p-5">
                        <h4 class="text-white text-base font-semibold">Smart Mirrors</h4>
                    </div>
                </a>
            </div>
            <div class="col-span-12 md:col-span-4">
                <a href="/european-doors" class="text-decoration-none">
                    <img src="{{ asset('themes/shop/store/fixedImg/featured-thumb/European-Door.jpg') }}" class="w-full" alt="European-Door.jpg">
                    <div class="p-5">
                        <h4 class="text-white text-base font-semibold">European Doors</h4>
                    </div>
                </a>
            </div>
            <div class="col-span-12 md:col-span-4">
                <a href="/living-room-furniture" class="text-decoration-none">
                    <img src="{{ asset('themes/shop/store/fixedImg/featured-thumb/Living-room-Furniture.jpg') }}" class="w-full" alt="Living-room-Furniture.jpg">
                    <div class="p-5">
                        <h4 class="text-white text-base font-semibold">Living-room Furniture</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>
<!-- Loop over the theme customization -->
@foreach ($customizations as $customization)
@php ($data = $customization->options) @endphp

<!-- Static content -->
@switch ($customization->type)
    {{-- @case ($customization::IMAGE_CAROUSEL)
        <!-- Image Carousel -->
        <x-shop::carousel :options="$data" />

        @break --}}
    {{-- @case ($customization::STATIC_CONTENT)
        <!-- push style -->
        @if (! empty($data['css']))
            @push ('styles')
                <style>
                    {{ $data['css'] }}
                </style>
            @endpush
        @endif

        <!-- render html -->
        @if (! empty($data['html']))
            {!! $data['html'] !!}
        @endif

        @break --}}
    @case ($customization::CATEGORY_CAROUSEL)
        <!-- Categories carousel -->
        <x-shop::categories.carousel
            :title="$data['title'] ?? ''"
            :src="route('shop.api.categories.index', $data['filters'] ?? [])"
            :navigation-link="route('shop.home.index')"
        />
        {{-- @dump($data) --}}
        {{-- <div class="gird grid-cols-12">
            <div class="col-span-2">
                <a href="#">
                    <img src="" alt="">
                    <h4>Colorful Faucets</h4>
                </a>
            </div>
        </div> --}}
        @break
    {{-- @case ($customization::PRODUCT_CAROUSEL)
        <!-- Product Carousel -->
        <x-shop::products.carousel
            :title="$data['title'] ?? ''"
            :src="route('shop.api.products.index', $data['filters'] ?? [])"
            :navigation-link="route('shop.search.index', $data['filters'] ?? [])"
        />

        @break --}}
@endswitch
@endforeach
    {{-- inspiration  --}}
    <section class="inspiration">
        <div class="px-5 pt-10 md:pt-20 pb-7">
            <h2 class="h-outline text-3xl md:text-4xl text-slate-900 font-semibold">INSPIRATION + ADVICE</h2>
        </div>
        <div class="flex flex-wrap items-center pb-3">
            <div class="md:w-1/2 order-0">
                <img src="{{ asset('themes/shop/store/fixedImg/insAdvice/YLighting-Exclusive-Designs.jpg') }}" class="w-full" alt="">
            </div>
            <div class="md:w-1/2 pr-4 pl-4 px-4 pt-5 md:pt-0 lg:px-12 order-1">
                <div class="max-w-620">
                    <h3 class="h-outline text-2xl font-semibold">YLighting Exclusive Designs</h3>
                    <p class="py-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <a href="#" class="text-[#FC3144] hover:text-slate-900">Shop Now<span class="ms-2">></span><span class="-ms-[0.15rem]">></span></a>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center pb-3">
            <div class="md:w-1/2 px-4 md:pe-4 lg:px-12 pt-5 md:pt-0 order-1 md:order-0">
                <div class="max-w-620">
                    <h3 class="h-outline text-2xl font-semibold">Fall Design Event: Rare Steals</h3>
                    <p class="py-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <a href="#" class="text-[#FC3144] hover:text-slate-900">Shop Now<span class="ms-2">></span><span class="-ms-[0.15rem]">></span></a>
                </div>
            </div>
            <div class="md:w-1/2 order-0 md:order-1">
                <img src="{{ asset('themes/shop/store/fixedImg/insAdvice/Fall-Design-Event-Rare-Steals.jpg') }}" class="w-full" alt="">
            </div>
        </div>
        <div class="flex flex-wrap items-center">
            <div class="md:w-1/2 order-0">
                <img src="{{ asset('themes/shop/store/fixedImg/insAdvice/Award-Winning-Designs.jpg') }}" class="w-full" alt="">
            </div>
            <div class="md:w-1/2 pr-4 pl-4 px-4 lg:px-12 pt-5 md:pt-0 order-1">
                <div class="max-w-620">
                    <h3 class="h-outline text-2xl font-semibold">Award-Winning Designs</h3>
                    <p class="py-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <a href="#" class="text-[#FC3144] hover:text-slate-900">Shop Now<span class="ms-2">></span><span class="-ms-[0.15rem]">></span></a>
                </div>
            </div>
        </div>
    </section>

    {{-- new arrivals section  --}}
    <section class="new-arrivals-section pt-20 pb-14">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 md:col-span-4">
                <img src="{{ asset('themes/shop/store/fixedImg/newArrivals/new-arrivals.jpg') }}" class="w-full" alt="smart-mirror.jpg">
                <div class="p-5">
                    <h5 class="text-lg text-slate-900 font-medium">New Arrivals</h5>
                    <p class="py-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#" class="text-[#FC3144] hover:text-slate-900">Shop Now<span class="ms-2">></span><span class="-ms-[0.15rem]">></span></a>
                </div>
            </div>
            <div class="col-span-12 md:col-span-4">
                <img src="{{ asset('themes/shop/store/fixedImg/newArrivals/new-arrivals.jpg') }}" class="w-full" alt="smart-mirror.jpg">
                <div class="p-5">
                    <h5 class="text-lg text-slate-900 font-medium">New Arrivals</h5>
                    <p class="py-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#" class="text-[#FC3144] hover:text-slate-900">Shop Now<span class="ms-2">></span><span class="-ms-[0.15rem]">></span></a>
                </div>
            </div>
            <div class="col-span-12 md:col-span-4">
                <img src="{{ asset('themes/shop/store/fixedImg/newArrivals/new-arrivals.jpg') }}" class="w-full" alt="smart-mirror.jpg">
                <div class="p-5">
                    <h5 class="text-lg text-slate-900 font-medium">New Arrivals</h5>
                    <p class="py-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#" class="text-[#FC3144] hover:text-slate-900">Shop Now<span class="ms-2">></span><span class="-ms-[0.15rem]">></span></a>
                </div>
            </div>
        </div>
    </section>



</x-shop::layouts>
