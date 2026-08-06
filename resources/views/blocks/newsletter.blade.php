<!-- newsletter  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-newsletter relative overflow-hidden bg-[#121911] text-white py-12 lg:py-16' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_newsletter['image']))
	<div class="absolute right-0 top-0 bottom-0 w-full lg:w-1/2 h-full z-0 pointer-events-none">
		<img
			src="{{ $g_newsletter['image']['url'] }}"
			alt="{{ $g_newsletter['image']['alt'] ?? '' }}"
			class="w-full h-full object-cover object-right-top" />

		<div
			class="absolute inset-0 hidden lg:block"
			style="background: linear-gradient(90deg, #12170E 0%, rgba(18, 23, 14, 0.75) 25%, rgba(18, 23, 14, 0.00) 70%);"></div>

		<div
			class="absolute inset-0 lg:hidden"
			style="background: linear-gradient(90deg, #12170E 0%, #12170E 50%, rgba(18, 23, 14, 0.00) 100%);"></div>
	</div>
	@endif

	<div class="__wrapper c-main relative z-10 ">
		<div class="__col grid grid-cols-1 md:grid-cols-2 items-center gap-6 ">

			<div class="_content">
				<h2 data-gsap-element="header" class="text-h5 text-secondary m-header">
					{{ $g_newsletter['header'] }}
				</h2>

				<div data-gsap-element="txt" class="__txt text-secondary">
					{!! $g_newsletter['text'] !!}
				</div>
			</div>

			<div class=" z-10">
				@if (!empty($g_newsletter['shortcode']))
				<div data-gsap-element="form ">
					{!! do_shortcode($g_newsletter['shortcode']) !!}
				</div>
				@endif
			</div>

		</div>
	</div>

</section>