<!--- slider --->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-slider relative  overflow-hidden',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])>

    <img class="absolute w-90 top-1/2 -translate-y-1/2 -left-45 z-0 pointer-events-none " src="/wp-content/uploads/2026/08/circle.svg" />

    <div class="c-main section-py relative z-10">
        
<div class="__wrapper relative z-20 grid grid-cols-1 lg:grid-cols-[7fr_3fr] gap-8 lg:gap-12 mb-12 items-end">
	<div>
		@if (!empty($title))
			<span class="__title">{{ $title }}</span>
		@endif
		@if (!empty($slider_title))
			<h2 class="text-h3">{{ $slider_title }}</h2>
		@endif
	</div>
	@if (!empty($text))
		<div>
			{!! $text !!}
		</div>
	@endif
</div>

        <div class="swiper slider-standard relative !overflow-visible z-20">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                <div class="swiper-slide !h-auto">
                    <div class="bg-secondary py-8 px-6 radius h-full flex flex-col justify-between transition-transform duration-300">
                        <div>

                            
                            <h3 class="text-h6 mb-4">{{ $slide['title'] }}</h3>
                            
                            @if (!empty($slide['excerpt']))
                                <p class=" mb-16">{{ $slide['excerpt'] }}</p>
                            @endif
                        </div>

                        <div class="mt-auto pt-16">
                            <a href="{{ $slide['url'] ?? '#' }}" class="inline-flex items-center justify-between gap-4 bg-white  font-medium px-4 py-2 rounded-[4px] ">
                                <span class="text-sm">Sprawdź szczegóły</span>
                                <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                        <polyline points="7 7 17 7 17 17"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div data-gsap-element="arrows" class="flex items-center gap-3 mt-10">
                <button aria-label="Poprzedni slajd" class="__prev rounded-full bg-[#C3D3B5] hover:bg-[#A3B893] text-white h-12 w-12 flex items-center justify-center cursor-pointer transition-colors duration-300 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button aria-label="Następny slajd" class="__next rounded-full bg-[#4A633B] hover:bg-[#3B502F] text-white h-12 w-12 flex items-center justify-center cursor-pointer transition-colors duration-300 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</section>