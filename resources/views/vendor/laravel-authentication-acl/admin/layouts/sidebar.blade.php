<ul class="nav nav-sidebar">
    @if(isset($sidebar_items) && $sidebar_items)
    @foreach($sidebar_items as $name => $data)
    <?php
    $get = NULL;
    if (!empty($data['get_name']) && !empty($data['get_value'])) {
        $get = "?" . $data['get_name'] . "=" . $data['get_value'];
    }
    ?>
    <li class="{!! LaravelAcl\Library\Views\Helper::get_active($data['url']) !!}"><a href="{!! $data['url'].$get !!}">{!! $data['icon'] !!} {{$name}}</a></li>
    @endforeach
    @endif
</ul>
