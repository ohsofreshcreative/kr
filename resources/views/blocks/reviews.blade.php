<!--- reviews -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-reviews relative -smt bg-secondary-50' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main">
		<div class="__content">

			<div data-gsap-element="header" class="__wrapper  pb-10">
				@if(!empty($title))
				<span class="__title">{{ $title }}</>
				@endif
				@if(!empty($header))
				<h3 class="text-h3">{{ $header }}</h3>
				@endif
			</div>


			<div class="swiper reviews-swiper !overflow-visible relative z-20">
				<div data-gsap-element="swiper" class="swiper-wrapper">
					@foreach($r_reviews as $card)
					<div class="swiper-slide">
						<div class="__card relative bg-white radius h-full px-6 py-8 border border-primary-100">

							<div class="relative z-10 flex flex-col gap-4 h-full  ">

								<div class="flex flex-col lg:flex-row items-start lg:items-center gap-2 ">
									@if(!empty($card['image']['url']))
									<img src="{{ $card['image']['url'] }}" alt="{{ $card['image']['alt'] ?? '' }}" class=" rounded-full w-10 h-10 object-cover" />
									@endif
									<div class="__who">
										<b class="font-header text-h7">{{ $card['name'] }}</b>
										@if(!empty($card['date']))
    <span class="text-sm text-gray-500 mt-1 block">
        {{ date_i18n('d.m.Y', strtotime($card['date'])) }}
    </span>
@endif
									</div>
 <img class="ml-auto" src="/wp-content/uploads/2026/08/linkedin.svg" />
								</div>
								<span class="text-sm text-primary-800">{{ $card['position'] }}</span>
								@if(!empty($card['txt']))
								<div class="review-content-wrapper">
									<div class="__txt mt-4 line-clamp-4">{!! $card['txt'] !!}</div>
									<button class="btn-more hidden  text-[#929292]  cursor-pointer mt-8">Czytaj więcej</button>
								</div>
								@endif
							</div>
						</div>
					</div>
					@endforeach
				</div>

				<div data-gsap-element="arrows" class="w-full z-10 flex flex-col md:flex-row items-center pointer-events-none gap-4 mt-12">
					<div class="flex items-center pointer-events-none gap-4 order-2 md:order-1">
						<div class="__prev rounded-full bg-primary h-14 w-14 flex items-center justify-center pointer-events-auto cursor-pointer transition-all duration-400 shrink-0">
								<x-icon.arrow-left class="__arrow text-white w-4" />

							</svg>
						</div>
						<div class="__next rounded-full bg-primary h-14 w-14 flex items-center justify-center pointer-events-auto cursor-pointer transition-all duration-300 shrink-0">
								<x-icon.arrow-right class="__arrow text-white w-4" />

						</div>
					</div>

				</div>

			</div>

			<!-- <div class="mt-10">
                <img src="/wp-content/uploads/2025/12/google-1.svg" />
                <a class="!underline">Sprawdź wszystkie opinie</a>
            </div> -->
		</div>
	</div>
	<div id="review-popup" class="review-popup fixed inset-0 bg-black/50 bg-opacity-70 z-[999] flex items-center justify-center p-4 hidden">
		<div class="review-popup__content bg-white rounded-lg shadow-xl p-8 md:p-12 max-w-3xl w-full relative">
			<button class="review-popup__close absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition-colors">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
			<div id="review-popup-text" class="prose max-w-none mb-4">
			</div>
			<div class="flex items-center gap-4">
				<b id="review-popup-author" class="font-header text-xl">
				</b>
			</div>
		</div>
	</div>
	    <img class="w-80 md:-left-60 -left-20 top-1/2 -translate-y-1/2  z-0 absolute pointer-events-none" src="/wp-content/uploads/2026/08/circle.svg" />
</section>