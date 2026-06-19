<h1>Product {{ $action }}</h1>

<p>Greetings, {{ $product->user->name }}.</p>
<p>Your product has been {{ $action }}.</p>

<table>
    <tr>
        <th align="left">Name</th>
        <td>{{ $product->name }}</td>
    </tr>
    <tr>
        <th align="left">Description</th>
        <td>{{ $product->description }}</td>
    </tr>
    <tr>
        <th align="left">Category</th>
        <td>{{ $product->category->name }}</td>
    </tr>
    <tr>
        <th align="left">Price</th>
        <td>{{ $product->price }}</td>
    </tr>
</table>
