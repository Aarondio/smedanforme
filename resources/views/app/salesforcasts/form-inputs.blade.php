@php $editing = isset($salesforcast) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="product_id" label="Product" required>
            @php $selected = old('product_id', ($editing ? $salesforcast->product_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Product</option>
            @foreach($products as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jan_price"
            label="Jan Price"
            :value="old('jan_price', ($editing ? $salesforcast->jan_price : ''))"
            max="255"
            step="0.01"
            placeholder="Jan Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="feb_price"
            label="Feb Price"
            :value="old('feb_price', ($editing ? $salesforcast->feb_price : ''))"
            max="255"
            step="0.01"
            placeholder="Feb Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="mar_price"
            label="Mar Price"
            :value="old('mar_price', ($editing ? $salesforcast->mar_price : ''))"
            max="255"
            step="0.01"
            placeholder="Mar Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="aprile_price"
            label="Aprile Price"
            :value="old('aprile_price', ($editing ? $salesforcast->aprile_price : ''))"
            max="255"
            step="0.01"
            placeholder="Aprile Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="may_price"
            label="May Price"
            :value="old('may_price', ($editing ? $salesforcast->may_price : ''))"
            max="255"
            step="0.01"
            placeholder="May Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jun_price"
            label="Jun Price"
            :value="old('jun_price', ($editing ? $salesforcast->jun_price : ''))"
            max="255"
            step="0.01"
            placeholder="Jun Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jul_price"
            label="Jul Price"
            :value="old('jul_price', ($editing ? $salesforcast->jul_price : ''))"
            max="255"
            step="0.01"
            placeholder="Jul Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="aug_price"
            label="Aug Price"
            :value="old('aug_price', ($editing ? $salesforcast->aug_price : ''))"
            max="255"
            step="0.01"
            placeholder="Aug Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="sep_price"
            label="Sep Price"
            :value="old('sep_price', ($editing ? $salesforcast->sep_price : ''))"
            max="255"
            step="0.01"
            placeholder="Sep Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="oct_price"
            label="Oct Price"
            :value="old('oct_price', ($editing ? $salesforcast->oct_price : ''))"
            max="255"
            step="0.01"
            placeholder="Oct Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nov_price"
            label="Nov Price"
            :value="old('nov_price', ($editing ? $salesforcast->nov_price : ''))"
            max="255"
            step="0.01"
            placeholder="Nov Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="dec_price"
            label="Dec Price"
            :value="old('dec_price', ($editing ? $salesforcast->dec_price : ''))"
            max="255"
            step="0.01"
            placeholder="Dec Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jan_qty"
            label="Jan Qty"
            :value="old('jan_qty', ($editing ? $salesforcast->jan_qty : ''))"
            maxlength="255"
            placeholder="Jan Qty"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="feb_qty"
            label="Feb Qty"
            :value="old('feb_qty', ($editing ? $salesforcast->feb_qty : ''))"
            maxlength="255"
            placeholder="Feb Qty"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="mar_qty"
            label="Mar Qty"
            :value="old('mar_qty', ($editing ? $salesforcast->mar_qty : ''))"
            maxlength="255"
            placeholder="Mar Qty"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="apr_qty"
            label="Apr Qty"
            :value="old('apr_qty', ($editing ? $salesforcast->apr_qty : ''))"
            maxlength="255"
            placeholder="Apr Qty"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="may_qty"
            label="May Qty"
            :value="old('may_qty', ($editing ? $salesforcast->may_qty : ''))"
            maxlength="255"
            placeholder="May Qty"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jun_qty"
            label="Jun Qty"
            :value="old('jun_qty', ($editing ? $salesforcast->jun_qty : ''))"
            maxlength="255"
            placeholder="Jun Qty"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jul_qty"
            label="Jul Qty"
            :value="old('jul_qty', ($editing ? $salesforcast->jul_qty : ''))"
            maxlength="255"
            placeholder="Jul Qty"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="aug_qty"
            label="Aug Qty"
            :value="old('aug_qty', ($editing ? $salesforcast->aug_qty : ''))"
            maxlength="255"
            placeholder="Aug Qty"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="sep_qty"
            label="Sep Qty"
            :value="old('sep_qty', ($editing ? $salesforcast->sep_qty : ''))"
            maxlength="255"
            placeholder="Sep Qty"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="oct_qty"
            label="Oct Qty"
            :value="old('oct_qty', ($editing ? $salesforcast->oct_qty : ''))"
            maxlength="255"
            placeholder="Oct Qty"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nov_qty"
            label="Nov Qty"
            :value="old('nov_qty', ($editing ? $salesforcast->nov_qty : ''))"
            maxlength="255"
            placeholder="Nov Qty"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="dec_qty"
            label="Dec Qty"
            :value="old('dec_qty', ($editing ? $salesforcast->dec_qty : ''))"
            maxlength="255"
            placeholder="Dec Qty"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jan_cost"
            label="Jan Cost"
            :value="old('jan_cost', ($editing ? $salesforcast->jan_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Jan Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="feb_cost"
            label="Feb Cost"
            :value="old('feb_cost', ($editing ? $salesforcast->feb_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Feb Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="mar_cost"
            label="Mar Cost"
            :value="old('mar_cost', ($editing ? $salesforcast->mar_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Mar Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="apr_cost"
            label="Apr Cost"
            :value="old('apr_cost', ($editing ? $salesforcast->apr_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Apr Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="may_cost"
            label="May Cost"
            :value="old('may_cost', ($editing ? $salesforcast->may_cost : ''))"
            max="255"
            step="0.01"
            placeholder="May Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jun_cost"
            label="Jun Cost"
            :value="old('jun_cost', ($editing ? $salesforcast->jun_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Jun Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jul_cost"
            label="Jul Cost"
            :value="old('jul_cost', ($editing ? $salesforcast->jul_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Jul Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="aug_cost"
            label="Aug Cost"
            :value="old('aug_cost', ($editing ? $salesforcast->aug_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Aug Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="sep_cost"
            label="Sep Cost"
            :value="old('sep_cost', ($editing ? $salesforcast->sep_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Sep Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="oct_cost"
            label="Oct Cost"
            :value="old('oct_cost', ($editing ? $salesforcast->oct_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Oct Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nov_cost"
            label="Nov Cost"
            :value="old('nov_cost', ($editing ? $salesforcast->nov_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Nov Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="dec_cost"
            label="Dec Cost"
            :value="old('dec_cost', ($editing ? $salesforcast->dec_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Dec Cost"
        ></x-inputs.number>
    </x-inputs.group>
</div>
