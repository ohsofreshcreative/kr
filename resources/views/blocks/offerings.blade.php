<!-- offerings -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-offerings relative -spt -spb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="absolute w-28 h-28 rounded-full -left-14 top-30 bg-primary"></div>
	<div class="absolute w-28 h-28 rounded-full -right-14 bottom-30 bg-primary-100"></div>
	<div class="__wrapper c-main relative z-10 flex flex-col items-center">
		@if (!empty($g_offerings['title']) || !empty($g_offerings['header']))
		<div class="__top text-center max-w-3xl mx-auto mb-10 md:mb-14">
			@if (!empty($g_offerings['title']))
			<span data-gsap-element="header" class="__title">{{ $g_offerings['title'] }}</span>
			@endif
			@if (!empty($g_offerings['header']))
			<h2 data-gsap-element="header" class="m-header text-h3 text-black/80">{{ $g_offerings['header'] }}</h2>
			@endif
		</div>
		@endif
		<div class="w-full flex flex-col gap-8 md:gap-10">
			@if (!empty($offer_items))
			<div data-gsap-element="card" class="__category-card bg-white radius p-8 md:p-12 shadow-sm border border-primary-100/50 flex flex-col items-center text-center w-full">
				<h3 data-gsap-element="header" class="mb-10">Oferta dla firm</h3>
				<div class="swiper offerings-swiper w-full overflow-hidden">
					<div class="swiper-wrapper">
						@foreach ($offer_items as $item)
						<a href="{{ $item['url'] }}" class="swiper-slide group flex flex-col items-center h-full">

							<div class="flex flex-col items-center w-full">

								<div class="md:w-28 md:h-28 rounded-full bg-primary flex items-center justify-center p-4 mb-4 transition-transform duration-300 group-hover:scale-102">
									@if (!empty($item['icon_url']))
									<img src="{{ $item['icon_url'] }}" alt="{{ $item['icon_alt'] ?: $item['title'] }}" class="w-12 h-12 object-contain">
									@endif
								</div>
								<h4 class="text-h7 text-black/80 min-h-[56px] flex items-start justify-center">
									{{ $item['title'] }}
								</h4>
							</div>
							<div class="mt-auto pt-4 w-full flex justify-center group-hover:translate-x-1 transition-transform duration-300">
								<img src="/wp-content/uploads/2026/08/green-arrow.svg">
							</div>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			@endif
			@if (!empty($private_items))
			<div data-gsap-element="card" class="__category-card bg-white radius p-8 md:p-12 shadow-sm border border-primary-100/50 flex flex-col items-center text-center w-full">
				<h3 data-gsap-element="header" class="mb-10">Oferta dla klientów prywatnych</h3>
				<div class="swiper offerings-swiper w-full overflow-hidden">
					<div class="swiper-wrapper">
						@foreach ($private_items as $item)
						<a href="{{ $item['url'] }}" class="swiper-slide group flex flex-col items-center h-full">

							<div class="flex flex-col items-center w-full">

								<div class="md:w-28 md:h-28 rounded-full bg-primary flex items-center justify-center p-4 mb-4 transition-transform duration-300 group-hover:scale-102">

									@if (!empty($item['icon_url']))
									<img src="{{ $item['icon_url'] }}" alt="{{ $item['icon_alt'] ?: $item['title'] }}" class="w-12 h-12 object-contain">
									@endif
								</div>
								<h4 class="text-h7 text-black/80 min-h-[56px] flex items-start justify-center">
									{{ $item['title'] }}
								</h4>
							</div>
							<div class="mt-auto pt-4 w-full flex justify-center group-hover:translate-x-1 transition-transform duration-300">
								<img src="/wp-content/uploads/2026/08/green-arrow.svg">
							</div>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			@endif
		</div>
		@if (!empty($button['url']))
		<div class="mt-10 md:mt-14">
			<x-button
				:href="$button['url']"
				:target="$button['target'] ?? '_self'"
				variant="btn-outline-primary"
				class="btn-outline-primary"
				data-gsap-element="btn">
				{{ $button['title'] }}
			</x-button>
		</div>
		@endif
	</div>
</section>