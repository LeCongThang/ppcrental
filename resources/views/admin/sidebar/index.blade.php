<ul class="nav side-menu">
    @foreach($permission as $p)
        <li><a href="{{URL::asset('')}}{{$p->link}}"><i class="fa fa-bug"></i> {{$p->name}}</a>
        </li>
    @endforeach
</ul>

