<!--- about -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-about relative -smt' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main relative">
        <div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10 lg:gap-16">

            @if (!empty($g_about['image']['url']))
            <div data-gsap-element="img" class="__img  relative">
                <div class="absolute  -top-14 -right-14  w-28 h-28 rounded-full bg-primary-200 z-20 pointer-events-none"></div>

                <figure class="w-full h-104 md:h-186 m-0 relative z-10 overflow-hidden radius-img ">
                    <picture class="w-full h-full">
                        <img class="w-full h-full object-cover " src="{{ $g_about['image']['url'] }}" alt="{{ $g_about['image']['alt'] ?? '' }}" loading="lazy">
                    </picture>
                </figure>
            </div>
            @endif

            <div class="__content ">
                @if (!empty($g_about['title']))
                <span data-gsap-element="header" class="__title ">
                    {{ $g_about['title'] }}
                </span>
                @endif

                @if (!empty($g_about['header']))
                <h2 data-gsap-element="header" class="text-h3 m-header text-black/80">
                    {{ $g_about['header'] }}
                </h2>
                @endif
 
                @if (!empty($g_about['text']))
                <div data-gsap-element="txt" class="__txt text-black/80">
                    {!! $g_about['text'] !!}
                </div>
                @endif

                <!-- PRZYCISKI -->
                @if (!empty($g_about['button1']) || !empty($g_about['button2']))
                <div class="inline-buttons m-btn flex flex-wrap gap-4">
                    @if (!empty($g_about['button1']['url']))
                    <x-button
                        :href="$g_about['button1']['url']"
                        variant="primary"
                        class="rounded-full px-8 py-3.5"
                        data-gsap-element="btn">
                        {{ $g_about['button1']['title'] ?? $g_about['button1']['text'] }}
                    </x-button>
                    @endif

                    @if (!empty($g_about['button2']['url']))
                    <x-button
                        :href="$g_about['button2']['url']"
                        variant="secondary"
                        class="rounded-full px-8 py-3.5"
                        data-gsap-element="btn">
                        {{ $g_about['button2']['title'] ?? $g_about['button2']['text'] }}
                    </x-button>
                    @endif
                </div>
                @endif

            </div>

        </div>
    </div>

</section>