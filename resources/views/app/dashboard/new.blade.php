<div class="position-relative p-0 px-4">
    <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
        href="#collapse-qty">Other months</a>
</div>
<div id="collapse-qty"
    class="card-footer border-0  p-0 accordion-collapse collapse rounded-0">
    <div class="code-wrapper">
        <div class=" mb-2">
            <label for="feb_qty" class="">qty of producing in Febuary</label>
            <input id="feb_qty" name="feb_qty" type="number" value=""
                class="form-control" placeholder="Febuary qty" required>
            @error('feb_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="mar_qty" class="">qty of producing in March</label>
            <input id="mar_qty" name="mar_qty" type="number" value=""
                class="form-control" placeholder="March qty" required>
            @error('mar_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="apr_qty" class="">qty of producing in April</label>
            <input id="apr_qty" name="apr_qty" type="number" value=""
                class="form-control" placeholder="April qty" required>
            @error('apr_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="may_qty" class="">qty of producing in May</label>
            <input id="may_qty" name="may_qty" type="number" value=""
                class="form-control" placeholder="May qty" required>
            @error('may_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="jun_qty" class="">qty of producing in June</label>
            <input id="jun_qty" name="jun_qty" type="number" value=""
                class="form-control" placeholder="June qty" required>
            @error('jun_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="jul_qty" class="">qty of producing in July</label>
            <input id="jul_qty" name="jul_qty" type="number" value=""
                class="form-control" placeholder="July qty" required>
            @error('jul_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="aug_qty" class="">qty of producing in August</label>
            <input id="aug_qty" name="aug_qty" type="number" value=""
                class="form-control" placeholder="August qty" required>
            @error('aug_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="sep_qty" class="">qty of producing in September</label>
            <input id="sep_qty" name="sep_qty" type="number" value=""
                class="form-control" placeholder="September qty" required>
            @error('sep_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="oct_qty" class="">qty of producing in October</label>
            <input id="oct_qty" name="oct_qty" type="number" value=""
                class="form-control" placeholder="October qty" required>
            @error('oct_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="nov_qty" class="">qty of producing in November</label>
            <input id="nov_qty" name="nov_qty" type="number" value=""
                class="form-control" placeholder="November qty" required>
            @error('nov_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class=" mb-2">
            <label for="dec_qty" class="">qty of producing in November</label>
            <input id="dec_qty" name="dec_qty" type="number" value=""
                class="form-control" placeholder="December qty" required>
            @error('dec_qty')
                <p class="small text-danger"> {{ $message }}</p>
            @enderror
        </div>
    </div>
</div>