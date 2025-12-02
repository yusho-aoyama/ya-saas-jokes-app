<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About This Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 bg-white p-6 rounded shadow">

            <h3 class="text-lg font-bold">Portfolio Project: Small MVC Web Application</h3>

            <p>
                This web application is a demonstration of implementing a small MVC-based application
                using Laravel (PHP framework) as part of the Portfolio Part 2 project.
            </p>

            <h4 class="mt-4 font-semibold">Key Features:</h4>
            <ul class="list-disc list-inside ml-4 space-y-1">
                <li>Static pages with a StaticPageController (e.g., Home, About).</li>
                <li>User authentication: registration, login, logout.</li>
                <li>Stateful session handling to track logged-in users.</li>
                <li>BREAD/CRUD functionality for managing jokes.</li>
                <li>Routing of HTTP requests using Laravel's route system.</li>
                <li>Simple relationships: Users, Jokes, Votes, Categories.</li>
                <li>Roles and Permissions to restrict access (admin/staff/general users).</li>
                <li>Interactive features using Livewire: like/dislike functionality for jokes.</li>
            </ul>

            <h4 class="mt-4 font-semibold">Technologies Used:</h4>
            <ul class="list-disc list-inside ml-4 space-y-1">
                <li>Laravel Framework (PHP)</li>
                <li>Blade Templates for views</li>
                <li>MySQL for database</li>
                <li>Livewire for interactive components</li>
                <li>Tailwind CSS for styling</li>
                <li>Composer for dependency management</li>
            </ul>

            <h4 class="mt-4 font-semibold">Learning Outcomes:</h4>
            <ul class="list-disc list-inside ml-4 space-y-1">
                <li>Understanding MVC architecture and how models, views, and controllers interact.</li>
                <li>Implementing CRUD operations with relationships between tables.</li>
                <li>Managing user authentication and permissions securely.</li>
                <li>Building interactive, stateful components using Livewire.</li>
                <li>Writing maintainable routes and controllers following Laravel conventions.</li>
            </ul>

            <p class="mt-4">
                Overall, this project demonstrates a small but functional web application using Laravel,
                following best practices in MVC design and modern PHP development.
            </p>

        </div>
    </div>

</x-app-layout>
