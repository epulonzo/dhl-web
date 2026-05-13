<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>DHL Dashboard</title>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <aside class="w-64 bg-red-600 text-white p-6">
        <h1 class="text-2xl font-bold mb-8">DHL System</h1>

        <nav class="space-y-4">
            <a href="#" class="block hover:bg-red-500 p-2 rounded">Dashboard</a>
            <a href="#" class="block hover:bg-red-500 p-2 rounded">Incidents</a>
            <a href="#" class="block hover:bg-red-500 p-2 rounded">Reports</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6">
                <h2>Total Incidents</h2>
                <p class="text-3xl font-bold mt-2">128</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2>Resolved</h2>
                <p class="text-3xl font-bold mt-2">94</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2>High Priority</h2>
                <p class="text-3xl font-bold mt-2">17</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold mb-4">Recent Incidents</h2>

            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3">ID</th>
                        <th class="text-left py-3">Category</th>
                        <th class="text-left py-3">Priority</th>
                        <th class="text-left py-3">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($incidents as $incident)
                    <tr class="border-b">
                        <td class="py-4">{{ $incident['id'] }}</td>
                        <td>{{ $incident['category'] }}</td>
                        <td>{{ $incident['priority'] }}</td>
                        <td>{{ $incident['status'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</div>

</body>
</html>