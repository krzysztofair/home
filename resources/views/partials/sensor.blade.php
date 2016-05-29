<div class="col col-md-3">
    <div class="sensor sensor-{{ $sensor->type}}">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>
                    {{ trans("sensors.{$sensor->type}") }}
                    <small class="pull-right">#{{ $sensor->id }}</small>
                </h3>
                @include("sensors.{$sensor->type}", [ 'sensor' => $sensor ])
            </div>
        </div>
    </div>
</div>