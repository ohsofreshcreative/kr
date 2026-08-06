<!-- proces -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-proces relative  -spb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 lg:grid-cols-2 items-start gap-8 lg:gap-14 z-10 relative">
			<div class="__content py-0 lg:sticky lg:top-36 flex flex-col-reverse lg:flex-col justify-center">
				<div>
					@if (!empty($g_proces['title']))
					<span data-gsap-element="header" class="__title">
						{{ $g_proces['title'] }}
					</span>
					@endif
					@if (!empty($g_proces['header']))
					<h2 data-gsap-element="header" class="m-header text-h3">
						{{ $g_proces['header'] }}
					</h2>
					@endif
					@if (!empty($g_proces['txt']))
					<div data-gsap-element="txt" class=" mb-10 lg:mb-0">
						{!! $g_proces['txt'] !!}
					</div>
					@endif
				</div>
			</div>
			<div class="w-full z-10 relative flex flex-col gap-5 md:gap-6">
				@if(!empty($r_proces))
				@foreach($r_proces as $index => $card)
				<div
					data-gsap-element="stagger"
					@class([ 'w-full p-6 md:p-8 border border-primary-400 border-dashed radius flex flex-col justify-between gap-6 min-h-[160px]' ,
					$card['card_background'] ?? 'bg-white' ,
					])>

					<div class="flex items-start justify-between gap-4">
						<h3 class="text-h5 flex items-start gap-4">
							<span>{{ $loop->iteration }}.</span>
							<span>{{ $card['card_title'] }}</span>
						</h3>
						@if(!empty($card['card_image']))
						<div class="shrink-0">
							<img src="{{ $card['card_image']['url'] }}" alt="{{ $card['card_image']['alt'] ?? '' }}" class="w-12 h-auto object-contain">
						</div>
						@endif
					</div>
					@if(!empty($card['card_text']))
					<p class="mt-12">
						{{ $card['card_text'] }}
					</p>
					@endif
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
	<img class=" w-250 top-50 md:-left-110 -left-180  z-10 absolute pointer-events-none inset-0 opacity-20" src="/wp-content/uploads/2026/08/kr.svg" />
</section>