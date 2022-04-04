<x-ladmin-auth-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="m-3">
        <div class="row">
            <div class="col-lg-6 m-0 p-0">
                <x-ladmin-card class="rounded-0">
                    <x-slot name="body">
                        <div class="d-flex align-item-top">
                            <div class="me-3">
                                <i class="fa text-primary fa-regular fa-3x fa-book-open"></i>
                            </div>
                            <div>
                                <a href="https://github.com/hexters/ladmin/wiki" target="_blank" class="text-decoration-none">
                                    <h5 class="card-title">Wiki</h5>
                                </a>
                                <p class="text-muted">
                                    For your guide ladmin has provided a wiki documentation for your project reference.
                                </p>
                            </div>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </div>
            <div class="col-lg-6 m-0 p-0">
                <x-ladmin-card class="rounded-0">
                    <x-slot name="body">

                        <div class="d-flex align-item-top">
                            <div class="me-3">
                                <i class="fa text-primary fa-3x fa-solid fa-rocket"></i>
                            </div>
                            <div>
                                <a href="https://github.com/hexters/ladmin/wiki/Module" target="_blank" class="text-decoration-none">
                                    <h5 class="card-title">Artisan</h5>
                                </a>
                                <p class="text-muted">
                                    Making modules made using artisan, very easy and very fast. Can be very reliable in urgent situations.
                                </p>
                            </div>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 m-0 p-0">
                <x-ladmin-card class="rounded-0">
                    <x-slot name="body">
                        <div class="d-flex align-item-top">
                            <div class="me-3">
                                <i class="fa text-primary fa-3x fa-solid fa-bug"></i>
                            </div>
                            <div>
                                <a href="https://github.com/hexters/ladmin/issues" target="_blank" class="text-decoration-none">
                                    <h5 class="card-title">Report Issue</h5>
                                </a>
                                <p class="text-muted">
                                    You can report any issues you find from this ladmin via the issues page on the github repo
                                </p>
                            </div>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </div>
            <div class="col-lg-6 m-0 p-0">
                <x-ladmin-card class="rounded-0">
                    <x-slot name="body">

                        <div class="d-flex align-item-top">
                            <div class="me-3">
                                <i class="fa text-primary fa-3x fas fa-flask"></i>
                            </div>
                            <div>
                                <a href="https://github.com/hexters/ladmin" target="_blank" class="text-decoration-none">
                                    <h5 class="card-title">Contributors are Welcome</h5>
                                </a>
                                <p class="text-muted">
                                    We invite you who want to participate in developing ladmin with the aim of making it better.
                                </p>
                            </div>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </div>
        </div>
    </div>


</x-ladmin-auth-layout>
