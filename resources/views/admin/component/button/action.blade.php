<div class="dropdown">
    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        @if($name == 'user')
            @if (auth()->user()->id != $row->id)
                <form action="{{ route('admin.user.destroy', $row) }}" method="post">
                    @csrf
                    @method('delete')
                    <a class="dropdown-item" href="{{ route('admin.user.edit', $row) }}">{{ __('Edit') }}</a>
                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                {{ __('Delete') }}
                    </button>
                </form>
            @else
                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">{{ __('Edit') }}</a>
            @endif
        @else
            <form action="{{ route('admin.'.$name.'.destroy', $row) }}" method="post">
                @csrf
                @method('delete')
                <a class="dropdown-item" href="{{ route('admin.'.$name.'.edit', $row) }}">{{ __('Edit') }}</a>
                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this $name ?") }}') ? this.parentElement.submit() : ''">
                            {{ __('Delete') }}
                </button>
            </form>
        @endif
    </div>
</div>