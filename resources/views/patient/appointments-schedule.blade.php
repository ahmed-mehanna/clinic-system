<?php
    $val = intdiv($i, 100);
    if ($i % 100 == 0)
        $val .= '00';
    else
        $val .= $i % 100
?>
@if($i == 1200 or $i == 1230)
    <span>
        {{ intdiv($i, 100) }}:<?php if ($i % 100 == 0): ?>00<?php else: ?>{{ $i % 100 }}<?php endif; ?>pm
    </span>
@elseif($i >= 1300)
    <span>
        {{ intdiv($i - 1200, 100) }}:<?php if ($i % 100 == 0): ?>00<?php else: ?>{{ $i % 100 }}<?php endif; ?>pm
    </span>
@else
    <span>
        {{ intdiv($i, 100) }}:<?php if ($i % 100 == 0): ?>00<?php else: ?>{{ $i % 100 }}<?php endif; ?>am
    </span>
@endif
<button type="button" id="{{ 'btn-'.$val }}" class="btn btn-success" onclick="bookNow({{ $val }})">Book Now <i class="fa fa-hand-pointer-o"></i></button>
