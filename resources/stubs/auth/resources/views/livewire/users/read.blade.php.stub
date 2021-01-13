<div id="read-user-modal" class="modal fade" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body pb-0">
                @isset($user)
                    <dl>
                        @foreach($user->toArray() as $attribute => $value)
                            <dt class="small text-muted">
                                {{ Str::of($attribute)->replace('_', ' ')->title() }}
                            </dt>

                            <dd class="mb-3">
                                @if(is_array($value))
                                    <pre class="mb-0">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                                @else
                                    {{ $value ?? 'N/A' }}
                                @endif
                            </dd>
                        @endforeach
                    </dl>
                @endisset
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
