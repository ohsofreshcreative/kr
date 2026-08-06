<!--- partnership --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" 
@endif @class(['b-partnership relative -smt overflow-hidden ', $sectionClass => filled($sectionClass), $section_class => filled($section_class), $background => filled($background) && $background !== 'none'])>
    <div class="c-main relative z-10">
        @if(!empty($g_partnership['header']) || !empty($g_partnership['text']))
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6  items-center">
            @if(!empty($g_partnership['header']))
            <h2 data-gsap-element="header" class="text-h3 !font-mirage">{!! $g_partnership['header'] !!}</h2>
            @endif

            @if(!empty($g_partnership['text']))
            <div data-gsap-element="text" class="">{!! $g_partnership['text'] !!}</div>
            @endif
        </div>
        @endif

        @if (!empty($r_partnership))
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-12">
            @foreach ($r_partnership as $index => $item)
            <div data-gsap-element="card" class="p-8 lg:p-14 radius flex flex-col items-start justify-between {{ $loop->first ? 'bg-primary-800' : 'bg-primary' }}">
                <div>
                    @if (!empty($item['image']['url']))
                    <img class="w-16 h-16 object-contain mb-8" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
                    @endif

                    @if (!empty($item['title']))
                    <h3 class="text-h5 text-white mb-4 font-mirage m-title">{{ $item['title'] }}</h3>
                    @endif

                    @if (!empty($item['text']))
                    <p class="text-white/80 pb-6">{!! $item['text'] !!}</p>
                    @endif
                </div>

                @if (!empty($item['button']['url']))
                <x-button :href="$item['button']['url']" variant="white" data-gsap-element="btn">
                    {{ $item['button']['title'] }}
                </x-button>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
	    <img class="w-80 w-250 -right-160 z-10 absolute pointer-events-none" src="/wp-content/uploads/2026/08/rk.svg" />
</section>