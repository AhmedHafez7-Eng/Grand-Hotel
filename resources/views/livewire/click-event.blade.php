<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
<div>
    <button type="button" wire:click="callFunction" class="btn btn-danger">Click Me</button>
    <button type="button" wire:click="callFunctionArg({{$user_id}})" class="btn btn-danger">Click Me!</button>
       
    <p>{{ $message }}</p>
</div>
