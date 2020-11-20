<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg card-form">
                
                <form method="post" action="{{url('/products/'. $product->id )}}" enctype="multipart/form-data">

                    {{csrf_field()}}
                    {{method_field('PATCH')}}

                    @include('products.form')

                    <input type="submit" value="Update">

                    <a href="{{url('/products')}}">Back</a>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>