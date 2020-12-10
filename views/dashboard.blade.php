<x-app-layout>
    <x-slot name="header">
        <h2 class="m-0">Starter Page</h2>
    </x-slot>
    <x-slot name="slot">

        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Companies</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">We are making things</h6>

                            <p class="card-text">Here you can check, update or delete companies.</p>
                            <a style="margin-top: 20px;" href="{{route('companies')}}" class="btn btn-primary">Go to
                                companies list</a>
                        </div>
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Clients</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">We are making things</h6>

                            <p class="card-text">Here you can check, update or delete clients.</p>
                            <a style="margin-top: 20px;" href="{{route('clients')}}" class="btn btn-success">Go to
                                clients list</a>
                        </div>
                    </div>
                </div>

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
    </x-slot>

</x-app-layout>
