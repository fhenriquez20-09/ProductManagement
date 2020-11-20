<div class="row">
    <div>
        <div class="image-wrap">
            <label class="label-description" for="Photo">{{'Photo'}}</label>
            @if(isset($product->photo))
            <br>
            <img src="{{ asset('storage').'/'.$product->photo}}" alt="">
            <br>
            @endif
            <input type="file" name="photo" id="photo" value="">
        </div>
    </div>
    <div class="general-content">
        <div class="row">
            <div class="col-6">
                <label class="label-description" for="name">{{'Name'}}</label>
                <div>
                    <input class="form-control" type="text" name="name" id="name" value="{{isset($product->name) ? $product->name : ''}}">
                </div>
                
                <label class="label-description" for="original_price">{{'Original price'}}</label>
                <div>
                    <input class="form-control" type="number" name="original_price" id="original_price" value="{{isset($product->original_price) ? $product->original_price : ''}}">
                </div>
            </div>
            <div class="col-6">
                <label class="label-description" for="discount_price">{{'Discount price'}}</label>
                <div>
                    <input class="form-control" type="number" name="discount_price" id="discount_price" value="{{isset($product->discount_price) ? $product->discount_price : ''}}">
                </div>
                
                <label class="label-description" for="in_stock">{{'In stock ?'}}</label>
                <div>
                    <input class="form-control" type="checkbox" name="in_stock" id="in_stock" {{isset($product->in_stock) && $product->in_stock == 1 ? 'checked=checked' :''}} value="{{isset($product->in_stock) && $product->in_stock == 1 ? '1' : ''}}">
                </div>

                <label class="label-description" for="status">{{'Is active ?'}}</label>
                <div>
                    <input class="form-control" type="checkbox" name="status" id="status" {{isset($product->status) && $product->status == 1 ? 'checked=checked' :''}} value="{{isset($product->status) && $product->status == 1 ? '1' : ''}}">
                </div>
            </div>
        </div>
        
    </div>
</div>
