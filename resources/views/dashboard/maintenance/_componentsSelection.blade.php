<div class="form-group">
    @if(!$components->isEmpty())
        <div class="form-group">
            <div>
                <label>Affected components</label>
                @foreach($components as $component)
                    <br>
                    @php
                        $currentComponentIsSelected = isset($schedule) ? $schedule->components()->where('component_id', $component->id)->first() : null;
                        if($currentComponentIsSelected){
                            $currentStatus = $currentComponentIsSelected->component_status;
                        }else{
                            $currentStatus = 1;
                        }
                    @endphp
                    <input type="checkbox" name="components[{{$component->id}}][affected]" value="1" {{$currentComponentIsSelected ? ' checked' : ''}}/>
                    <label for="horns">{{$component->name}}</label>
                    <div class="radio-items">
                        @foreach(trans('cachet.components.status') as $statusID => $status)
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="components[{{$component->id}}][status]" value="{{ $statusID }}" {{$currentStatus == $statusID ? ' checked' : ''}}>
                                    {{$status}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
</div>
