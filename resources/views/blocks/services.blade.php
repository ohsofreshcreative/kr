<!--- services --->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-services relative -spt -spb' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>



    <div class="__wrapper c-main relative z-10 flex flex-col items-center">

        @if (!empty($g_services['title']) || !empty($g_services['header']))
        <div class="__top text-center max-w-3xl mx-auto mb-10 md:mb-14">
            @if (!empty($g_services['title']))
            <span data-gsap-element="header" class="__title">
                {{ $g_services['title'] }}
            </span>
            @endif

            @if (!empty($g_services['header']))
            <h2 data-gsap-element="header" class="m-header text-h3 text-black/80">
                {{ $g_services['header'] }}
            </h2>
            @endif
        </div>
        @endif

        <div class="w-full flex flex-col gap-8 md:gap-10">
            <!-- 1. KAFELEK: Oferta dla firm (offer_items) -->
            <!-- @if (!empty($offer_items))
            <div data-gsap-element="card" class="__category-card bg-white radius p-8 md:p-12 shadow-sm border border-primary-100/50 flex flex-col items-center text-center w-full">
                <h3 data-gsap-element="header" class="mb-10">
               Oferta dla firm
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 w-full items-start">
                    @foreach ($offer_items as $item)
                        <a href="{{ $item['url'] }}" class="group flex flex-col items-center justify-between h-full ">
                            <div class="flex flex-col items-center w-full">
                                <div class="md:w-28 md:h-28 rounded-full bg-primary flex items-center justify-center p-4 mb-4 transition-transform duration-300 group-hover:scale-105">
                                    @if (!empty($item['icon_url']))
                                        <img src="{{ $item['icon_url'] }}" alt="{{ $item['icon_alt'] ?: $item['title'] }}" class="w-12 h-12 object-contain " />

                                    @endif
                                </div>
                                <h4 class="text-h7 text-black/80">
                                    {{ $item['title'] }}
                                </h4>
                            </div>

                            <div class="mt-4 text-[#5B7047] group-hover:translate-x-1 transition-transform duration-300">
                <img class="" src="/wp-content/uploads/2026/08/green-arrow.svg" />
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif -->

            <!-- 2. KAFELEK: Oferta dla klientów indywidualnych (personal_items) -->
            @if (!empty($personal_items))
            <div data-gsap-element="card" class="__category-card bg-white radius p-8 md:p-12 shadow-sm border border-primary-100/50 flex flex-col items-center text-center w-full">
                <h3 data-gsap-element="header" class="text-2xl md:text-3xl font-serif text-primary mb-10 md:mb-12">
                    Oferta dla klientów indywidualnych
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 w-full items-start">
                    @foreach ($personal_items as $item)
                        <a href="{{ $item['url'] }}" class="group flex flex-col items-center justify-between h-full min-h-[160px]">
                            <div class="flex flex-col items-center w-full">
                                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#5B7047] flex items-center justify-center p-4 mb-4 transition-transform duration-300 group-hover:scale-105">
                                    @if (!empty($item['icon_url']))
                                        <img src="{{ $item['icon_url'] }}" alt="{{ $item['icon_alt'] ?: $item['title'] }}" class="w-8 h-8 object-contain brightness-0 invert" />
                                    @else
                                        <svg class="w-8 h-8 text-white stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                        </svg>
                                    @endif
                                </div>
                                <h4 class="text-base md:text-lg font-serif text-primary font-normal leading-snug group-hover:text-[#5B7047] transition-colors duration-300 max-w-[200px]">
                                    {{ $item['title'] }}
                                </h4>
                            </div>

                            <div class="mt-4  group-hover:translate-x-1 transition-transform duration-300">
  <img class="" src="/wp-content/uploads/2026/08/green-arrow.svg" />
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>


        @if (!empty($button['url']))
        <div class="mt-10 md:mt-14">
            <x-button
                :href="$button['url']"
                :target="$button['target'] ?? '_self'"
                variant="btn-outline-primary"
                class="btn-outline-primary"
                data-gsap-element="btn">
                {{ $button['title']  }}
            </x-button>
        </div>
        @endif

    </div>
</section>