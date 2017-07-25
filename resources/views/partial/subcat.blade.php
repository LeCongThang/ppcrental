@if($cat->count()>0)
    @foreach($cat as $d)
        <li><a href="{{URL::asset('')}}{{$d->id}}-{{str_slug($d->name_en)}}.html">@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$d->name_en}}@else {{$d->name}} @endif</a></li>

    @endforeach
@endif