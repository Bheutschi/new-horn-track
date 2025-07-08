<div>
    <input type="checkbox" wire:model="checked">
    <span>
        {{ $checked ? 'Non' : 'Oui' }}
    </span>
    <div style="margin-top: 1rem;">
        <label for="input1">
            Input désactivé quand checkbox EST cochée :
        </label>
        <input
                id="input1"
                type="text"
                placeholder="Désactivé si coché"
                @disabled($disabled)
        >
    </div>
    <div style="margin-top: 1rem;">
        <label for="input2">
            Input désactivé quand checkbox N’EST PAS cochée :
        </label>
        <input
                id="input2"
                type="text"
                placeholder="Désactivé si NON coché"
                {{$disabled}}
        >
    </div>
</div>

