<div class="col-sm-8">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <!-- Serial Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('serial_number', 'Serial Number:') !!}
        {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Startup Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('startup_date', 'Startup Date:') !!}
        {!! Form::text('startup_date', null, ['class' => 'form-control','id'=>'startup_date']) !!}
    </div>

    <!-- Location Address Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('location_address', 'Location Address:') !!}
        {!! Form::text('location_address', null, ['class' => 'form-control']) !!}
    </div>


    <!-- Equipment Status Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('equipment_status', 'Equipment Status:') !!}
        <div class="clearfix"></div>
        <label class="radio-inline">
            {!! Form::radio('equipment_status', "NOT INSTALLED", ['required' => 'required']) !!} NOT INSTALLED
        </label>

        <label class="radio-inline">
            {!! Form::radio('equipment_status', "INSTALLED", ['required' => 'required']) !!} INSTALLED
        </label>

        <label class="radio-inline">
            {!! Form::radio('equipment_status', " IN REPAIR", ['required' => 'required']) !!} IN REPAIR
        </label>

        <label class="radio-inline">
            {!! Form::radio('equipment_status', " IN MAINTENANCE", ['required' => 'required']) !!} IN MAINTENANCE
        </label>

    </div>
    <!-- Status Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('status', 'Status:') !!}
        <div class="clearfix"></div>
        <label class="radio-inline">
            {!! Form::radio('status', "A", ['required' => 'required']) !!} Active
        </label>

        <label class="radio-inline">
            {!! Form::radio('status', "I", ['required' => 'required']) !!} Inactive
        </label>

    </div>

    <!-- Equipment Model Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('equipment_model_id', 'Equipment Model:') !!}
        {!! Form::select('equipment_model_id', $equipment_model_list, null, ['class' => 'form-control select2',
        'required'
        => 'required']) !!}
    </div>

    <!-- Equipment Type Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('equipment_type_id', 'Equipment Type:') !!}
        {!! Form::select('equipment_type_id', $equipment_type_list, null, ['class' => 'form-control select2', 'required'
        =>
        'required']) !!}
    </div>
</div>
<div class="col-sm-4">
    <!-- Image Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('image', 'Image:') !!}
        @if (isset($equipment))
        <img class="img-thumbnail" style="max-width: 100%; max-height: 200px"
            src="{{ asset('storage/'.$equipment->image) }}" />
        @endif
        {!! Form::file('image') !!}
    </div>


    <!-- Location Geo Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('location_geo', 'Location Geo:') !!}
        @if (isset($equipment))
        <iframe id="map" width="100%" height="350" frameborder="0" style="border:0"
            src="{!! env('PATH_MAPS') !!}{{$equipment->location_geo}}" allowfullscreen>
        </iframe>
        @else
        <iframe id="map" width="100%" height="350" frameborder="0" style="border:0" src="{!! env('PATH_MAPS') !!}Lima"
            allowfullscreen>
        </iframe>
        @endif
        {!! Form::text('location_geo', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        <button class="btn bg-purple btn-block" onclick="javascript:getLocation();" type="button">Obtener Ubicación</button>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipment.index') !!}" class="btn btn-default">Cancel</a>
</div>



@push('scripts')
<script type="text/javascript">
    $('#startup_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        });
    $(function () {
          //Initialize Select2 Elements
          $('.select2').select2({width: '100%'});
    });

    function getLocation() {
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function geoSuccess(position) {
        let lat = position.coords.latitude;
        let lng = position.coords.longitude;
        document.getElementById("location_geo").value = lat + ',' + lng;
        document.getElementById('map').setAttribute('src', '{!! env('PATH_MAPS') !!}' + lat + ',' + lng);
    }

    function geoError() {
        alert("Geocoder failed.");
    }

</script>
@endpush
