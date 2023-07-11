@include('layouts.dashboard.main')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="error-sec">
                    <h2>4<i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></i>3</h2>
                    <h3 style="font-weight:700; opacity:0.7">Acess Denied</h3>
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p style="font-size:16px;">{{ $error_message }}</p>
                        </div>   
                    <div class="error-btn"> 
                        <a title="" href="{{ route('dashboard') }}" class="primary button circle">Go to Dashboard</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->