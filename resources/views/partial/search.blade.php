<div class="panel panel-custom">
    <div class="panel-heading">
        <h3 class="panel-title">{{trans('home.findyourplace')}}</h3>
    </div>
    <div class="panel-body">
        <form class="form-inline" action="{{URL::asset('')}}search.html" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group col-sm-3 col-xs-12">

                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="{{trans('home.location')}}" name="location">
                    @foreach($district as $d)
                        <option value="{{$d->name}}">{{$d->name_en}}</option>

                    @endforeach

                </select>
                <hr>
                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="{{trans('home.bedroom')}}" name="bedroom">
                    @foreach($bed as $b)
                        <option value="{{$b->number}}">{{$b->number}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3 col-xs-12">

                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="{{trans('home.propertytype')}}" name="property_type">
                    @foreach($menu as $m)
                        <option value="{{$m->id}}">@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$m->name_en}}@else
                                {{$m->name}}@endif
                        </option>
                        <?php
                        $sub = DB::table('ppc_property_category')->where('parent_id', $m->id)->orderBy('sort_order', 'asc')->get();
                        ?>
                        @foreach($sub as $s)
                            <option value="{{$s->id}}">-@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$s->name_en}}@else
                                    {{$s->name}}@endif</option>
                        @endforeach
                    @endforeach
                </select>
                <hr>
                <select class="form-control selectpicker" data-live-search="true" title="{{trans('home.minbudget')}}" name="min">
                    @foreach($min as $b)
                        <option value="{{$b->number}}">${{$b->number}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3 col-xs-12">

                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="{{trans('home.propertystatus')}}" name="property_status">
                    <option value="0">For Rent</option>
                    <option value="1">For Sale</option>

                </select>
                <hr>
                <select class="form-control selectpicker" data-live-search="true"  data-size="4" title="{{trans('home.maxbudget')}}" name="max">
                    @foreach($max as $b)
                        <option value="{{$b->number}}">${{$b->number}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3 col-xs-12">

                <input type="text" class="form-control" placeholder="{{trans('home.keyword')}}" name="keyword"/>
                <hr>
                <button type="submit" class="btn btn-default form-control search-form">{{trans('home.search')}}
                </button>

            </div>


        </form>

    </div>
</div>

