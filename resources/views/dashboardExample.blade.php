{{-- Two ways doing the same--}}

@foreach ($usersList as $user )
<h1>{{$user['name']}}</h1>
<h2>{{$user['age']}}</h2>
@if ($user['age']<18)
    <p>User can't drive.</p>
@endif
<hr>
@endforeach

{{-- ********* --}}

<?php
echo '<br>';
foreach ($usersList as $user) {?>

    <h1> <?= $user['name'] ?> </h1>

<?php } ?>
