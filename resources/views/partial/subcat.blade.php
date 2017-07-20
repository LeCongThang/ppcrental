@if($cat->count()>0)
    @foreach($cat as $d)
        <li><a href="{{URL::asset('')}}ppcrental-{{str_slug($d->name_en)}}-{{$d->id}}.html">{{$d->name_en}}</a></li>

    @endforeach
@endif