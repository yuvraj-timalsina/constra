<div class="col-sm-6">
    <a href="{{ route('dashboard') }}">Dashboard</a> /
    <?php $link = ''; ?>
    @for ($i = 1; $i <= count(Request::segments()); $i++)
        @if (($i < count(Request::segments())) & ($i > 0))
            <?php $link .= '/' . Request::segment($i); ?>
            <a href="<?= $link ?>">{{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a> /
        @else
            {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
        @endif
    @endfor
</div>
