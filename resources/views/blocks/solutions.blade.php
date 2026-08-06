<!--- solutions -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-solutions relative overflow-hidden py-16 lg:py-24' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>



    <div class="__wrapper c-main relative z-10">

        <div class=" mb-12 lg:mb-16">
            @if(!empty($g_solutions['title']))
            <span class="__title">{{ $g_solutions['title'] }}</span>
            @endif

            @if(!empty($g_solutions['header']))
            <h2 data-gsap-element="header" class="text-h3 m-title">{!! $g_solutions['header'] !!}</h2>
            @endif

            <!-- @if(!empty($g_solutions['text']))
            <div data-gsap-element="txt" class="mb-6">
                {!! $g_solutions['text'] !!}
            </div>
            @endif -->

            @if (!empty($g_solutions['button1']) || !empty($g_solutions['button2']))
            <div class="inline-buttons flex flex-wrap gap-4">
                @if (!empty($g_solutions['button1']))
                <x-button :href="$g_solutions['button1']['url']" variant="primary" data-gsap-element="btn">
                    {{ $g_solutions['button1']['title'] }}
                </x-button>
                @endif

                @if (!empty($g_solutions['button2']))
                <x-button :href="$g_solutions['button2']['url']" variant="white" data-gsap-element="btn">
                    {{ $g_solutions['button2']['title'] }}
                </x-button>
                @endif
            </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-16">
            
            @if(!empty($g_solutions['txt']))
            <div data-gsap-element="txt" class="__txt ">
                {!! $g_solutions['txt'] !!}
            </div>
            @endif

            @if (!empty($g_solutions['image']))
            <figure data-gsap-element="img" class="__img relative w-full h-[380px] md:h-[536px]">
                <picture>
                    <img class="w-full h-full object-cover radius" src="{{ $g_solutions['image']['url'] }}" alt="{{ $g_solutions['image']['alt'] ?? '' }}">
                </picture>
            </figure>
            @endif

        </div>

    </div>

</section>