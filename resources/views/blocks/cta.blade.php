<!--- cta -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-cta relative -smt',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
		$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper relative overflow-hidden -spt -spb">
		@if (!empty($g_octa['image']['url']))
		<figure class="absolute inset-0 m-0 z-0">
			<picture>
				<img src="{{ $g_octa['image']['url'] }}" alt="" class="w-full h-full object-cover object-right">
			</picture>
		</figure>
		@endif

		<div class="absolute inset-0 bg-primary-900/80"></div>

		<div class="__inside c-main grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 lg:gap-12 relative z-20 items-stretch">

			<div class="__content h-full radius bg-card-100 p-10 relative flex flex-col">
				@if (!empty($g_octa['header']))
				<p data-gsap-element="header" class="block text-h4 !m-header mb-6">{{ $g_octa['header'] }}</p>
				@endif

				@if (!empty($g_octa['txt']))
				<div data-gsap-element="txt" class="mb-6">{!! $g_octa['txt'] !!}</div>
				@endif

				@if (!empty($g_octa['phone']))
				<p data-gsap-element="phone" class="block __phone mb-2">{{ $g_octa['phone'] }}</p>
				@endif

				@if (!empty($g_octa['mail']))
				<p data-gsap-element="mail" class="block __mail">{{ $g_octa['mail'] }}</p>
				@endif

				<img class="w-70 bottom-2 right-4 z-0 absolute pointer-events-none" src="/wp-content/uploads/2026/08/large_phone.svg" />
			</div>

			@if ($form)
			<div data-gsap-element="form" class="h-full bg-secondary radius p-10 flex flex-col">
				<h4 class="!text-primary mb-4">{!! $g_octa['title'] !!}</h4>
				{!! do_shortcode($g_octa['shortcode']) !!}
			</div>
			@endif

		</div>

	</div>

</section>