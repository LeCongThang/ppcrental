@if($cat->count()>0)
    @foreach($cat as $d)
        <li><a href="{{URL::asset('')}}{{$d->id}}-{{str_slug($d->name_en)}}.html">{{$d->name_en}}</a></li>

    @endforeach
@endif