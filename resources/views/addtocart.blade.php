@extends('layouts.template')
@section('main')
<h6>
This order runs directly on paypal server. So what it does it that the cart is stored temporary on paypal server until user buy the item and credit directly to your paypal account. You can play with this.
</h6>

<img src="/img/chickenrice.jpg" alt="ChickenRice" style="width:304px;height:228px;">


<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="K8YKT7L6EZA2A">
<table>
<tr><td><input type="hidden" name="on0" value="Chicken Rice">Chicken Rice</td></tr><tr><td><select name="os0">
	<option value="Small">Small $2.50 SGD</option>
	<option value="Large">Large $3.00 SGD</option>
</select> </td></tr>
<tr><td><input type="hidden" name="on1" value="Others(e.g. less oil)">Others(e.g. less oil)</td></tr><tr><td><input type="text" name="os1" maxlength="200"></td></tr>
</table>
<input type="hidden" name="currency_code" value="SGD">
<input type="image" src="http://188.166.218.227/img/addtocart.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>



@endsection
