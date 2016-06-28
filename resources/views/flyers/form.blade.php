@inject('countries','App\Http\Utilities\Country')

<div class="row">
    {{ csrf_field() }}

    <div class="col-md-6">

        <div class="form-group">

            <label for="street">Street:</label>

            <input type="text" name="street" class="form-control" value="{{ old('street') }}" required>

        </div>

        <div class="form-group">

            <label for="city">City:</label>

            <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>

        </div>

        <div class="form-group">

            <label for="zip">Zip/Postal Code:</label>

            <input type="text" name="zip" class="form-control" value="{{ old('zip') }}" required>

        </div>

        <div class="form-group">

            <label for="country">Country:</label>

            <select id="country" name="country" class="form-control" value="{{ old('country') }}" required>

                @foreach($countries::all() as $country => $code)

                    <option value="{{$code}}">{{$country}}</option>

                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label for="state">State:</label>

            <input type="text" name="state" class="form-control" value="{{ old('state') }}" required>

        </div>

    </div>

    <div class="col-md-6">

        <div class="form-group">

            <label for="price">Price:</label>

            <input id="text" name="price" class="form-control" value="{{ old('price') }}" required>

        </div>

        <div class="form-group">

            <label for="description">Home Description:</label>

            <textarea name="description" class="form-control" rows="10" required>{{ old('description') }}</textarea>

        </div>

    </div>

    <div class="col-md-12">

        <hr>

        <div class="form-group">

            <button type="submit" class="btn btn-primary"> Create Flyer</button>

        </div>

    </div>



</div>

