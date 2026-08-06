<!-- hero -->
<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif @class(['b-hero relative overflow-hidden', $sectionClass => filled($sectionClass), $section_class => filled($section_class)])>
    <div class="c-main relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-12 pt-20">
            <div class="text-left relative"> 
                <img class="w-20 sm:w-28 lg:w-44 absolute -top-12 right-0 md:top-auto md:-bottom-8 md:right-4 lg:-top-16 lg:left-0 lg:right-auto z-10 pointer-events-none" src="/wp-content/uploads/2026/08/creativity.svg" />

                @if(!empty($g_hero['title']))
                <h1 data-gsap-element="header" class="text-h2 m-header">{!! $g_hero['title'] !!}</h1>
                @endif
                @if(!empty($g_hero['text']))
                <div data-gsap-element="text" class="mt-4">{!! $g_hero['text'] !!}</div>
                @endif
                <div class="inline-buttons flex flex-wrap gap-4 mt-6">
                    @if(!empty($g_hero['button1']))
                    <x-button :href="$g_hero['button1']['url']" variant="primary" data-gsap-element="btn">{{ $g_hero['button1']['title'] }}</x-button>
                    @endif
                    @if(!empty($g_hero['button2']))
                    <x-button :href="$g_hero['button2']['url']" variant="white" data-gsap-element="btn">{{ $g_hero['button2']['title'] }}</x-button>
                    @endif
                </div>
            </div>
            <div class="flex flex-col items-center justify-center lg:justify-self-end w-full">
                @if(!empty($g_hero['image']))
                <div class="relative mt-4 lg:mt-0">
                    <div class="absolute inset-0 rounded-full bg-secondary translate-x-3 -translate-y-2 max-lg:translate-y-2"></div>
                    <img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] ?? '' }}" class="relative z-10 w-[366px] h-[366px] lg:w-[580px] lg:h-[580px] rounded-full object-cover">
                    <div class="absolute z-20 bottom-15 left-1/2 -translate-x-1/2 bg-secondary-500 px-5 py-2 lg:px-6 lg:py-3 rounded-full whitespace-nowrap text-xs lg:text-xl text-brown rotate-10">{{ $g_hero['name'] ?? '' }}</div>
                </div>
                @endif
                @if(!empty($g_hero['logos']))
    <div class="grid grid-cols-1 sm:grid-cols-3 items-center justify-items-center gap-6 mt-8">
        @foreach($g_hero['logos'] as $logo)
            @if(!empty($logo['logo']))
                <img 
                    src="{{ $logo['logo']['url'] }}" 
                    alt="{{ $logo['logo']['alt'] ?? '' }}" 
                    class="max-h-20 w-auto object-contain"
                >
            @endif
        @endforeach
    </div>
@endif
            </div>
        </div>
    </div>

    <img class="w-80 lg:w-145 -left-44 -bottom-44 lg:-left-72 lg:-bottom-72 z-10 absolute pointer-events-none" src="/wp-content/uploads/2026/08/circle.svg" />
</section>