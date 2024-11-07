<nav class="mt-4 space-y-2">
    <a href="{{ route('user.ShowAccount')}}" class="block text-lg px-4 py-2 text-gray-700 hover:text-orange-400">
        <i class="fa-solid fa-user-circle"></i> Profile
    </a>
    <a href="{{ route('user.ShowOrders')}}" class="block text-lg px-4 py-2 text-gray-700 hover:text-orange-400">
        <i class="fa-solid fa-box"></i> View Orders
    </a>
    <a href="{{ route('user.ShowAddress')}}" class="block text-lg px-4 py-2 text-gray-700 hover:text-orange-400">
        <i class="fa-solid fa-map-marker-alt"></i> Address
    </a>
    <a href="{{ route('user.ResetPassword')}}" class="block text-lg px-4 py-2 text-gray-700 hover:text-orange-400">
        <i class="fa-solid fa-lock"></i> Reset Password
    </a>
</nav>