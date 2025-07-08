<div>
    <input type="text" class="input" placeholder="Bénéficiaire" list="users" wire:model.live="search" name="{{ $display }}"/>
    <datalist id="users">
        @foreach ($results as $result)
        <option wire:key="{{ $result->id }}" value="{{$result->email}}"></option>
        @endforeach
    </datalist>
</div>
