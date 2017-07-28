<div class="col-sm-3 visible-lg-block">
    <div class="panel panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">{{trans('home.findyourplace')}}</h3>
        </div>
        <div class="panel-body">
            <form class="form-inline" action="{{URL::asset('')}}search.html" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-md-12">

                    <select class="selectpicker form-control" data-live-search="true" data-size="4"
                            title="{{trans('home.location')}}" name="location">
                        @foreach($district as $d)
                            <option value="{{$d->name}}">{{$d->name_en}}</option>

                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-12">

                    <select class="selectpicker form-control" data-live-search="true" data-size="4"
                            title="{{trans('home.propertytype')}}"
                            name="property_type">
                        @foreach($menu as $m)
                            <option value="{{$m->id}}">@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$m->name_en}}@else
                                    {{$m->name}}@endif</option>
                            <?php
                            $sub = DB::table('ppc_property_category')->where('parent_id', $m->id)->orderBy('sort_order', 'asc')->get();
                            ?>
                            @foreach($sub as $s)
                                <option value="{{$s->id}}">-@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$s->name_en}}@else
                                        {{$s->name}}@endif</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">

                    <select class="selectpicker form-control" data-live-search="true" data-size="4"
                            title="{{trans('home.propertystatus')}}"
                            name="property_status">
                        <option value="0">For Rent</option>
                        <option value="1">For Sale</option>

                    </select>
                </div>

                <div class="form-group col-md-12">

                    <select class="selectpicker form-control" data-live-search="true" data-size="4" title="{{trans('home.bedroom')}}"
                            name="bedroom">
                        @foreach($bed as $b)
                            <option value="{{$b->number}}">{{$b->number}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-12">

                    <select class="selectpicker form-control" data-live-search="true" title="{{trans('home.minbudget')}}" name="min">
                        @foreach($min as $b)
                            <option value="{{$b->number}}">${{$b->number}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <select class="selectpicker form-control" data-live-search="true" data-size="4"
                            title="{{trans('home.maxbudget')}}" name="max">
                        @foreach($max as $b)
                            <option value="{{$b->number}}">${{$b->number}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">

                    <input type="text" class="form-control" placeholder="{{trans('home.keyword')}}" name="keyword"/>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-default form-control search-form">{{trans('home.search')}}
                    </button>
                </div>


            </form>

        </div>
    </div>

    <div class="panel panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">{{trans('home.similar')}}</h3>

        </div>
        <div class="panel-body">
            @foreach($property2 as $p)
                <div class="col-sm-12">
                    <a href="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug}}.html"><img
                                src="{{URL::asset('')}}images/project/{{$p->image_overall}}"
                                class="district img-responsive"></a>
                    <h4><a href="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug}}.html">
                            @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                {{str_limit($p->name_en,30)}}
                            @else
                                {{str_limit($p->name,30)}}
                            @endif
                        </a></h4>

                    <i style="font-weight: normal"><i class="fa fa-map-marker"
                                                      aria-hidden="true"></i> {{str_limit($p->location,30)}}</i>
                    <hr/>
                    <h5><span class="glyphicon glyphicon-home"> {{$p->area}}</span> <span
                                class="glyphicon glyphicon-bed pull-right"> {{$p->bedroom}}</span>
                    </h5>
                </div>
            @endforeach


        </div>
    </div>
</div>