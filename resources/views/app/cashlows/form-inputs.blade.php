@php $editing = isset($cashlow) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="directin_one"
            label="Directin One"
            :value="old('directin_one', ($editing ? $cashlow->directin_one : ''))"
            maxlength="255"
            placeholder="Directin One"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="directin_two"
            label="Directin Two"
            :value="old('directin_two', ($editing ? $cashlow->directin_two : ''))"
            maxlength="255"
            placeholder="Directin Two"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="directin_three"
            label="Directin Three"
            :value="old('directin_three', ($editing ? $cashlow->directin_three : ''))"
            maxlength="255"
            placeholder="Directin Three"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="directin_four"
            label="Directin Four"
            :value="old('directin_four', ($editing ? $cashlow->directin_four : ''))"
            maxlength="255"
            placeholder="Directin Four"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="indirectin_one"
            label="Indirectin One"
            :value="old('indirectin_one', ($editing ? $cashlow->indirectin_one : ''))"
            maxlength="255"
            placeholder="Indirectin One"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="indirectin_two"
            label="Indirectin Two"
            :value="old('indirectin_two', ($editing ? $cashlow->indirectin_two : ''))"
            maxlength="255"
            placeholder="Indirectin Two"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="indirectin_three"
            label="Indirectin Three"
            :value="old('indirectin_three', ($editing ? $cashlow->indirectin_three : ''))"
            maxlength="255"
            placeholder="Indirectin Three"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="indirectin_four"
            label="Indirectin Four"
            :value="old('indirectin_four', ($editing ? $cashlow->indirectin_four : ''))"
            maxlength="255"
            placeholder="Indirectin Four"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="wages_one"
            label="Wages One"
            :value="old('wages_one', ($editing ? $cashlow->wages_one : ''))"
            maxlength="255"
            placeholder="Wages One"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="wages_two"
            label="Wages Two"
            :value="old('wages_two', ($editing ? $cashlow->wages_two : ''))"
            maxlength="255"
            placeholder="Wages Two"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="wages_three"
            label="Wages Three"
            :value="old('wages_three', ($editing ? $cashlow->wages_three : ''))"
            maxlength="255"
            placeholder="Wages Three"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="wages_four"
            label="Wages Four"
            :value="old('wages_four', ($editing ? $cashlow->wages_four : ''))"
            maxlength="255"
            placeholder="Wages Four"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="capitalcost_one"
            label="Capitalcost One"
            :value="old('capitalcost_one', ($editing ? $cashlow->capitalcost_one : ''))"
            maxlength="255"
            placeholder="Capitalcost One"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="capitalcost_two"
            label="Capitalcost Two"
            :value="old('capitalcost_two', ($editing ? $cashlow->capitalcost_two : ''))"
            maxlength="255"
            placeholder="Capitalcost Two"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="capitalcost_three"
            label="Capitalcost Three"
            :value="old('capitalcost_three', ($editing ? $cashlow->capitalcost_three : ''))"
            maxlength="255"
            placeholder="Capitalcost Three"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="capitalcost_four"
            label="Capitalcost Four"
            :value="old('capitalcost_four', ($editing ? $cashlow->capitalcost_four : ''))"
            maxlength="255"
            placeholder="Capitalcost Four"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="businessinfo_id" label="Businessinfo" required>
            @php $selected = old('businessinfo_id', ($editing ? $cashlow->businessinfo_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Businessinfo</option>
            @foreach($businessinfos as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
