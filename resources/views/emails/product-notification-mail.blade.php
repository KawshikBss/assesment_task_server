<h1>Product {{ $action }}</h1>

<p>Your product has been <strong>{{ $action }}</strong>.</p>

<table>
    <tr>
        <th>Name</th>
        <td>{{ $product->name }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $product->description }}</td>
    </tr>
    <tr>
        <th>Category</th>
        <td>{{ $product->category->name }}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{ $product->price }}</td>
    </tr>
</table>
