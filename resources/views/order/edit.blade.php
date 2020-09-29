<form action="{{ route('order.update', $order) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <label for="email">Client e-mail:</label>
    <input type="email" name="client_email" value="{{ $order->client_email }}">

    <label for="partner">Partner</label>
    <input type="email" name="partner" value="{{ $order->partner->name }}">

    <h1>Продукты</h1>
    @foreach($order->products as $product)
        <p>Продукт: {{ $product->name }}, кол-во: {{ $product->pivot->quantity }}</p>
    @endforeach

    <label for="status">Status</label>
    <select name="status">
        @foreach($order->statuses as $key => $status)
            <option value="{{ $key }}" @if($order->status === $status) selected @endif>{{ $status }}</option>
        @endforeach
    </select>

    <p>Price: {{ $order->countPrice() }}</p>
</form>