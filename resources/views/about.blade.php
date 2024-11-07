<!DOCTYPE html>
<html lang="en">
    @include('header')
    <body>
        <!-- Navbar -->
        @include('partials.__navbar')

        <div class="container mx-auto my-20 px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-6">About KartaArt</h1>
                <p class="text-lg text-gray-700 mb-12">Discover the story behind KartaArt, the premier destination for exquisite artworks and passionate artists.</p>
            </div>
            <div class="flex flex-wrap items-center justify-between mb-20">
                <div class="w-full md:w-1/2 p-4">
                    <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
                    <p class="text-gray-700 mb-4">At KartaArt, our mission is to connect talented artists with art enthusiasts from all around the world. We believe in the power of art to inspire, provoke, and transform, and we strive to make high-quality art accessible to everyone.</p>
                    <p class="text-gray-700">Whether you're looking for a statement piece for your home or a thoughtful gift for a loved one, KartaArt has something for everyone. Our curated collection includes paintings, sculptures, digital art, and more, all created by passionate artists dedicated to their craft.</p>
                </div>
                <div class="w-full md:w-1/2 p-4">
                    <h2 class="text-2xl font-semibold mb-4">Our Story</h2>
                    <p class="text-gray-700 mb-4">Founded in 2024, KartaArt emerged from a passion for creativity and a desire to support emerging artists. We started as a small community of art lovers and have grown into a platform that champions artistic expression and innovation.</p>
                    <p class="text-gray-700">Our team is committed to providing a seamless and enjoyable experience for both artists and buyers. From easy-to-navigate galleries to secure transactions, we ensure that every interaction on KartaArt is smooth and satisfying.</p>
                </div>
            </div>
        </div>

        @include('partials.__footer')
    </body>
</html>
