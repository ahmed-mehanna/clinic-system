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
@if(in_array($i, $reserved))
    <button type="button" class="btn btn-danger" style="padding-right: 1.675rem; padding-left: 1.675rem;">Booked <i class="fa fa-exclamation"></i></button>
@else
    <button id="{{ 'btn-'.$val }}" type="button" class="btn btn-success" onclick="selectAppointment({{ $val }})">Book Now <i class="fa fa-hand-pointer-o"></i></button>
@endif