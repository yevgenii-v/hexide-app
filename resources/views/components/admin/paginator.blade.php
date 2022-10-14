@if ($paginator->hasPages())
    <div class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                    Showing {{ $paginator->currentPage() }} to {{ $paginator->count() }} of {{ $paginator->total() }} entries
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">
                        @if ($paginator->onFirstPage())
                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
                                    Previous
                                </a>
                            </li>
                        @else
                            <li class="paginate_button page-item previous" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
                                    Previous
                                </a>
                            </li>
                        @endif

                        @foreach($elements as $element)

                            @if (is_string($element))
                                <li class="disabled " aria-disabled="true"><span>{{ $element }}</span></li>
                            @endif

                            @if(is_array($element))
                                @foreach($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="paginate_button page-item active" aria-current="page">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $url }}" class="page-link">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="paginate_button page-item next" id="example2_next">
                                <a href="{{ $paginator->nextPageUrl() }}" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">
                                    Next
                                </a>
                            </li>
                        @else
                            <li class="paginate_button page-item next" id="example2_next">
                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link disabled">
                                    Next
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
