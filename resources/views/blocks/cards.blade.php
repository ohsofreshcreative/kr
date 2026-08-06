<!--- cards --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cards relative ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main">
		<div class="__top relative z-10">
			@if(!empty($g_cards['title']))
			<span class="__title">{{ $g_cards['title'] }}</span>
			@endif
			<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_cards['header']) }}</h2>
			<p data-gsap-element="text">{{ $g_cards['text'] }}</p>
		</div>
		@if (!empty($r_cards))
		<div class="cards-swiper mt-10 lg:grid lg:grid-cols-3 lg:gap-8">
			@foreach ($r_cards as $item)
			<div data-gsap-element="card" class="__card relative bg-primary radius p-8 ">

				@if (!empty($item['image']['url']))
				<div class="mb-6 flex h-22 w-22 items-center justify-center rounded-full bg-secondary">
					<img class="max-h-12 max-w-12 object-contain" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				</div>
				@endif
				@if (!empty($item['title']))
				<p class="!text-h6 text-secondary m-title">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['text']))
				<p class=" text-white">{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif
	</div>
	<img
		class="absolute z-0 pointer-events-none -right-130 top-26 opacity-30"
		src="/wp-content/uploads/2026/08/rk.svg"
		alt="" />
</section>