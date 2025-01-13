<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Groups</h1>

        <!-- Add Group Form -->
        <form action="{{ route('groups.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex space-x-4">
                <input type="text" name="name" placeholder="Name" class="p-2 border border-gray-300 rounded" required>
                <input type="text" name="gender" placeholder="Gender" class="p-2 border border-gray-300 rounded" required>
                <input type="email" name="email" placeholder="Email" class="p-2 border border-gray-300 rounded" required>
                <input type="text" name="system" placeholder="System" class="p-2 border border-gray-300 rounded" required>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Memeber</button>
            </div>
        </form>

        <!-- Groups Table -->
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Gender</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">System</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $group->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $group->gender }}</td>
                    <td class="py-2 px-4 border-b">{{ $group->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $group->system }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="#" class="text-blue-500">Edit</a>
                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> 