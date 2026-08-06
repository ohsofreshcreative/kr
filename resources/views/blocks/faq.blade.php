<!--- faq --->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-faq relative overflow-hidden',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main grid grid-cols-1 md:grid-cols-2 gap-10  items-start relative z-20 section-py">

        <img class="hidden md:block h-10 lg:h-14 left-1/2 -translate-x-1/2 -top-2 lg:-top-0 z-30 absolute pointer-events-none" src="/wp-content/uploads/2026/08/arrow-right.svg" alt="" />

        <div class="__content flex flex-col h-full order-1 md:order-none">
            <div>
                @if (!empty($g_faq['title']))
                    <span class="__title">{{ $g_faq['title'] }}</span>
                @endif

                @if (!empty($g_faq['header']))
                    <h3 data-gsap-element="header" class="text-h3 m-header">{{ $g_faq['header'] }}</h3>
                @endif
            </div>

            @if (!empty($g_faq['image']))
                <div data-gsap-element="img" class="__img hidden md:block mt-10 md:mt-auto relative w-[267px] h-[267px] self-start">
                    <div class="absolute inset-0 bg-primary-800 rounded-full translate-x-3 translate-y-3 z-0"></div>

                    <img class="relative z-10 w-[267px] h-[267px] object-cover rounded-full" src="{{ $g_faq['image']['url'] }}" alt="{{ $g_faq['image']['alt'] ?? '' }}">
                </div>
            @endif
        </div>

        <div data-gsap-element="tabs" class="tabs-wrapper flex flex-col gap-4 order-2 md:order-none">
            @foreach ($r_faq as $item)
                <div class="tabs radius bg-white border border-primary-900 overflow-hidden transition-all duration-300">
                    <input class="tab-check hidden" type="checkbox" name="radio-a" id="check{{ $loop->index }}">

                    <label class="tabs-label flex items-center justify-between p-6 md:p-7 cursor-pointer select-none" for="check{{ $loop->index }}">
                        <p class="!text-h7m-0 pr-4">{{ $item['title'] }}</p>

                        <div class="flex items-center justify-center shrink-0">
                            <svg class="__arrow transition-transform duration-300 w-3 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 24" fill="none">
                                <g clip-path="url(#clip0_71518_1099)">
                                    <path d="M4.4912 18.1696C4.4912 17.6525 4.4912 17.0836 4.4912 16.5665C4.54299 12.016 4.64656 7.41366 4.69834 2.86308C4.69834 2.34597 4.69834 1.88057 4.75013 1.36346C4.80191 0.691217 4.95727 -0.13616 5.83762 0.0189732C6.20012 0.0706843 6.6144 0.846351 6.66618 1.31175C6.87332 5.13837 7.02868 8.91328 7.18404 12.7399C7.23582 13.619 7.18404 14.4981 7.6501 15.4289C8.27153 14.3947 8.78938 13.3087 9.46259 12.3262C9.7733 11.8608 10.5501 11.3437 11.0161 11.4471C11.9483 11.654 11.8447 12.6882 11.534 13.3087C10.1876 16.4114 8.84117 19.5658 7.23582 22.565C6.20012 24.4783 4.64656 24.4783 3.61085 22.565C2.21265 20.0312 1.17694 17.2905 0.0376676 14.6532C-0.117688 14.3429 0.244808 13.8258 0.348379 13.4122C0.762661 13.5673 1.38409 13.5673 1.59123 13.8775C2.10908 14.4981 2.41979 15.3255 2.83407 16.0494C3.24836 16.8251 3.66264 17.6008 4.07692 18.3247C4.18049 18.2213 4.33585 18.1696 4.4912 18.1696Z" fill="#0D0D0D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71518_1099">
                                        <rect width="11.7551" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </label>

                    <div class="tabs-content px-6 pb-6 text-gray-700 text-sm md:text-base leading-relaxed">
                        {!! $item['txt'] !!}
                    </div>
                </div>
            @endforeach
        </div>

        @if (!empty($g_faq['image']))
            <div class="__img md:hidden order-3 mt-10 relative w-[267px] h-[267px] mx-auto">
                <div class="absolute inset-0 bg-primary-800 rounded-full translate-x-3 translate-y-3 z-0"></div>

                <img class="relative z-10 w-[267px] h-[267px] object-cover rounded-full" src="{{ $g_faq['image']['url'] }}" alt="{{ $g_faq['image']['alt'] ?? '' }}">
            </div>
        @endif

    </div>

</section>