<nav aria-label="Page navigation">
    @if($paginator->hasPages())
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
            <span aria-hidden="true">
            <i class="fa fa-angle-double-left"></i>
            </span>
            <span class="sr-only">Previous</span>
            </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }})" tabindex="-1" aria-label="Geri">
                                                    <span aria-hidden="true">
                                                        <i class="fa fa-angle-double-left"></i>
                                                    </span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <a class="page-link" href="#">{{$page}}</a>
        </li>
                    @else
        <li class="page-item">
            <a class="page-link" href="{{$page}}">2</a>
        </li>
                    @endif
                @endforeach
            @endif

            @if($paginator->hasMorePages())
            <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                                    <span aria-hidden="true">
                                                        <i class="fa fa-angle-double-right"></i>
                                                    </span>
                <span class="sr-only">Next</span>
            </a>
        </li>
            @else
                <li class="page-item disabled">
            <span aria-hidden="true">
            <i class="fa fa-angle-double-left"></i>
            </span>
                    <span class="sr-only">Next</span>
                </li>
        @endif
        @endif
    </ul>
</nav>
