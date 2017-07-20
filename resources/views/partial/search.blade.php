
        <div class="panel panel-custom">
            <div class="panel-heading">
                <h3 class="panel-title">FIND YOUR PLACE</h3>
            </div>
            <div class="panel-body">
                <form class="form-inline" action="" method="">
                    <div class="form-group col-lg-3 col-xs-12">

                        <select class="form-control selectpicker" data-live-search="true" title="Location">
                            @foreach($district as $d)
                                <option value="{{$d->id}}">{{$d->name_en}}</option>

                            @endforeach

                        </select>
                        <hr>
                        <select class="form-control selectpicker" data-live-search="true" title="Bedrooms">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-xs-12">

                        <select class="form-control selectpicker" data-live-search="true" title="Property Type">
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
                        <select class="form-control selectpicker" data-live-search="true" title="Min Budget">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-xs-12">

                        <select class="form-control selectpicker" data-live-search="true" title="Property Status">
                            <option value="0">For Rent</option>
                            <option value="1">For Sale</option>

                        </select>
                        <hr>
                        <select class="form-control selectpicker" data-live-search="true" title="Max Budget">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-xs-12">

                        <input type="text" class="form-control" placeholder="Keyword"/>
                        <hr>
                        <button type="submit" class="btn btn-default form-control search-form">Search
                        </button>

                    </div>



                </form>

            </div>
        </div>

