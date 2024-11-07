<!DOCTYPE html>
<html lang="en">
    @include('header')
    <body>
        <!-- Navbar -->
        @include('partials.__navbar')

        <!-- Contact Us Section -->
        <div class="container mx-auto my-20 px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-6">Contact Us</h1>
                <p class="text-lg text-gray-700 mb-12">We would love to hear from you! Please fill out the form below to get in touch with us.</p>
            </div>

            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 p-4">
                    <form action="/contact/submit" method="POST" class="bg-white p-8 rounded-lg shadow-md">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full p-3 border rounded-lg focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-3 border rounded-lg focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full p-3 border rounded-lg focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-orange-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600 transition duration-300">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('partials.__footer')
    </body>
</html>
