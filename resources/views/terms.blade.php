    @extends('layout.layout')
    @section('content')
        <div class="row">
             <div class="col-9 col-lg-3 pb-5">
                {{-- Left side bar --}}
                @include('shared.left-sidebar')
             </div>
                <div class="col-6">
                     <h1>Terms</h1>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui magnam alias hic. Repudiandae sit
                        consequuntur excepturi porro maiores temporibus, voluptatem voluptates natus ducimus repellat velit, vel fuga dicta omnis itaque! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui magnam alias hic. Repudiandae sit
                        consequuntur excepturi porro maiores temporibus, voluptatem voluptates natus ducimus repellat velit, vel fuga dicta omnis itaque! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui magnam alias hic. Repudiandae sit
                        consequuntur excepturi porro maiores temporibus, voluptatem voluptates natus ducimus repellat velit, vel fuga dicta omnis itaque! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui magnam alias hic. Repudiandae sit
                        consequuntur excepturi porro maiores temporibus, voluptatem voluptates natus ducimus repellat velit, vel fuga dicta omnis itaque! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui magnam alias hic. Repudiandae sit
                        consequuntur excepturi porro maiores temporibus, voluptatem voluptates natus ducimus repellat velit, vel fuga dicta omnis itaque!
                    </div>
                </div>
                <div class="col-12 col-lg-3 pt-5">
                    @include('shared.search-bar')
                    @include('shared.follow-box')
                </div>
        </div>

    @endsection

