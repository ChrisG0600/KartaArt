<!DOCTYPE html>
<html lang="en">
    @include('header')
<body>
    <!-- Navbar -->
    @include('partials.__navbar')
    
    {{-- Hero Section --}}
    <div class="relative">
        <img src="{{asset('images/steel_sky.jpg')}}" alt="Background Image" class="bg-cover bg-no-repeat bg-center w-full h-auto" loading="lazy">
        <div class="overlap_header absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 px-4 md:px-8">
            <h5 class="font-bold text-center text-2xl sm:text-4xl md:text-4xl lg:text-5xl xl:text-6xl">Sky Ahead, Look for Inspiration</h5>
            <p class="text-center text-gray-400 text-lg sm:text-xl md:text-2xl lg:text-3xl">Discover your next masterpiece.</p>
        </div>
    </div>    
    <div class="container mx-auto my-20">
        <h5 class="px-3 pt-5 pb-2 text-2xl">
            Currently for Sale:
        </h5>
        <div class="grid grid-cols-1 gap-4 px-3 py-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Artwork 1 -->
            @foreach ( $artworks as $art)
                <div class="relative">
                    <img src="{{asset('artworks/'. $art->image)}}" alt="{{$art->artwork_title}}" class="w-full h-full object-cover rounded">
                </div>                
            @endforeach

        </div>
    </div>
    

    <div class=" bg-orange-400 h-1/2 w-full text-white text-xl mb-5 py-5 text-center">
        <div class="container mx-auto">
            <h5 class="font-bold italic px-3 py-3">
                Mission:
            </h5>
            <p class="px-3 py-3 text-left sm:px-3">
                At KartaArt, our mission is to connect talented artists with art enthusiasts from all around the world. We believe in the power of art to inspire, provoke, and transform, and we strive to make high-quality art accessible to everyone.
                Whether you're looking for a statement piece for your home or a thoughtful gift for a loved one, KartaArt has something for everyone. Our curated collection includes paintings, sculptures, digital art, and more, all created by passionate artists dedicated to their craft.
            </p>
            <h5 class="font-bold italic px-3 py-3">
                Objectives:
            </h5>
            <p class="px-3 py-3 text-left">
                To cultivate a thriving creative community where artists and innovators can find inspiration, showcase their work, and connect with others to collaborate on unique and boundary-pushing projects. Whether you’re looking for your next creative spark or a place 
                to share your latest artwork, KartaArt is here to support your artistic journey.         
            </p>            
        </div>

    </div>
    
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800">What Our Creators Say</h2>
                <p class="text-gray-500 text-lg mt-2">Inspiration straight from the voices of our community</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User Image" class="rounded-full h-12 w-12">
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-700">Ella Thompson</h4>
                            <p class="text-gray-400 text-sm">Contemporary Painter</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"KartaArt has been a game-changer for me. It not only gave me a platform to showcase my work but also connect with other artists who share the same passion. I've sold more artwork here than anywhere else!"</p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User Image" class="rounded-full h-12 w-12">
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-700">James Oliver</h4>
                            <p class="text-gray-400 text-sm">Sculptor</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"As a sculptor, finding the right audience can be tough. KartaArt made it easier to reach people who truly appreciate my work. The community here is supportive, and the platform is incredibly user-friendly."</p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User Image" class="rounded-full h-12 w-12">
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-700">Mia Sanchez</h4>
                            <p class="text-gray-400 text-sm">Digital Artist</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"The tools and resources available on KartaArt have pushed my creative boundaries. I've connected with fellow creators, shared my work, and even collaborated on projects. This platform is a true haven for artists."</p>
                </div>
            </div>
        </div>
        
    </section>
    

    @include('partials.__footer')

</body>
</html>