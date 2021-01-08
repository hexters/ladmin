<x-ladmin-layout>
    <x-slot name="title">Dashboard</x-slot>
    
    <div class="row">
        <div class="col-md-6 col-12">
            <x-ladmin-card>
                <h4 class="card-title">Welcome To The Ladmin Package</h4>
                <p>With this package you can save time in creating an admin page, because it is equipped with a Login page, Reset Password Permission layout, etc.</p>
                <p>
                    Visit for more plugins in this link <a href="https://github.com/hexters/ladmin/blob/master/readmes/plugins.md" target="_blank">Ladmin Plugins</a>
                </p>
            </x-ladmin-card>
        </div>
        <div class="col-md-6 col-12">
            <x-ladmin-card>
                <h4 class="card-title">Ladmin File</h4>
                <strong>Controllers</strong>
                <div class="bg-light p-3">
                    <code>app/Http/Controllers/Administrator</code>
                </div>
                <strong>Default Blade</strong>
                <div class="bg-light p-3">
                    <code>resources/views/vendor/ladmin</code>
                </div>
                <strong>Sidebar Menu</strong>
                <div class="bg-light p-3">
                    <code>app/Menus</code>
                </div>
                <strong>Repositories</strong>
                <div class="bg-light p-3">
                    <code>app/Repositories</code>
                </div>
                <strong>DataTables Server</strong>
                <div class="bg-light p-3">
                    <code>app/DataTables</code>
                </div>
                <strong>Assets</strong>
                <div class="bg-light p-3">
                    <code>resources/js/ladmin</code> <br>
                    <code>resources/sass/ladmin</code>
                </div>
                <strong>Exception</strong>
                <div class="bg-light p-3">
                    <code>Hexters\Ladmin\Exceptions\LadminException</code>
                </div>
                <strong>Custom Style</strong>
                <p>
                    See more detail about custom style <a href="https://github.com/hexters/ladmin#custom-style" target="_blank">Documentation</a>
                </p>
                
            </x-ladmin-card>
        </div>
    </div>

</x-ladmin-layout>