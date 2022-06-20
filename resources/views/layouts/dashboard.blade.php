@extends('layouts.main')
@section('title')
    Dashboard | QUEEN Z
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning {{ auth()->user()->name }}</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    <option selected>Aug 19</option>
                    <option value="1">July 19</option>
                    <option value="2">Jun 19</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- *************************************************************** -->
    <!-- Start First Cards -->
    <!-- *************************************************************** -->
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">236</h2>
                            <span
                                class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Clients</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                class="set-doller">$</sup>18,306</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Earnings of Month
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                            <span
                                class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Projects</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Projects</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End First Cards -->
    <!-- *************************************************************** -->
    <!-- *************************************************************** -->
    <!-- Start Sales Charts Section -->
    <!-- *************************************************************** -->
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Sales</h4>
                    <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                    <ul class="list-style-none mb-0">
                        <li>
                            <i class="fas fa-circle text-primary font-10 mr-2"></i>
                            <span class="text-muted">Direct Sales</span>
                            <span class="text-dark float-right font-weight-medium">$2346</span>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-circle text-danger font-10 mr-2"></i>
                            <span class="text-muted">Referral Sales</span>
                            <span class="text-dark float-right font-weight-medium">$2108</span>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                            <span class="text-muted">Affiliate Sales</span>
                            <span class="text-dark float-right font-weight-medium">$1204</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fasilites</h4>
                    <div style="height:300px;">
                    <br>
                        <div>
                            <i class="fas fa-utensils"></i><span class="hide-menu"> &nbsp &nbsp Restaurant</span></li>
                        </div>
                        <div>
                            <i class="fas fa-wine-glass"></i><span class="hide-menu"> &nbsp &nbsp &nbspBar</span></li>
                        </div>
                        <div>
                            <i class="fas fa-leaf"></i><span class="hide-menu"> &nbsp &nbspSwimming Pool</span></li>
                        </div>
                        <div>
                            <i class="fas fa-hand-rock"></i><span class="hide-menu"> &nbsp &nbspFitness Center</span></li>
                        </div>
                        <div>
                            <i class="fas fa-car"></i><span class="hide-menu"> &nbsp &nbspParking Area</span></li>
                        </div>
                        <div>
                            <i class="fas fa-warehouse"></i><span class="hide-menu"> &nbsp Ballroom</span></li>
                        </div>
                        <div>
                            <i class="fas fa-university"></i><span class="hide-menu"> &nbsp &nbspMeeting Room</span></li>
                        </div>
                        <div>
                            <i class="fas fa-smoking"></i><span class="hide-menu"> &nbsp Smooking Area</span></li>
                        </div>
                        <div>
                            <i class="fas fa-wifi"></i><span class="hide-menu"> &nbsp Free Wi-Fi</span></li>
                        </div>
                        <div>
                            <i class="fas fa-utensil-spoon"></i><span class="hide-menu"> &nbsp &nbspFree Breakfast</span></li>
                        </div>
                        <div>
                            <i class="fas fa-phone-volume"></i><span class="hide-menu"> &nbsp &nbsp 24-hour Reception Service</span></li>
                        </div>
                        <div>
                            <i class="fas fa-bath"></i><span class="hide-menu"> &nbsp &nbspBeauty Salon/Spa</span></li>
                        </div>
                        <div>
                            <i class="fas fa-taxi"></i><span class="hide-menu"> &nbsp &nbspFree pick up</span></li>
                        </div>           
                    </div>
                    <ul class="list-inline text-center mt-5 mb-2">
                        <li class="list-inline-item text-muted font-italic">Facilities in this hotel</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Earning by Location</h4>
                    <div class="" style="height:180px">
                        <div id="visitbylocate" style="height:100%"></div>
                    </div>
                    <div class="row mb-3 align-items-center mt-1 mt-5">
                        <div class="col-4 text-right">
                            <span class="text-muted font-14">India</span>
                        </div>
                        <div class="col-5">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <span class="mb-0 font-14 text-dark font-weight-medium">28%</span>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-4 text-right">
                            <span class="text-muted font-14">UK</span>
                        </div>
                        <div class="col-5">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 74%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-4 text-right">
                            <span class="text-muted font-14">USA</span>
                        </div>
                        <div class="col-5">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4 text-right">
                            <span class="text-muted font-14">China</span>
                        </div>
                        <div class="col-5">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Sales Charts Section -->
    <!-- *************************************************************** -->
    <!-- *************************************************************** -->
    <!-- Start Location and Earnings Charts Section -->
    <!-- *************************************************************** -->
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fitness Center</h4>
                        <div id="campaign-v2" class="mt-2" style="height: 380px; width:100%;">
                            <div align = "center" >
                                <img src="{{asset('templatee/assets/images/fitnesscenter1.jpg')}}" 
                                style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                            </div>
                            <br>
                            <div align = "center">
                                <img src="{{asset('templatee/assets/images/fitnesscenter2.jpg')}}" 
                                style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                            </div>                            
                        </div>                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Swimming Pool</h4>
                    <div style="height:380px;">
                        <div align = "center" >
                            <img src="{{asset('templatee/assets/images/pool1.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                        <br>
                        <div align = "center">
                            <img src="{{asset('templatee/assets/images/pool2.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Restaurant</h4>
                    <div style="height:380px">
                        <div align = "center" >
                            <img src="{{asset('templatee/assets/images/restaurant1.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                        <br>
                        <div align = "center">
                            <img src="{{asset('templatee/assets/images/restaurant2.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Location and Earnings Charts Section -->
    <!-- *************************************************************** -->
    <!-- *************************************************************** -->
    <!-- Start Top Leader Table -->
    <!-- *************************************************************** -->
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar</h4>
                        <div id="campaign-v2" class="mt-2" style="height: 380px; width:100%;">
                            <div align = "center" >
                                <img src="{{asset('templatee/assets/images/bar1.jpg')}}" 
                                style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                            </div>
                            <br>
                            <div align = "center">
                                <img src="{{asset('templatee/assets/images/bar2.jpg')}}" 
                                style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                            </div>                            
                        </div>                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ballroom</h4>
                    <div style="height:380px;">
                        <div align = "center" >
                            <img src="{{asset('templatee/assets/images/ballroom1.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                        <br>
                        <div align = "center">
                            <img src="{{asset('templatee/assets/images/ballroom2.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beauty Salon/Spa</h4>
                    <div style="height:380px">
                        <div align = "center" >
                            <img src="{{asset('templatee/assets/images/spa1.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                        <br>
                        <div align = "center">
                            <img src="{{asset('templatee/assets/images/spa2.jpg')}}" 
                            style="border-color: black; border-style: solid;" width="250px" height="166px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Top Leader Table -->
    <!-- *************************************************************** -->
</div>
@endsection
