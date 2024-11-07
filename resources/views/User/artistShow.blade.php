<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__navbar')

    <div class="container mx-auto my-20">
        <!-- Content Below -->
        <div class="border-b-2 border-black my-10 px-3 ">
            <h1 class="text-3xl font-bold mb-4">Artist</h1>
        </div>
        <div class="grid grid-cols-1 gap-4 px-3 py-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">
            @foreach ($artists as $artist)
                <div class="shadow-lg rounded-2xl p-2 relative flex flex-col">
                    <div class="p-4 flex-1">
                        <img src="{{ asset('images/No_Picture.png') }}" alt="" class="mb-3 w-full h-48 object-contain">
                        <h2 class="text-xl font-semibold">Artist Name: {{ $artist->artist_name }} </h2>
                        @if ($artist->artworks_count > 0)
                            <p>Total Artworks: {{$artist->artworks_count}} </p>   
                        @else
                            <p>Total Artworks: This artist has not submitted any artworks yet.</p>
                        @endif    
                        <p>Most Selling Artwork: No Artwork Sold yet.</p>
                    </div>
                </div>   
            @endforeach
        </div>        
    </div>

    @include('partials.__footer')

</body>
</html>