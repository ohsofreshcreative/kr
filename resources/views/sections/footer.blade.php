@php
$contact = get_field('g_contact_info', 'option');
$socials = get_field('social_media', 'option');
$logo_footer = get_field('logo_footer', 'option');
$footer_background = get_field('footer_background', 'option');
@endphp

<footer
	class="footer relative overflow-hidden  text-white " style="background: linear-gradient(270deg, #18260C 0%, #12170E 100%);">
<div class="absolute left-[122px] top-[113px] w-[88px] h-[88px] bg-cream opacity-10 blur-[25px]"></div>
<div class="absolute left-[857px] bottom-[171px] w-[88px] h-[88px] bg-secondary opacity-10 blur-[25px]"></div>
<div class="absolute right-[147px] top-[42px] w-[88px] h-[88px] bg-secondary opacity-10 blur-[25px]"></div>

	<div class="relative z-10 c-main px-6 ">
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 footer-py">
			<div class="flex flex-col gap-3 mx-auto">
				<div>
					@if(!empty($logo_footer))
					<a href="{{ home_url('/') }}" class="inline-block">
						<img
							src="{{ $logo_footer['url'] }}"
							alt="{{ get_bloginfo('name') }}"
							class="max-w-[165px] h-auto">
					</a>
					@endif
				</div>
				
				@if(!empty($contact['phone']))
				<a
					href="tel:{{ str_replace(' ', '', $contact['phone']) }}"
					class="__phone border-t border-primary pt-4 !text-primary-100">
					{{ $contact['phone'] }}
				</a>
				@endif
				@if(!empty($contact['mail']))
				<a
					href="mailto:{{ $contact['mail'] }}"
					class="__mail !text-primary-100">
					{{ $contact['mail'] }}
				</a>
				@endif
				@if(!empty($socials))
				<div class="flex items-center gap-2  mt-1">
					@foreach($socials as $social)
					<a
						href="{{ $social['link'] }}"
						target="_blank"
						class="hover:opacity-80 transition-opacity">

						<img
							src="{{ get_template_directory_uri() }}/resources/images/{{ $social['icon'] }}.svg"
							alt="{{ $social['icon'] }}"
							class="w-6 h-6">
					</a>
					@endforeach
				</div>
				@endif
			</div>
			@for ($i = 1; $i <= 3; $i++)
				@if (is_active_sidebar('sidebar-footer-' . $i))
				<div class="__widgets  flex flex-col gap-3">
				@php(dynamic_sidebar('sidebar-footer-' . $i))
		</div>
		@endif
		@endfor
	</div>
    <!-- <img class="w-80 lg:w-145 -left-44 -bottom-44 lg:-left-72 lg:-bottom-72 z-10 absolute pointer-events-none" src="/wp-content/uploads/2026/08/circle.svg" /> -->
	</div>
		<div class="footer-bottom border-t border-primary-100 w-full ">
		<div class="flex flex-col md:flex-row md:justify-center justify-start items-start md:items-center gap-6 py-10 c-main">
	<p class="border-r border-primary pr-6">
		Copyright ©{{ date('Y') }}
		{{ get_bloginfo('name') }}.
		All Rights Reserved.
	</p>

	<p class="flex items-center gap-2 justify-start">
		Designed &amp; Developed by
		<a
			target="_blank"
			rel="nofollow"
			href="https://www.ohsofresh.pl"
			title="OhSoFresh">
			<img
				class="oh"
				src="{{ get_template_directory_uri() }}/resources/images/ohsofresh.svg"
				alt="OhSoFresh">
		</a>
	</p>
</div>
	</div>
	
</footer>