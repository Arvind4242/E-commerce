@extends('master')

@section('content')
<div class="row custom-product my-4">
    <div class="col-sm-10 text-sm-center">
        <table class="table">
            <thead class="text-align">
                <tr>
                    <th>Item</th>
                    <th>Price (in dollars)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>{{ $total }}$</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>0$</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>50$</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{ $total + 50 }}$</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-10 offset-sm-1">
        <form action="{{ route('orderPlace')}}" method="POST">
            @csrf
            <div class="form-group row">

                <div class="col-sm-6">
                    <textarea id="address" name="address" placeholder="Enter your Address" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group ">
                <label style="color: rgb(42, 177, 144)" class="col-sm-2 col-form-label"><h6>Payment Method:</h6></label>
                <div class="col-sm-6">
                    <div class="form-check">
                        <input type="radio" name="payment" id="cash_on_delivery" class="form-check-input" value="cash">
                        <label for="cash_on_delivery" class="form-check-label"><h6>Cash on delivery</h6></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment" id="with_card" class="form-check-input" value="card">
                        <label for="with_card" class="form-check-label"><h6>With Card</h6></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment" id="with_upi" class="form-check-input" value="upi">
                        <label for="with_upi" class="form-check-label"><h6>With UPI</h6></label>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="form-group row">
                <div class="col-sm-6 offset-sm-2">
                    <button type="submit"   class="btn btn-primary"><h6>Place Your Order</h6></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
