<div>
    <input type="email" class="input w-full" placeholder="{{ __($placeholder) }}" list="users" wire:model.live="search" autocomplete="off" name="{{ $name }}" required/>
    <datalist id="users">
        @foreach ($results as $result)
            <option wire:key="{{ $result->id }}" value="{{$result->$display}}"></option>
        @endforeach
    </datalist>
</div>
