@if ($paginator->hasPages())

        分页：
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            
        @else
            
            <a href="javascript:void(0);" url="{{ $paginator->previousPageUrl() }}" onclick="fastH(this,'main')">上一页</a> 
            
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <b>{{ $page }}</b>
                        @if($loop->last)
                        
                        @else
                            |
                        @endif
                    @else
                        <a href="javascript:void(0);" url="{{ $url }}" onclick="fastH(this,'main')">{{ $page }}</a>
                        @if($loop->last)
                        
                        @else
                            |
                        @endif

                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="javascript:void(0);" url="{{ $paginator->nextPageUrl() }}" onclick="fastH(this,'main')">下一页</a> 
        @else
        
        @endif

@endif
