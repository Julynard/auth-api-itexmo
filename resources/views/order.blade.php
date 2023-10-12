<h1>Order Details</h1>

<h2>Customer Details</h2>
Email: {{ $userEmail }}<br>

<h2>Ordered Products</h2>
<ul>
    @foreach($products as $product)
        <li>{{ $product->name }} - ${{ $product->price }}</li>
    @endforeach
</ul>

<h2>Total Amount: ${{ $totalAmount }}</h2>
