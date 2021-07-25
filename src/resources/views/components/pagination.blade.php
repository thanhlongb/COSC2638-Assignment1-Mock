<ul class="pagination" style="float: right">
    <li class="page-item @if ($page == 1) disabled @endif">
        <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
    </li>
    @for ($i = 1; $i <= $pageCount; $i++)
        @if ($i <= $page + ($offset ?? 1) and $i >= $page - ($offset ?? 1))
            <li class="page-item @if($i == $page) active @endif">
                <a class="page-link" href="#">{{ $i }}</a>
            </li>
        @else
            @if($i == $page+($offset ?? 1)+1 or $i == $page-($offset ?? 1)-1)
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
            @elseif($i == 1 or $i == $pageCount)
                <li class="page-item">
                    <a class="page-link" href="#">{{ $i }}</a>
                </li>
            @endif
        @endif
    @endfor
    <li class="page-item @if ($page == $pageCount) disabled @endif">
      <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
    </li>
</ul>
