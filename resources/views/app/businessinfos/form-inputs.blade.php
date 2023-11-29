@php $editing = isset($businessinfo) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="business_name"
            label="Business Name"
            :value="old('business_name', ($editing ? $businessinfo->business_name : ''))"
            maxlength="255"
            placeholder="Business Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $businessinfo->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="audience_need"
            label="Audience Need"
            maxlength="255"
            required
            >{{ old('audience_need', ($editing ? $businessinfo->audience_need :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="business_model"
            label="Business Model"
            maxlength="255"
            required
            >{{ old('business_model', ($editing ? $businessinfo->business_model
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="target_market"
            label="Target Market"
            maxlength="255"
            required
            >{{ old('target_market', ($editing ? $businessinfo->target_market :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="competition_ad"
            label="Competition Ad"
            maxlength="255"
            required
            >{{ old('competition_ad', ($editing ? $businessinfo->competition_ad
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="management_team"
            label="Management Team"
            maxlength="255"
            required
            >{{ old('management_team', ($editing ?
            $businessinfo->management_team : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="loan_amount"
            label="Loan Amount"
            :value="old('loan_amount', ($editing ? $businessinfo->loan_amount : ''))"
            maxlength="255"
            placeholder="Loan Amount"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="loan_reason"
            label="Loan Reason"
            :value="old('loan_reason', ($editing ? $businessinfo->loan_reason : ''))"
            maxlength="255"
            placeholder="Loan Reason"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
