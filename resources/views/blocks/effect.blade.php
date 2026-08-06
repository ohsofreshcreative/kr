<!-- effect  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-effect relative overflow-hidden bg-primary -smt -spt -spb',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
    ])
>

    <div class="c-main relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            <div class="flex flex-col items-start text-white">
                @if(!empty($g_effect['title']))
                    <p class="__title !text-white/90">{{ $g_effect['title'] }}</p>
                @endif

                @if(!empty($g_effect['header']))
                    <h2 class="text-h3 m-header !text-white">
                        {!! $g_effect['header'] !!}
                    </h2>
                @endif

                @if(!empty($g_effect['text']))
                    <div class="text-white/80 mb-8">
                        {!! $g_effect['text'] !!}
                    </div>
                @endif

                @if(!empty($g_effect['button1']))
                    <a href="{{ $g_effect['button1']['url'] }}" target="{{ $g_effect['button1']['target'] ?? '_self' }}" class="btn-secondary btn text-black">
                        {{ $g_effect['button1']['title'] }}
                    </a>
                @endif
            </div>

            <div class="space-y-6">
                @if(!empty($selected_work_items))
                    @foreach($selected_work_items as $work)
                        <div class="relative mb-6">
                            
                            @if($loop->first)
                                <div class="absolute -top-12 -left-12 w-48 h-48 rounded-full bg-[#C6DFAD] z-0 pointer-events-none"></div>
                            @endif

                            <div class="relative z-10 bg-secondary radius p-5 sm:p-8 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-6">
                                
                                @if(has_post_thumbnail($work->ID))
                                    <div class="w-full h-48 sm:w-[155px] sm:h-[155px] aspect-square radius overflow-hidden shrink-0">
                                        {!! get_the_post_thumbnail($work->ID, 'medium', ['class' => 'w-full h-full object-cover']) !!}
                                    </div>
                                @endif

                                <div class="flex-1 flex items-center justify-between gap-4">
                                    <div class="flex-1">
                                        <h3 class="text-h6 m-title text-left">
                                            {{ get_the_title($work->ID) }}
                                        </h3>

                                        @if(get_the_excerpt($work->ID))
                                            <p class="mt-2 text-sm sm:text-base text-left">
                                                {{ get_the_excerpt($work->ID) }}
                                            </p>
                                        @endif
                                    </div>

                                    <a href="{{ get_permalink($work->ID) }}" class="w-14 h-14 rounded-full bg-primary flex items-center justify-center shrink-0 hover:scale-105 transition-transform duration-300" aria-label="Zobacz szczegóły">
                                        <svg class="w-5 h-5 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H7M17 7V17"/>
                                        </svg>
                                    </a>
                                </div>

                            </div>

                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
		<img class=" h-130 top-10 md:-left-50 -left-180  z-0 absolute pointer-events-none  opacity-20" src="/wp-content/uploads/2026/08/m_icon.svg" />
			<img class=" -right-40 w-200  -top-30 z-0 absolute pointer-events-none  opacity-20" src="/wp-content/uploads/2026/08/ellipse.svg" />
</section>