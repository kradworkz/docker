
<!doctype html>
<html lang="en">

<head>
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Krad was here" name="description" />
    <meta content="KradWasHere" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
</head>

    <body data-topbar="dark" data-layout="horizontal">
        <div id="app"> 

            <div class="account-pages my-5 pt-sm-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card overflow-hidden">
                                <div class="bg-soft-primary">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="text-primary p-4">
                                                <h5 class="text-primary"> Hi {{ (Auth::check()) ? Auth::user()->name() : '' }}</h5>
                                                <p>Please set your new password.</p>
                                            </div>
                                        </div>
                                        <div class="col-5 align-self-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0"> 
                                    <div>
                                        <a href="index.html">
                                            <div class="avatar-md profile-user-wid mb-4">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    @if(Auth::check())
                                                    <img src="{{asset('images/avatars/'.Auth::user()->profile->avatar)}}" alt="" class="rounded-circle" height="65">
                                                    @endif
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="p-2">
                                        <form class="form-horizontal" method="POST">
                                                @csrf
                                            <input type="hidden" name="email" value="{{ $user->email }}"/>
                                            <div class="form-group">
                                                <label for="useremail">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter password" required autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="useremail">Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter password" required autocomplete="new-password">
                                            </div>
                        
                                            <div class="form-group row mb-0">
                                                <div class="col-12 text-right">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                                </div>
                                            </div>
        
                                        </form>
                                    </div>
                
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <p>© 2021 DOST-IX</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

