<div class="panel panel-custom">
    <div class="panel-heading">
        <h3 class="panel-title">FIND YOUR PLACE</h3>
    </div>
    <div class="panel-body">
        <form class="form-inline" action="{{URL::asset('')}}search.html" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group col-lg-3 col-xs-12">

                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="Location" name="location">
                    @foreach($district as $d)
                        <option value="{{$d->name}}">{{$d->name_en}}</option>

                    @endforeach

                </select>
                <hr>
                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="Bedrooms" name="bedroom">
                    @for($i=0;$i<11;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group col-lg-3 col-xs-12">

                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="Property Type" name="property_type">
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
                <hr>
                <select class="form-control selectpicker" data-live-search="true" title="Min Budget" name="min">
                    <option value="400">$400</option>
                    <option value="500">$500</option>
                    <option value="600">$600</option>
                    <option value="700">$700</option>
                    <option value="800">$800</option>
                </select>
            </div>
            <div class="form-group col-lg-3 col-xs-12">

                <select class="form-control selectpicker" data-live-search="true" data-size="4" title="Property Status" name="property_status">
                    <option value="0">For Rent</option>
                    <option value="1">For Sale</option>

                </select>
                <hr>
                <select class="form-control selectpicker" data-live-search="true"  data-size="4" title="Max Budget" name="max">
                    <option value="800">$800</option>
                    <option value="1000">$1000</option>
                    <option value="1200">$1200</option>
                    <option value="1400">$1400</option>
                    <option value="1600">$1600</option>
                    <option value="1800">$1800</option>
                    <option value="2000">$2000</option>
                </select>
            </div>
            <div class="form-group col-lg-3 col-xs-12">

                <input type="text" class="form-control" placeholder="Keyword" name="keyword"/>
                <hr>
                <button type="submit" class="btn btn-default form-control search-form">Search
                </button>

            </div>


        </form>

    </div>
</div>

