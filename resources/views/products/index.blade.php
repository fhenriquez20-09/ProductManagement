<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg table-container">

            <a href="{{url('/products/create')}}">New product</a>
                
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Original price</th>
                            <th>Discount price</th>
                            <th>In stock</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="profile-image-table">
                                        <img src="{{ asset('storage').'/'.$product->photo}}" alt="">
                                    </div>
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->original_price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>{{$product->in_stock}}</td>
                                <td>{{$product->status}}</td>
                                <td>{{$product->created_at}}</td>
                                <td nowrap>
                                    <div class="row">
                                        <div class="px-2">
                                            <a href="{{url('/products/'.$product->id.'/edit')}}">Editar</a>
                                        </div>
                                        <div class="px-2">
                                            |
                                        </div>
                                        <div class="px-2">
                                            <form method="post" action="{{ url('/products/'.$product->id) }}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button type="submit" onclick="return confirm('Are you sure ?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>