<div class="modal fade" id="modal-accept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left font-weight-normal">{{ __( "dashboard.accept_action" ) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ __( "dashboard.attempt2delete" ) }} {{ __( "dashboard.$name" ) }} <span class="contacts-classic">№{{ $id }}</span>.
                    {!! __( "dashboard.warning" ) !!}
                </p>
            </div>
            <form action="{{ route( "dashboard.".\App\Helpers\Utilities::access_type().".".Str::plural($name).".delete", $id ) }}" class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __( "dashboard.cancel" ) }}</button>
                <button type="submit" class="btn btn-primary warning">{{ __( "dashboard.remove" ) }}</button>
            </form>
        </div>
    </div>
</div>
