<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-banner relative overflow-hidden -spt',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])
>

    <div class="absolute inset-0 bg-primary-900"></div>
    <div class="c-main relative z-10 pointer-events-none">
        <div class="flex items-center">
            <div class="w-full lg:w-1/2 pt-16 pb-8 lg:py-30 relative z-10 pr-0 lg:pr-8 pointer-events-auto">
                <img 
                    class="h-16 sm:h-20 lg:h-40 w-auto z-10 absolute top-8 right-4 sm:right-10 lg:right-auto lg:top-24 lg:-left-40 xl:-left-40 pointer-events-none opacity-80" 
                    src="/wp-content/uploads/2026/08/performance.svg" 
                    alt="" 
                />
                <div data-gsap-element="bread" class="__breadcrumb mb-4">
                    @if(function_exists('yoast_breadcrumb'))
                        {!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
                    @endif
                </div>
                <h1 data-gsap-element="header" class="text-h2 text-secondary">
                    {{ $g_banner['title'] }}
                </h1>
                @if(!empty($g_banner['text']))
                    <div data-gsap-element="text" class="text-white mt-4">
                        {!! $g_banner['text'] !!}
                    </div>
                @endif
                <div class="inline-buttons m-btn">

                    @if(!empty($g_banner['button1']))
                        <x-button
                            :href="$g_banner['button1']['url']"
                            variant="primary"
                            data-gsap-element="btn">
                            {{ $g_banner['button1']['title'] }}
                        </x-button>
                    @endif

                    @if(!empty($g_banner['button2']))
                        <x-button
                            :href="$g_banner['button2']['url']"
                            variant="white"
                            data-gsap-element="btn">
                            {{ $g_banner['button2']['title'] }}
                        </x-button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(!empty($g_banner['image']))
        <div class="relative lg:absolute right-0 bottom-0 top-auto lg:top-0 w-full h-[320px] sm:h-[400px] lg:h-full z-0 [clip-path:ellipse(80%_100%_at_50%_100%)] lg:[clip-path:ellipse(50%_80%_at_100%_50%)] pointer-events-none mt-6 lg:mt-0">
            <div class="absolute right-0 bottom-0 top-auto lg:top-0 w-full lg:w-1/2 h-full">
                <img
                    src="{{ $g_banner['image']['url'] }}"
                    alt="{{ $g_banner['image']['alt'] ?? '' }}"
                    class="w-full h-full object-cover object-center lg:object-left">
                
              <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(56, 96, 7, 0) 0%, rgba(56, 96, 7, 0.6) 100%);"></div>

                <img 
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-none w-[120%] lg:w-[110%] h-auto pointer-events-none z-10" 
                    src="/wp-content/uploads/2026/08/circle-white.svg" 
                    alt="" 
                />
            </div>
        </div>
    @endif

</section>