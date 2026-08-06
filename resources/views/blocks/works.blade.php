<!--- works -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-works relative -smt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>



	<div class="__wrapper c-main relative">

		@if (!empty($block_title))
		<div class="text-center mb-8">
			<p class="c-title">{{ $block_title }}</p>
		</div>
		@endif

		@if (!empty($work_items))
		<div class="flex flex-col gap-8">
			@foreach ($work_items as $item)
			<div data-gsap-element="item" class="__col bg-white  relative overflow-hidden">
				<a href="{{ $item['url'] }}" class="absolute inset-0 z-10" aria-label="Zobacz realizację {{ $item['title'] }}"></a>

				<div class="grid grid-cols-1 md:grid-cols-[5fr_3fr] items-center gap-8 md:gap-12">
					<div class="__content p-6 pr-0 md:pr-2">
						<h2 data-gsap-element="header" class="text-h5 m-header">{{ $item['title'] }}</h2>

						<div class="flex flex-wrap gap-2 text-sm text-primary-500 mt-4">
							@if (!empty($item['ship_name']))
								<span class="font-semibold">Nazwa statku:</span> {{ $item['ship_name'] }}
							@endif
							@if (!empty($item['imo']))
							<span class="text-black">•</span>
								<span class="font-semibold">IMO:</span> {{ $item['imo'] }}
							@endif
							@if (!empty($item['unit_type']))
							<span class="text-black">•</span>
								<span class="font-semibold">Typ jednostki:</span> {{ $item['unit_type'] }}
							@endif
							@if (!empty($item['realization_place']))
							<span class="text-black">•</span>
								<span class="font-semibold">Miejsce realizacji:</span> {{ $item['realization_place'] }}
							@endif
						</div>

						@if (!empty($item['excerpt']))
						<div data-gsap-element="txt" class="__txt text-black text-lg mt-6 leading-relaxed">
							<p>{!! $item['excerpt'] !!}</p>
						</div>
						@endif

						<span class="inline-flex items-center gap-2 text-primary mt-8">
							Zobacz realizację <x-icon.arrow-right class="w-3 text-secondary" />
						</span>
					</div>

					<figure data-gsap-element="img" class="__img h-full relative">
						<picture>
							<img class="md:h-120 h-72 w-full object-cover " src="{{ $item['image_url'] ?? '' }}" alt="{{ $item['image_alt'] ?? '' }}">
						</picture>
					</figure>
				</div>

			</div>

			@endforeach
		</div>
		@endif
	</div>
	</div>
</section>