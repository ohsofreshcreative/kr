@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-posts bg-[#F0FAE6] py-16 lg:py-24 -smt {{ $sectionClass }} {{ $section_class }}">
    <div class="c-main max-w-[1200px] mx-auto px-4">

        <div class="__content flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h2 data-gsap-element="title" class="text-primary text-h3 mb-2">{{ $posts_settings['title'] }}</h2>
                @if(!empty($posts_settings['text']))
                <div data-gsap-element="txt" class="text-gray-600 prose">
                    {!! $posts_settings['text'] !!}
                </div>
                @endif
            </div>

            @if (!empty($posts_settings['button']))
            <a data-gsap-element="btn" class="btn btn-primary " href="{{ $posts_settings['button']['url'] }}">
                {{ $posts_settings['button']['title'] }}
            </a>
            @endif
        </div>

        <div data-gsap-element="grid-layout" class="__posts-grid relative w-full grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            @if(!empty($posts))
            <div class="flex flex-col gap-6">
                @foreach($posts as $post)
                <div class="group relative grid grid-cols-1 sm:grid-cols-[296px_1fr] items-center gap-6 border-t border-primary/20 pt-6">

                    <div class="w-full sm:w-[296px] h-[140px] shrink-0 radius overflow-hidden">
                        @if($show_image && has_post_thumbnail($post->ID))
                        <img src="{{ get_the_post_thumbnail_url($post->ID, 'medium') }}"
                            alt="{{ get_the_title($post->ID) }}"
                            class="w-full h-full object-cover radius" />
                        @endif
                    </div>

                    <div class="flex flex-col justify-between h-[140px] py-1">
                        <h6 class="mb-2 line-clamp-2 text-h6 font-medium">
                            {{ get_the_title($post->ID) }}
                        </h6>

                        <a href="{{ get_permalink($post->ID) }}" class="text-primary font-semibold inline-flex items-center gap-2.5 transition-colors after:absolute after:inset-0 after:z-10 underline mt-auto">
                            <span>Przeczytaj artykuł</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <path d="M0.65039 7.59954C0.291454 7.59954 7.82521e-05 7.30904 -3.038e-07 6.95013C-3.19491e-07 6.59114 0.291405 6.29974 0.65039 6.29974L12.4519 6.29974L7.26144 1.10931C7.00798 0.855496 7.00788 0.444107 7.26144 0.190361C7.51529 -0.0634769 7.92753 -0.0634845 8.18137 0.190361L14.4812 6.49016C14.7348 6.74387 14.7346 7.15526 14.4812 7.40911L8.18137 13.7099C7.92753 13.9637 7.51529 13.9637 7.26145 13.7099C7.00761 13.4561 7.00761 13.0438 7.26144 12.79L12.4519 7.59954L0.65039 7.59954Z" fill="#5C7444"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="relative">
                @if (!empty($posts_settings['image']))
                <figure data-gsap-element="img" class="__img h-full relative z-10">
                    <picture>
                        <img class="radius-img h-[520px] lg:h-[616px] max-h-[616px] w-full object-cover rounded-3xl" src="{{ $posts_settings['image']['url'] }}" alt="{{ $posts_settings['image']['alt'] ?? '' }}">
                    </picture>
                </figure>
                @endif

                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-28 h-28 bg-[#2E4419] rounded-full z-20 pointer-events-none"></div>
            </div>
            
        </div>

    </div>
</div>