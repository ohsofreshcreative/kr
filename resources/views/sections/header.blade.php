@php
use App\Walkers\DropdownWalker;
use App\Walkers\MobileDropdownWalker;

$linkedin_icon = get_field('linkedin_icon', 'option');
$linkedin_icon_url = is_array($linkedin_icon) ? ($linkedin_icon['url'] ?? '') : $linkedin_icon;
$linkedin_link = get_field('linkedin_link', 'option');

$logo_url = '';
$logo_alt = 'Logo';

if (is_array($logo)) {
    $logo_url = $logo['url'] ?? '';
    $logo_alt = $logo['alt'] ?? 'Logo';
} elseif (!empty($logo)) {
    $logo_url = $logo;
}
@endphp

<header x-data="{ mobileOpen: false }" class="relative top-0 z-50 bg-white masthead fixed-top">

	<!-- Desktop Header -->
	<div class="items-center justify-between hidden h-auto py-4 px-12 mx-auto xl:flex bg-white">
		<a class="brand shrink-0" href="{{ home_url('/') }}">
			@if ($logo_url)
				<img src="{{ $logo_url }}" alt="{{ $logo_alt }}" class="w-auto h-18">
			@else
				<span class="text-xl font-bold">{{ $siteName }}</span>
			@endif
		</a>

		<div class="flex items-center ml-auto gap-8">
			@if (has_nav_menu('primary_navigation'))
				<nav
					class="nav-primary"
					aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
					{!! wp_nav_menu([
						'theme_location' => 'primary_navigation',
						'menu_class' => 'nav flex items-center gap-x-6 text-lg font-medium',
						'container' => false,
						'echo' => false,
						'walker' => new DropdownWalker(),
					]) !!}
				</nav>
			@endif

			<div class="flex items-center gap-4">
				@if($linkedin_link && $linkedin_icon_url)
					<a href="{{ $linkedin_link }}" target="_blank" rel="noopener noreferrer" class="block shrink-0">
						<img src="{{ $linkedin_icon_url }}" alt="LinkedIn" class="w-6 h-6">
					</a>
				@endif

				<a href="/umow-rozmowe/" class="btn btn-primary shrink-0">
					Umów rozmowę
				</a>
			</div>
		</div>
	</div>


	<!-- Mobile Header Bar -->
	<div class="flex items-center justify-between p-4 mobile-menu xl:hidden bg-white">
		<a class="brand shrink-0" href="{{ home_url('/') }}">
			@if ($logo_url)
				<img src="{{ $logo_url }}" alt="{{ $logo_alt }}" class="w-auto h-15">
			@else
				<span class="text-lg font-bold">{{ $siteName }}</span>
			@endif
		</a>

		<button
			@click.stop="mobileOpen = !mobileOpen"
			class="p-2 primary bg-white rounded-md"
			aria-expanded="mobileOpen"
			aria-controls="mobile-menu-panel">

			<span class="sr-only">Otwórz menu główne</span>

			<svg x-show="!mobileOpen" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>

			<svg x-show="mobileOpen" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>
	</div>


	<!-- Mobile Menu Panel -->
	<div
		id="mobile-menu-panel"
		x-show="mobileOpen"
		x-cloak
		@click.away="mobileOpen = false"
		@keydown.escape.window="mobileOpen = false"
		x-transition:enter="transition ease-out duration-200"
		x-transition:enter-start="opacity-0 translate-x-full"
		x-transition:enter-end="opacity-100 translate-x-0"
		x-transition:leave="transition ease-in duration-150"
		x-transition:leave-start="opacity-100 translate-x-0"
		x-transition:leave-end="opacity-0 translate-x-full"
		class="fixed top-0 right-0 bottom-0 w-full bg-primary-100 shadow-xl z-[51] overflow-y-auto xl:hidden"
		aria-label="Menu mobilne">

		<div class="p-4 relative z-10">

			<div class="flex items-center justify-between mb-6">
				<a class="brand shrink-0" href="{{ home_url('/') }}">
					<img src="{{ $logo_url }}" alt="{{ $logo_alt }}" class="relative z-[61] w-auto h-12">
				</a>

				<button
					@click="mobileOpen = false"
					class="p-2 text-white rounded-md">

					<span class="sr-only">Zamknij menu</span>

					<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>


			@if (has_nav_menu('primary_navigation'))
				<nav class="flex flex-col space-y-1 mt-20">
					{!! wp_nav_menu([
						'theme_location' => 'primary_navigation',
						'menu_class' => 'nav-mobile flex flex-col space-y-2 text-white',
						'container' => false,
						'echo' => false,
						'walker' => new MobileDropdownWalker(),
					]) !!}
				</nav>
			@endif


			<div class="mt-8">
				<a href="/umow-rozmowe/" class="block w-full btn btn-primary">
					Umów rozmowę
				</a>
			</div>

		</div>

	</div>

</header>