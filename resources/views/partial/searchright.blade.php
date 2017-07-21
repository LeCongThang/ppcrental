<div class="col-lg-3">
    <div class="panel panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">FIND YOUR PLACE</h3>
        </div>
        <div class="panel-body">
            <form class="form-inline" action="{{URL::asset('')}}search.html" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">

                    <select class="selectpicker" data-live-search="true" data-size="4" title="Location" name="location">
                        @foreach($district as $d)
                            <option value="{{$d->name}}">{{$d->name_en}}</option>

                        @endforeach

                    </select>
                </div>
                <div class="form-group">

                    <select class="selectpicker" data-live-search="true" data-size="4" title="Property Type"
                            name="property_type">
                        @foreach($menu as $m)
                            <option value="{{$m->id}}">{{$m->name_en}}</option>
                            <?php
                            $sub = DB::table('ppc_property_category')->where('parent_id', $m->id)->orderBy('sort_order', 'asc')->get();
                            ?>
                            @foreach($sub as $s)
                                <option value="{{$s->id}}">-{{$s->name_en}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <select class="selectpicker" data-live-search="true" data-size="4" title="Property Status"
                            name="property_status">
                        <option value="0">For Rent</option>
                        <option value="1">For Sale</option>

                    </select>
                </div>

                <div class="form-group">

                    <select class="selectpicker" data-live-search="true" data-size="4" title="Bedrooms" name="bedroom">
                        @for($i=0;$i<11;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>

                </div>
                <div class="form-group">

                    <select class="selectpicker" data-live-search="true" title="Min Budget" name="min">
                        <option value="400">$400</option>
                        <option value="500">$500</option>
                        <option value="600">$600</option>
                        <option value="700">$700</option>
                        <option value="800">$800</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="selectpicker" data-live-search="true" data-size="4" title="Max Budget" name="max">
                        <option value="800">$800</option>
                        <option value="1000">$1000</option>
                        <option value="1200">$1200</option>
                        <option value="1400">$1400</option>
                        <option value="1600">$1600</option>
                        <option value="1800">$1800</option>
                        <option value="2000">$2000</option>
                    </select>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Keyword" name="keyword"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default form-control search-form">Search
                    </button>
                </div>


            </form>

        </div>
    </div>

    <div class="panel panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">FEATURE PROPERTIES</h3>

        </div>
        <div class="panel-body">
            @foreach($property2 as $p)
                <div class="col-lg-12">
                    <a href="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug}}.html"><img src="{{URL::asset('')}}images/project/{{$p->image_overall}}"
                                                                                           class="district img-responsive"></a>
                    <h4><a href="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug}}.html">{{str_limit($p->name_en,30)}}</a></h4>
                    <i style="font-weight: normal"><i class="fa fa-map-marker" aria-hidden="true"></i> {{str_limit($p->location,30)}}</i>
                    <hr/>
                    <h5><span class="glyphicon glyphicon-home"> {{$p->area}}</span> <span
                                class="glyphicon glyphicon-bed pull-right"> {{$p->bedroom}}</span>
                    </h5>
                </div>
            @endforeach



        </div>
    </div>
</div>